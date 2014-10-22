<?php namespace Admin;

use BaseController;
use View;
use Post;
use Input;
use Redirect;
use DB;
use Exception;

class PostsController extends BaseController
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
        $this->layout->content = View::make('admin.posts.index')
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
            //Render Create View
            $this->layout->content = View::make('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /posts
     *
     * @return Response
     */
    public function store()
    {
        try {
            $post = new Post;

            $post->title = Input::get('title');
            $post->body = Input::get('body');

            //Try to save in the DB and check for errors
            if ($post->save()) {
                //If it's tru, redirect at posts page with a successful message.
                return Redirect::to('admin/posts')
                    ->with('flash_message', 'El Post "' . $post->title . '" se ha guardado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            //If it's false, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($post->getErrors());
        } catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
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
            $this->layout->content = View::make('admin.posts.show', compact('post'));
        } catch (\Exception $e) {
            return Redirect::to('admin.posts')
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
        //Error handler
        try {
            //Instantiate the record to show
            $post = Post::findOrFail($id);
            //Render show page with the record data
            $this->layout->content = View::make('admin.posts.edit', compact('post'));
        } catch (\Exception $e) {
            return Redirect::to('posts')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
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
        try {
            $post = Post::findOrFail($id);

            $post->title = Input::get('title');
            $post->body = Input::get('body');

            if ($post->save()) {
                return Redirect::to('admin/posts')
                    ->with('flash_message', 'El post "' . $post->title . '" se ha editado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            //If errors exist, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($post->getErrors());
        } catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
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
        try {
            //Instantiate the record to edit
            $posts = Post::findOrFail($id);

            //Delete the record from the DB
            Post::find($id)->delete();

            //Check register still exist in the DB
            if (empty(Post::find($id))) {
                //Redirect to the photo.index page
                return Redirect::to('admin/posts')
                    ->with('flash_message', 'El Post "' . $posts->title . '" se ha eliminado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            throw new Exception('El Post "' . $posts->title . '" no se puedo eliminar. Si el error continua, contacte con su administrador');
        } catch (\Exception $e) {
            return Redirect::to('admin.posts')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

}