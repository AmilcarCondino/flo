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
        $destination_path = 'public/uploads/img/';
		//Render the "photos" page, with all photos instantiated
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
		//Grab the new image data, validate ir anda save it en the DB
        //Check errors

        //Validate the data

        //Instantiate a new Photo object
        $photo = new Photo;

        //Instantiate the image file
        $image = Input::file('image');

        //Grab the original file name
        $filename = $image->getCLientOriginalName();

        //Target the save path location
        $destination_path = 'public/uploads/images/';

        //Assign the data at the apropiate fields
        $photo->title = Input::get('title');
        $photo->description = Input::get('description');
        $photo->category = Input::get('category');
        $photo->show = Input::get('show');
        $photo->img_name = $filename;
        //$photo->path = $destination_path;
        //$photo->img_name = Input::get('title');

        //Move the image in to the server
        $filename = $photo->img_name;
        $image->move($destination_path, $filename);

        //Insert the new record in the DB
        $photo->save();

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
        //Instantiate
        $photo = Photo::findOrFail($id);

        //Remder show page with the image data
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
		//
        $photo = Photo::findOrFail($id);

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
		//
        $photo = Photo::findOrFail($id);

        $photo->title = Input::get('title');
        $photo->description = Input::get('description');
        $photo->category = Input::get('category');
        $photo->show = Input::get('show');

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
		//
        $photo = Photo::findOrFail($id);

        Photo::find($id)->delete();

        return Redirect::to('photos');
	}

}