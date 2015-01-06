<?php namespace Admin;

use BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use View;
use Input;
use Redirect;
use DB;
use Exception;
Use Response;
Use Slider;


class SlidersController extends \BaseController {


    protected $layout = 'layouts.admin';


    /**
	 * Display a listing of the resource.
	 * GET /sliders
	 *
	 * @return Response
	 */
	public function index()
	{
        $this->layout->content =  View::make('admin.sliders.index')
            ->with('sliders', Slider::orderBy('order')->get());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sliders/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $order = Slider::lists('order', 'id');

        //Render the "create" view
        $this->layout->content = View::make('admin.sliders.create', compact('order'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sliders
	 *
	 * @return Response
	 */
	public function store()
	{
        try {

            //Instantiate a new Slider object
            $slide = new Slider;

            //Instantiate the image file
            $image = Input::file('image');

            //Declare the allowed extensions
            $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png'];

            //Control if a file was selected
            if (is_null ($image)) {
                //If not, then go back and send an error message.
                throw new Exception('Debe seleccionar un archivo');
            }

            //Get the file extension
            $extension = $image->getClientOriginalExtension();

            //Get the target file original name
            $original_name = $image->getClientOriginalName();

            //Check if the file extension, is in to the allowed ones
            if ( !in_array(strtolower($extension), $allowed_extensions)) {
                //If isn't an allowed extension, then throw a new Exceptio, with a reason.
                throw new Exception('El archivo nos es de un formato valido.');
            };



            //Search the last record id plus 1, and store it in $next_id
            $last_id = DB::table('sliders')->orderBy('id','dec')->take(1)->pluck('id');
            $next_id = $last_id + 1;

            //Construct de filename to avoid file replacement
            $filename = 'slide_' . $next_id . '.' . $image->getClientOriginalExtension();

            //Target the save path location
            $destination_path = 'public/uploads/slider/';

            //Assign the data at the appropriate fields
            $slide->headline = Input::get('headline');
            $slide->paragraph = Input::get('paragraph');
            $slide->show = Input::get('show');
            $slide->img_name = $filename;
            $slide->order = $next_id;


            //Move the image in to the server
            $filename = $slide->img_name;
            $image->move($destination_path, $filename);

            //Check if the if the image was created in the server
            if ( !file_exists("public/uploads/slider/{$filename}")) {
                //Don't exist. Then fails, redirect to create page and send a flash error message.
                throw new Exception('El archivo "' . $original_name . '" no se puedo guardar. Si el error continua, contacte con su administrador');
            }

            //Try to save in the DB and check for true or false
            if ($slide->save()) {

                //If its true, redirect to sliders page with a successful message.
                return Redirect::to('admin/sliders')
                    ->with('flash_message','El archivo "' . $original_name . '" se ha guardado correctamente')
                    ->with('flash_type', 'alert-success');
            }

            //If it's false, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($slide->getErrors());
        }
        catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

	/**
	 * Display the specified resource.
	 * GET /sliders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        //Error handler
        try {
            //Instantiate the record to show
            $slider = Slider::findOrFail($id);

            //Render show page with the record data
            $this->layout->content = View::make('admin.sliders.show', compact('slider'));
        }catch (\Exception $e) {
            return Redirect::to('admin.sliders')
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /sliders/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        //Error handler
        try {

            //Instantiate the record to edit
            $slide = Slider::findOrFail($id);
            //Create the needed variables
            $order = Slider::lists('order', 'order');
            $rows = DB::table('sliders')->count();

            //Render edit page with the record data
            $this->layout->content = View::make('admin.sliders.edit', compact('slide', 'order', 'rows'));
            //Error handler response
        }
        catch (\Exception $e) {
            return Redirect::to('admin/sliders')
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /sliders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        try {
            //Instantiate the record to edit
            $slide = Slider::findOrFail($id);

            //Assign the data at the appropriate fields
            $slide->headline = Input::get('headline');
            $slide->paragraph = Input::get('paragraph');
            $slide->show = Input::get('show');

            $new_position_order = Input::get('order');
            $new_id_position = $slide->id;


            //Try to update the register in the DB and check for errors
            if ($slide->save()) {


                if (DB::table('sliders')->where('order', $new_position_order)->first()) {

                        // "Do while" starting point
                    do {
                        //Instantiate the cuarrent slide in the selected position
                        $to_sum_position_slide = DB::table('sliders')->where('order', $new_position_order)->first();


                        //Insert the new order in the selected slide
                        DB::table('sliders')->where('id', $new_id_position)->update(array('order' => $new_position_order));

                        $new_id_position = $to_sum_position_slide->id;
                        ++$new_position_order;

                        // "Do while" staitment check
                    } while (DB::table('sliders')->where('order', $new_position_order)->first());
                }
                DB::table('sliders')->where('id', $new_id_position)->update(array('order' => $new_position_order));
                return Redirect::to('admin/sliders')
                    ->with('flash_message','La foto "' . $slide->headline . '" se ha editado correctamente')
                    ->with('flash_type', 'alert-success');

            }
            //If errors exist, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($slide->getErrors());

        }
        catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sliders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}