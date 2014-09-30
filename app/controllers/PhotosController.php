<?php

class PhotosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /photos
	 *
	 * @return Response
	 */
	public function index()
	{
		//Render the "photos" page, with all records instantiated
        return View::make('photos/index')
            ->with('photos', Photo::all());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /photos/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//Render the "create" view
        return View::make('photos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /photos
	 *
	 * @return Response
	 */
	public function store()
	{
        try {

            //Instantiate a new Photo object
            $photo = new Photo;

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

            //Check if the file extension, is in the allowed ones
            if ( !in_array(strtolower($extension), $allowed_extensions)) {
                //If isn't an allowed extension, then throw a new Exceptio, with a reason.
                throw new Exception('El archivo nos es de un formato valido.');
            };



          //Search the last record id plus 1, and store it in $next_id
            $last_id = DB::table('photos')->orderBy('id','dec')->take(1)->pluck('id');
            $next_id = $last_id + 1;

            //Construct de filename to avoid file replacement
            $filename = 'tucci_web_' . $next_id . '.' . $image->getClientOriginalExtension();

            //Target the save path location
            $destination_path = 'public/uploads/images/';

            //Assign the data at the appropriate fields
            $photo->title = Input::get('title');
            $photo->description = Input::get('description');
            $photo->category = Input::get('category');
            $photo->show = Input::get('show');
            $photo->img_name = $filename;


            //Move the image in to the server
            $filename = $photo->img_name;
            $image->move($destination_path, $filename);

            //Check if the if the image was created in the server
            if ( !file_exists("public/uploads/images/{$filename}")) {
                //Don't exist. Then fails, redirect to create page and send a flash error message.
                throw new Exception('El archivo "' . $original_name . '" no se puedo guardar. Si el error continua, contacte con su administrador');
            }

            //Try to save in the DB and check for true or false
            if ($photo->save()) {
                //If it's tru, redirect at photos page with a successful message.
                return Redirect::to('photos')
                    ->with('flash_message','El archivo "' . $original_name . '" se ha guardado correctamente')
                    ->with('flash_type', 'flash-success');
            }

            //If it's false, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($photo->getErrors());
        }
        catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. ' .  $e->getMessage())
                ->with('flash_type', 'flash-error');
        }
	}

	/**
	 * Display the specified resource.
	 * GET /photos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        //Error handler
        try {
            //Instantiate the record to show
            $photo = Photo::findOrFail($id);

            //Render show page with the record data
            return View::make('photos.show', compact('photo'));
        }
        catch (\Exception $e) {
            return Redirect::to('photos')
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'flash-error');
        }
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /photos/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        //Error handler
        try {
            //Instantiate the record to edit
            $photo = Photo::findOrFail($id);

            //Render edit page with the record data
            return View::make('photos.edit', compact('photo'));
            //Error handler response
        }
        catch (\Exception $e) {
            return Redirect::to('photos')
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'flash-error');
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /photos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        //Error handler
        try {

            //Instantiate the new image file
            $image = Input::file('image');

            //Instantiate the record to edit
            $photo = Photo::findOrFail($id);

           //Check for a new image
            if (!empty ($image)) {
                //if exist a new image, validate
                //Declare the allowed extensions
                $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png'];
                //Get the file extension
                $extension = $image->getClientOriginalExtension();

                if ( !in_array($extension, $allowed_extensions))
                {
                    //If isn't an allowed extension, then throw a new Exceptio, with a reason.
                    throw new Exception('El archivo nos es de un formato valido.');
                };
            }

            //Assign the data at the appropriate fields
            $photo->title = Input::get('title');
            $photo->description = Input::get('description');
            $photo->category = Input::get('category');
            $photo->show = Input::get('show');

            //Try to update the register in the DB and check for errors
            if ($photo->save()) {
                //If it's tru, redirect at photos page with a successful message.
                 if (!empty ($image)) {
                    //Target the save path location
                    $destination_path = 'public/uploads/images/';

                    $photo_name = $photo->img_name;
                    //Copy the new image
                    $image->move($destination_path, $photo->img_name);

                     return Redirect::to('photos')
                         ->with('flash_message','La foto "' . $photo->title . '" se ha editado correctamente')
                         ->with('flash_type', 'flash-success');
                }
            }
            //If errors exist, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($photo->getErrors());

        }
        catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'flash-error');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /photos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        //Error handler
        try {
            //Instantiate the record to edit
            $photo = Photo::findOrFail($id);

            //Delete the record from the DB
            Photo::find($id)->delete();

            //Check register still exist in the DB
            if (empty(Photo::find($id))) {
                //Redirect to the photo.index page
                    return Redirect::to('photos')
                        ->with('flash_message','La foto "' . $photo->title . '" se ha eliminado correctamente')
                        ->with('flash_type', 'flash-success');
            }
            throw new Exception('El archivo "' . $photo->title . '" no se puedo eliminar. Si el error continua, contacte con su administrador');
        }
        catch (\Exception $e) {
            return Redirect::to('photos')
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'flash-error');
        }
	}

}