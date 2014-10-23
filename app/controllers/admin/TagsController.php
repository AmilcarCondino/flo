<?php namespace Admin;

use BaseController;
use View;
use Tag;
use Input;
use Redirect;
use DB;
use Exception;

class TagsController extends \BaseController
{

    protected $layout = 'layouts.default';

    /**
     * Display a listing of the resource.
     * GET /tags
     *
     * @return Response
     */
    public function index()
    {
        $this->layout->content = View::make('admin/tags/index')
            ->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     * GET /tags/create
     *
     * @return Response
     */
    public function create()
    {
        //Render Create View
        $this->layout->content = View::make('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /tags
     *
     * @return Response
     */
    public function store()
    {
        try {
            $tag = new Tag;

            $tag->title = Input::get('title');

            //Try to save in the DB and check for errors
            if ($tag->save()) {
                //If it's tru, redirect at posts page with a successful message.
                return Redirect::to('admin/tags')
                    ->with('flash_message', 'La etiqueta "' . $tag->title . '" se ha creado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            //If it's false, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($tag->getErrors());
        } catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

    /**
     * Display the specified resource.
     * GET /tags/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //Error handler
        try {
            //Instantiate the record to show
            $tag = Tag::findOrFail($id);
            //Render show page with the record data
            $this->layout->content = View::make('admin.tags.show', compact('tag'));
        } catch (\Exception $e) {
            return Redirect::to('admin.tags')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * GET /tags/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //Error handler
        try {
            //Instantiate the record to show
            $tag = Tag::findOrFail($id);
            //Render show page with the record data
            $this->layout->content = View::make('admin.tags.edit', compact('tag'));
        } catch (\Exception $e) {
            return Redirect::to('tags')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

    /**
     * Update the specified resource in storage.
     * PUT /tags/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        try {
            $tag = TAg::findOrFail($id);

            $tag->title = Input::get('title');

            if ($tag->save()) {
                return Redirect::to('admin/tags')
                    ->with('flash_message', 'La etiqueta "' . $tag->title . '" se ha editado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            //If errors exist, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($tag->getErrors());
        } catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /tags/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            //Instantiate the record to edit
            $tag = Tag::findOrFail($id);

            //Delete the record from the DB
            Tag::find($id)->delete();

            //Check register still exist in the DB
            if (empty(Tag::find($id))) {
                //Redirect to the photo.index page
                return Redirect::to('admin/tags')
                    ->with('flash_message', 'La etiqueta "' . $tag->title . '" se ha eliminado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            throw new Exception('La etiqueta "' . $tag->title . '" no se puedo eliminar. Si el error continua, contacte con su administrador');
        } catch (\Exception $e) {
            return Redirect::to('admin/tags')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

}