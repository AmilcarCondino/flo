<?php namespace Admin;

use BaseController;
use View;
use Collection;
use Input;
use Redirect;
use DB;
use Exception;

class CollectionsController extends \BaseController
{

    protected $layout = 'layouts.admin';

    /**
     * Display a listing of the resource.
     * GET /collections
     *
     * @return Response
     */
    public function index()
    {
        $this->layout->content = View::make('admin.collections.index')
            ->with('collections', Collection::all());
    }

    /**
     * Show the form for creating a new resource.
     * GET /collections/create
     *
     * @return Response
     */
    public function create()
    {
        //Render Create View
        $this->layout->content = View::make('admin.collections.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /collections
     *
     * @return Response
     */
    public function store()
    {
        try {
            $collection = new Collection;

            $collection->title = Input::get('title');

            //Try to save in the DB and check for errors
            if ($collection->save()) {
                //If it's tru, redirect at posts page with a successful message.
                return Redirect::to('admin')
                    ->with('flash_message', 'La coleccion "' . $collection->title . '" se ha creado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            //If it's false, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($collection->getErrors());
        } catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

    /**
     * Display the specified resource.
     * GET /collections/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //Error handler
        try {
            //Instantiate the record to show
            $collection = Collection::findOrFail($id);
            //Render show page with the record data
            $this->layout->content = View::make('admin.collection.show', compact('collection'));
        } catch (\Exception $e) {
            return Redirect::to('admin')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * GET /collections/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //Error handler
        try {
            //Instantiate the record to show
            $collection = Collection::findOrFail($id);
            //Render show page with the record data
            $this->layout->content = View::make('admin.collections.edit', compact('collection'));
        } catch (\Exception $e) {
            return Redirect::to('admin')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

    /**
     * Update the specified resource in storage.
     * PUT /collections/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        try {
            $collection = Collection::findOrFail($id);

            $collection->title = Input::get('title');

            if ($collection->save()) {
                return Redirect::to('admin')
                    ->with('flash_message', 'La coleccion "' . $collection->title . '" se ha editado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            //If errors exist, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($collection->getErrors());
        } catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /collections/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            //Instantiate the record to edit
            $collection = Collection::findOrFail($id);

            //Delete the record from the DB
            Collection::find($id)->delete();

            $col = Collection::find($id);
            //Check register still exist in the DB
            if (empty($col) {
                //Redirect to the photo.index page
                return Redirect::to('admin')
                    ->with('flash_message', 'La coleccion "' . $collection->title . '" se ha eliminado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            throw new Exception('La categoria "' . $collection->title . '" no se puedo eliminar. Si el error continua, contacte con su administrador');
        } catch (\Exception $e) {
            return Redirect::to('admin')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
    }

}