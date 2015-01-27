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
        $photos = Photo::orderBy('id', 'DESC')->get();

        if (!empty($filter)) {
            if (!empty($filter['categories'])) {

                $photos = Photo::whereHas('categories', function($q)
                    {
                        $filter = Input::all();
                        $q->where( 'category_id', '=', $filter['categories']);

                    })->orderBy('id','DESC')->get();
            }
            if (!empty($filter['collections'])) {

                $photos = Photo::whereHas('collections', function($q)
                {
                    $filter = Input::all();
                    $q->where( 'collection_id', '=', $filter['collections']);

                })->orderBy('id','DESC')->get();
            }
        }

        //Render the "create" view
        $this->layout->content = View::make('guest.photos.index', compact('photos', 'categories', 'tags', 'collections'));
	}
}