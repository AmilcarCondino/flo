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
        $filter = Input::all();




        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('title', 'id');
        $collections = Collection::lists('title', 'id');
        $photos = Photo::all();

        if (!empty($filter)) {
            if (!empty($filter['categories'])) {

                $photos = Photo::whereHas('categories', function($q)
                    {
                        $filter = Input::all();
                        $q->where( 'category_id', '=', $filter['categories']);

                    })->get();
            }
            if (!empty($filter['collections'])) {

                $photos = Photo::whereHas('collections', function($q)
                {
                    $filter = Input::all();
                    $q->where( 'collection_id', '=', $filter['collections']);

                })->get();
            }
        }

        //Render the "create" view
        $this->layout->content = View::make('guest.photos.index', compact('photos', 'categories', 'tags', 'collections'));
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