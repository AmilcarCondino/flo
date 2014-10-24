<?php

class PostsController extends \BaseController
{

    protected $layout = 'layouts.default';

    /**
     * Display a listing of the resource.
     * GET /posts
     *
     * @return Response
     */
    public function index()
    {

        $this->layout->content = View::make('guest.posts.index')
            ->with('posts', Post::all());

    }

    /**
     * Display the specified resource.
     * GET /posts/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //Error handler
        try {
            //Instantiate the record to show
            $post = Post::findOrFail($id);
            //Render show page with the record data
            $this->layout->content = View::make('guest.posts.show', compact('post'));
        } catch (\Exception $e) {
            return Redirect::to('posts')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

}