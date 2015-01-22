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

    public function imagesFilter()
    {

        $filterTable = Input::get('filterTable');

        $photos = Photo::whereHas($filterTable, function($q)
            {

                $filterColumn = Input::get('filterColumn');
                $filter_id = Input::get('id');
                $q->where( $filterColumn, '=', $filter_id);

            })->get();

        if (!empty ($photos)){
            return Response::json([
                'success' => true,
                'photos' => $photos
            ]);
        }

//        $this->layout->content =  View::make('guest.photos.index')
//            ->with('photos', $photos);

    }

}