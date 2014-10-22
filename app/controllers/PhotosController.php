<?php

class PhotosController extends \BaseController {

    protected $layout = 'layouts.default';

	/**
	 * Display a listing of the resource.
	 * GET /photos
	 *
	 * @return Response
	 */
	public function index()
	{
        $this->layout->content =  View::make('guest.photos.index')
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

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /photos
	 *
	 * @return Response
	 */
	public function store()
	{

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
            $this->layout->content = View::make('guest.photos.show', compact('photo'));
        }catch (\Exception $e) {
            return Redirect::to('photos')
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
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

	}

}