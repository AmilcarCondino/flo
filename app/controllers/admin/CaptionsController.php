<?php namespace Admin;

use BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use View;
use Input;
use Redirect;
use DB;
use Exception;
use Response;
use Slider;
use Caption;


class CaptionsController extends BaseController {

    protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 * GET /captions
	 *
	 * @return Response
	 */
	public function index()
	{
		//

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /captions/create
	 *
	 * @return Response
	 */
	public function create()
	{
        //
        $slide_id = Input::get('slide_id');
        $captions = Caption::lists('caption_body', 'id');


        $this->layout->content = View::make('admin.captions.create', compact('slide_id', 'captions'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /captions
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        try {

            //Instantiate a new Photo object
            $caption = new Caption;

            //Check if is an image
            $image = Input::file('image');
            If (!is_null($image)) {

                //Declare the allowed extensions
                $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png'];

                //Get the file extension
                $extension = $image->getClientOriginalExtension();

                //Check if is an allowed extension
                if ( !in_array(strtolower($extension), $allowed_extensions)) {
                    //If isn't an allowed extension, then throw a new Exception, with a reason.
                    throw new Exception('El archivo nos es de un formato valido.');
                };

                //Search the next id to create
                $last_id = DB::table('captions')->orderBy('id','dec')->take(1)->pluck('id');
                $next_id = $last_id + 1;

                //Construct the file name
                $caption_name = Input::get('caption_body');
                $image_name = str_replace(' ', '_', $caption_name) . '_' . $next_id . '.' . $image->getClientOriginalExtension();

                //Move the image in to the server
                $destination_path = public_path().'/uploads/captions/';
                $image->move($destination_path, $image_name);
            }

            //Assign the data at the appropriate fields
            $caption->caption_body = Input::get('caption_body');
            $caption->is_photo = Input::get('is_photo');
            $caption->data_animate = Input::get('data_animate');
            $caption->data_delay = Input::get('data_delay');
            $caption->data_length = Input::get('data_length');
            $caption->top_position = Input::get('top_position');
            $caption->left_position = Input::get('left_position');
            $caption->transition_distance = Input::get('transition_distance');
            $caption->parent_id = Input::get('parent_id');
            $caption->caption_image_name = $image_name;

            $parent_slide_id = Input::get('slide_id');
            $slide_id = Slider::findorFail($parent_slide_id);
            $array_slider[] = $slide_id;

            if ($caption->save()) {
                if ($caption->sliders()->saveMany($array_slider)){

                    return Redirect::to('admin/sliders/' . $parent_slide_id . '/edit')
                        ->with('flash_message','El copete "' . $caption->caption_body . '" se ha guardado correctamente')
                        ->with('flash_type', 'alert-success');

                }
            }
            return Redirect::back()->withInput()->withErrors($caption->getErrors());
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
	 * GET /captions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /captions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        //Error handler
        try {
            //Instantiate the record to show
            $caption = Caption::findOrFail($id);
            //Render show page with the record data
            $this->layout->content = View::make('admin.captions.edit', compact('caption'));
        } catch (\Exception $e) {
            return Redirect::to('admin/sliders')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /captions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        try {

            //Instantiate a new Photo object
            $caption = Caption::findOrFail($id);

            //Check if is an image
            $image = Input::file('image');
            If (!is_null($image)) {

                //Declare the allowed extensions
                $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png'];

                //Get the file extension
                $extension = $image->getClientOriginalExtension();

                //Check if is an allowed extension
                if ( !in_array(strtolower($extension), $allowed_extensions)) {
                    //If isn't an allowed extension, then throw a new Exception, with a reason.
                    throw new Exception('El archivo nos es de un formato valido.');
                };

                //Search the next id to create
                $last_id = DB::table('captions')->orderBy('id','dec')->take(1)->pluck('id');
                $next_id = $last_id + 1;

                //Construct the file name
                $caption_name = Input::get('caption_body');
                $image_name = str_replace(' ', '_', $caption_name) . '_' . $next_id . '.' . $image->getClientOriginalExtension();

                //Move the image in to the server
                $destination_path = public_path().'/uploads/captions/';
                $image->move($destination_path, $image_name);
                $caption->caption_image_name = $image_name;

            }

            //Assign the data at the appropriate fields
            $caption->caption_body = Input::get('caption_body');
            $caption->is_photo = Input::get('is_photo');
            $caption->data_animate = Input::get('data_animate');
            $caption->data_delay = Input::get('data_delay');
            $caption->data_length = Input::get('data_length');
            $caption->top_position = Input::get('top_position');
            $caption->left_position = Input::get('left_position');
            $caption->transition_distance = Input::get('transition_distance');
            $caption->parent_id = Input::get('parent_id');
            $parent_slide = $caption->sliders;


            if ($caption->save()) {
                    return Redirect::to('admin/sliders/' . $parent_slide[0]->id . '/edit')
                        ->with('flash_message','El copete "' . $caption->caption_body . '" se ha guardado correctamente')
                        ->with('flash_type', 'alert-success');
            }
            return Redirect::back()->withInput()->withErrors($caption->getErrors());
        }
        catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /captions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        //Error handler
        try {
            //Instantiate the record to edit
            $caption = Caption::findOrFail($id);
            $parent_slide = $caption->sliders;

            //Delete the record from the DB
            Caption::find($id)->delete();

            //Check register still exist in the DB
            $cap = Caption::find($id);
            if (empty($sli)) {
                //Redirect to the sliders.index page
                return Redirect::to('admin/sliders/' . $parent_slide[0]->id . '/edit')
                    ->with('flash_message','La slide "' . $caption->caption_body . '" se ha eliminado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            throw new Exception('El copete "' . $caption->caption_body . '" no se puedo eliminar. Si el error continua, contacte con su administrador');
        }
        catch (\Exception $e) {
            return Redirect::to('admin/sliders/' . $parent_slide[0]->id . '/edit')
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }
}