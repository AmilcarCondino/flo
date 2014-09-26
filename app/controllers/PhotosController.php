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

        //Check errors

        //Validate the data

        //Instantiate a new Photo object
        $photo = new Photo;

        //Instantiate the image file
        $image = Input::file('image');

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

        //Insert the new record in the DB
        $photo->save();

        //Move the image in to the server
        $filename = $photo->img_name;
        $image->move($destination_path, $filename);

        //Return to photos.index
        return Redirect::to('photos');

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
        //Instantiate the record to show
        $photo = Photo::findOrFail($id);

        //Render show page with the record data
        return View::make('photos.show', compact('photo'));
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
		//Instantiate the record to edit
        $photo = Photo::findOrFail($id);

        //Render edit page with the record data
        return View::make('photos.edit', compact('photo'));
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
		//Instantiate the record to edit
        $photo = Photo::findOrFail($id);

        //Assign the data at the appropriate fields
        $photo->title = Input::get('title');
        $photo->description = Input::get('description');
        $photo->category = Input::get('category');
        $photo->show = Input::get('show');

        //Save the data in to the DB
        $photo->save();

        return Redirect::to('photos');
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
		//Instantiate the record to edit
        $photo = Photo::findOrFail($id);

        //Delete the record from the DB
        Photo::find($id)->delete();

        //Redirect to the photo.index page
        return Redirect::to('photos');
	}

}