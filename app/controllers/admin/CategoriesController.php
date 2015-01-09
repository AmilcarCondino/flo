<?php namespace Admin;

use BaseController;
use View;
use Category;
use Input;
use Redirect;
use DB;
use Exception;

class CategoriesController extends \BaseController
{

    protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 * GET /categories
	 *
	 * @return Response
	 */
	public function index()
	{
        $this->layout->content = View::make('admin/categories/index')
            ->with('categories', Category::all());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function create()
	{
        //Render Create View
        $this->layout->content = View::make('admin.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /categories
	 *
	 * @return Response
	 */
	public function store()
	{
        try {
            $category = new Category;
    
            $category->title = Input::get('title');

            //Try to save in the DB and check for errors
            if ($category->save()) {
                //If it's tru, redirect at posts page with a successful message.
                return Redirect::to('admin')
                    ->with('flash_message', 'La categoria "' . $category->title . '" se ha creado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            //If it's false, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($category->getErrors());
        } catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

	/**
	 * Display the specified resource.
	 * GET /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        //Error handler
        try {
            //Instantiate the record to show
            $category = Category::findOrFail($id);
            //Render show page with the record data
            $this->layout->content = View::make('admin.categories.show', compact('category'));
        } catch (\Exception $e) {
            return Redirect::to('admin')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /categories/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        //Error handler
        try {
            //Instantiate the record to show
            $category = Category::findOrFail($id);
            //Render show page with the record data
            $this->layout->content = View::make('admin.categories.edit', compact('category'));
        } catch (\Exception $e) {
            return Redirect::to('admin')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        try {
            $category = Category::findOrFail($id);

            $category->title = Input::get('title');

            if ($category->save()) {
                return Redirect::to('admin')
                    ->with('flash_message', 'La categoria "' . $category->title . '" se ha editado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            //If errors exist, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($category->getErrors());
        } catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try {
            //Instantiate the record to edit
            $category = Category::findOrFail($id);

            //Delete the record from the DB
            Category::find($id)->delete();

            //Check register still exist in the DB
            $cat = Category::find($id);
            if (empty($cat)) {
                //Redirect to the photo.index page
                return Redirect::to('admin')
                    ->with('flash_message', 'La categoria "' . $category->title . '" se ha eliminado correctamente')
                    ->with('flash_type', 'alert-success');
            }
            throw new Exception('La categoria "' . $category->title . '" no se puedo eliminar. Si el error continua, contacte con su administrador');
        } catch (\Exception $e) {
            return Redirect::to('admin')
                ->with('flash_message', 'Algo salio mal. Error: ' . $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

}