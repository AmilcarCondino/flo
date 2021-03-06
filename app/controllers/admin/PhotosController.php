<?php namespace Admin;

use BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use View;
use Photo;
use Input;
use Redirect;
use DB;
use Exception;
use Category;
use Tag;
Use Collection;
Use Response;


class PhotosController extends \BaseController {

    protected $layout = 'layouts.admin';

	/**
	 * Display a listing of the resource.
	 * GET /photos
	 *
	 * @return Response
	 */
	public function index()
	{

        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('title', 'id');
        $collections = Collection::lists('title', 'id');
        $photos = Photo::orderBy('id', 'DESC')->get();
	//Render the "photos" page, with all records instantiated
    $this->layout->content =  View::make('admin.photos.index',compact('photos', 'categories', 'tags', 'collections'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /photos/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('title', 'id');
        $collections = Collection::lists('title', 'id');

        //Render the "create" view
        $this->layout->content = View::make('admin.photos.create', compact('categories', 'tags', 'collections'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /photos
	 *
	 * @return Response
	 */
	public function store()
	{
        try {

            //Instantiate a new Photo object
            $photo = new Photo;
            $photo_en = new Photo;

            //Instantiate the image file
            $image = Input::file('image');

            //Declare the allowed extensions
            $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png'];

            //Control if a file was selected
            if (is_null ($image)) {
                //If not, then go back and send an error message.
                throw new Exception('Debe seleccionar un archivo');
            }

            //Get the file extension
            $extension = $image->getClientOriginalExtension();

            //Get the target file original name
            $original_name = $image->getClientOriginalName();

            //Check if the file extension, is in to the allowed ones
            if ( !in_array(strtolower($extension), $allowed_extensions)) {
                //If isn't an allowed extension, then throw a new Exceptio, with a reason.
                throw new Exception('El archivo nos es de un formato valido.');
            };



          //Search the last record id plus 1, and store it in $next_id
            $last_id = DB::table('photos')->orderBy('id','dec')->take(1)->pluck('id');
            $next_id = $last_id + 1;

            //Construct de filename to avoid file replacement
            $filename = 'tucci_web_' . $next_id . '.' . $image->getClientOriginalExtension();

            //Target the save path location
            $destination_path = public_path().'/uploads/images/';

            //Assign the data at the appropriate fields
            $photo->title = Input::get('title');
            $photo->description = Input::get('description');
            $photo->show = Input::get('show');
            $photo->img_name = $filename;
            $photo->language = "es";

            if (!is_null (Input::get('collections'))) {
                //Create an empty array for the collection data.
                $array_collections = [];
                //Grab de tags input data from de form, and populate the array
                foreach(Input::get('collections') as $collection_id){
                    $collection = Collection::findOrFail($collection_id);
                    $array_collections[] = $collection;
                }
            }

            if (!is_null (Input::get('categories'))) {
                //Create an empty array for the categories data.
                $array_categories = [];
                //Grab de tags input data from de form, and populate the array
                foreach(Input::get('categories') as $category_id){
                    $category = Category::findOrFail($category_id);
                    $array_categories[] = $category;
                }
            }

            if (!is_null(Input::get('tags'))) {
                //Create an empty array for the tags data.
                $array_tags = [];
                //Grab de tags input data from de form, and populate the array
                foreach(Input::get('tags') as $tag_id){
                    $tag = Tag::findOrFail($tag_id);
                    $array_tags[] = $tag;
                }
            }

            //Move the image in to the server
            $filename = $photo->img_name;
            $image->move($destination_path, $filename);

            //Check if the if the image was created in the server
            if ( !file_exists(public_path()."/uploads/images/{$filename}")) {
                //Don't exist. Then fails, redirect to create page and send a flash error message.
                throw new Exception('El archivo "' . $original_name . '" no se puedo guardar. Si el error continua, contacte con su administrador');
            }

            //Try to save in the DB and check for true or false
            if ($photo->save()) {
                //Save the array of tags
                if (!empty($array_categories)) {
                    $photo->categories()->saveMany($array_categories);
                }
                //Save the array of tags
                if (!empty($array_collections)) {
                    $photo->collections()->saveMany($array_collections);
                }
                //Save the array of tags
                if (!empty($array_tags)) {
                    $photo->tags()->saveMany($array_tags);
                }

                //Assign the data at the appropriate fields of the second language
                $photo_en->title = Input::get('title_en');
                $photo_en->description = Input::get('description_en');
                $photo_en->show = Input::get('show');
                $photo_en->img_name = $filename;
                $photo_en->referential_id = DB::table('photos')->orderBy('id','dec')->take(1)->pluck('id');
                $photo_en->language = "en";

                if ($photo_en->save()) {
                    //Save the array of tags
                    if (!empty($array_categories)) {
                        $photo_en->categories()->saveMany($array_categories);
                    }
                    //Save the array of tags
                    if (!empty($array_collections)) {
                        $photo_en->collections()->saveMany($array_collections);
                    }
                    //Save the array of tags
                    if (!empty($array_tags)) {
                        $photo_en->tags()->saveMany($array_tags);
                    }
                    return Redirect::to('admin/photos')
                        ->with('flash_message','La foto "' . $photo->title . '" se ha guardado correctamente')
                        ->with('flash_type', 'alert-success');
                }
            }
            //If it's false, don't pass de validation checks. Redirect to the previous page with details of the problem.
            return Redirect::back()->withInput()->withErrors($photo->getErrors());
        }
        catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
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
            $this->layout->content = View::make('admin.photos.show', compact('photo'));
        }catch (\Exception $e) {
            return Redirect::to('admin.photos')
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
        //Error handler
        try {

            //Instantiate the record to edit
            $photo = Photo::findOrFail($id);
            $photo_en = DB::table('photos')->where('referential_id', $photo->id)->first();
            $categories = Category::lists('title', 'id');
            $tags = Tag::lists('title', 'id');
            $collections = Collection::lists('title', 'id');



            //Render edit page with the record data
            $this->layout->content = View::make('admin.photos.edit', compact('photo', 'categories', 'tags', 'collections', 'photo_en'));
            //Error handler response
        }
        catch (\Exception $e) {
            return Redirect::to('admin/photos')
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
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
        //Error handler
        try {

            //Instantiate the new image file
            $image = Input::file('image');

            //Instantiate the record to edit
            $photo = Photo::findOrFail($id);
            $photo_en_id = DB::table('photos')->where('referential_id', $photo->id)->first();
            $photo_en = Photo::findOrFail($photo_en_id->id);

           //Check for a new image
            if (!empty ($image)) {
                //if exist a new image, validate
                //Declare the allowed extensions
                $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png'];
                //Get the file extension
                $extension = $image->getClientOriginalExtension();

                if ( !in_array(strtolower($extension), $allowed_extensions)){
                    //If isn't an allowed extension, then throw a new Exceptio, with a reason.
                    throw new Exception('El archivo nos es de un formato valido.');
                };
            }

            //Assign the data at the appropriate fields
            $photo->title = Input::get('title');
            $photo->description = Input::get('description');
            $photo->show = Input::get('show');

            if (!is_null (Input::get('collections'))) {
                //Create an empty array for the collection data.
                $array_collections = [];
                //Grab de tags input data from de form, and populate the array
                foreach(Input::get('collections') as $collection_id){
                    $collection = Collection::findOrFail($collection_id);
                    $array_collections[] = $collection;
                }
            }

            if (!is_null (Input::get('categories'))) {
                //Create an empty array for the categories data.
                $array_categories = [];
                //Grab de tags input data from de form, and populate the array
                foreach(Input::get('categories') as $category_id){
                    $category = Category::findOrFail($category_id);
                    $array_categories[] = $category;
                }
            }

            if (!is_null(Input::get('tags'))) {
                //Create an empty array for the tags data.
                $array_tags = [];
                //Grab de tags input data from de form, and populate the array
                foreach(Input::get('tags') as $tag_id){
                    $tag = Tag::findOrFail($tag_id);
                    $array_tags[] = $tag;
                }
            }

            //Try to update the register in the DB and check for errors
            if ($photo->save()) {
                //First erase the olda data, and then save the array of categories
                $photo->categories()->detach();
                if (!empty($array_categories)) {
                    $photo->categories()->saveMany($array_categories);
                }
                //First erase the olda data, and then save the array of collections
                $photo->collections()->detach();
                if (!empty($array_collections)) {
                    $photo->collections()->saveMany($array_collections);
                }
                //First erase the olda data, and then save the array of tags
                $photo->tags()->detach();
                if (!empty($array_tags)) {
                    $photo->tags()->saveMany($array_tags);
                }

                //Then redirect at photos page with a successful message.
                if (!empty ($image)) {
                    //Target the save path location
                    $destination_path = public_path().'/uploads/images/';

                    $photo_name = $photo->img_name;
                    //Copy the new image
                    $image->move($destination_path, $photo->img_name);
                }
                    //Assign the data at the appropriate fields of the second language
                    $photo_en->title = Input::get('title_en');
                    $photo_en->description = Input::get('description_en');
                    $photo_en->show = Input::get('show');

                DB::table('photos')
                    ->where('id', $photo_en->id)
                    ->update(['title' => $photo_en->title, 'description' =>$photo_en->description, 'show' =>$photo_en->show ]);

                //First erase the olda data, and then save the array of categories
                $photo_en->categories()->detach();
                if (!empty($array_categories)) {
                    $photo_en->categories()->saveMany($array_categories);
                }
                //First erase the olda data, and then save the array of collections
                $photo_en->collections()->detach();
                if (!empty($array_collections)) {
                    $photo_en->collections()->saveMany($array_collections);
                }
                //First erase the olda data, and then save the array of tags
                $photo_en->tags()->detach();
                if (!empty($array_tags)) {
                    $photo_en->tags()->saveMany($array_tags);
                }
                return Redirect::to('admin/photos')
                    ->with('flash_message','La foto "' . $photo->title . '" se ha editado correctamente')
                    ->with('flash_type', 'alert-success');
                //If errors exist, don't pass de validation checks. Redirect to the previous page with details of the problem.
                return Redirect::back()->withInput()->withErrors($photo->getErrors());
            }
        }
        catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
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
        //Error handler
        try {
            //Instantiate the record to edit
            $photo = Photo::findOrFail($id);
            $photo_en = DB::table('photos')->where('referential_id', $photo->id)->first();

            //Delete the record from the DB
            Photo::find($id)->delete();
            Photo::find($photo_en->id)->delete();

            $pho = Photo::find($id);
            //Check register still exist in the DB
            if (empty($pho) ){
                //Redirect to the photo.index page
                    return Redirect::to('admin/photos')
                        ->with('flash_message','La foto "' . $photo->title . '" se ha eliminado correctamente')
                        ->with('flash_type', 'alert-success');
            }
            throw new Exception('El archivo "' . $photo->title . '" no se puedo eliminar. Si el error continua, contacte con su administrador');
        }
        catch (\Exception $e) {
            return Redirect::to('photos')
                ->with('flash_message', 'Algo salio mal. Error: ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}

    public function validateAttribute()
    {

        if (!is_null(Input::get('photoId'))) {
            $id = Input::get('photoId');
            $photo = Photo::findOrFail($id);
        } else {
            $photo = new Photo();
        }


        $nameAttribute = Input::get('name');
        $valueAttribute = Input::get('value');


        $validate = $photo->validateOneField($nameAttribute, $valueAttribute);

        if($validate === true){

            return Response::json([
                'success' => true,
                'attributeName' => $nameAttribute

        ]);} else {
                $foo = 'dentro del if';
                return Response::json ([
                'errors' => $validate,
                'succes' => false,
                'attributeName' => $nameAttribute
            ]);
        }


    }


}

