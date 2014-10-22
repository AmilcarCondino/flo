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
     * Show the form for creating a new resource.
     * GET /posts/create
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     * POST /posts
     *
     * @return Response
     */
    public function store()
    {
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

    /**
     * Show the form for editing the specified resource.
     * GET /posts/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     * PUT /posts/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /posts/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }
}