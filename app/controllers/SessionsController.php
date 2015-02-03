<?php

class SessionsController extends \BaseController {

    protected $layout = 'layouts.default';


	public function create()
	{
        $this->layout->content = View::make('login.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sesions
	 *
	 * @return Response
	 */
	public function store()
	{
		try {
            $input = Input::all();

            $attempt = Auth::attempt([
                'username' => $input['username'],
                'password' => $input['password']
            ]);

            if ($attempt) {
                return Redirect::to('/admin')
                    ->with('flash_message', 'Bienvenido '. Auth::user()->username)
                    ->with('flash_type', 'alert-success');
            } throw new Exception('La combinacion de usuario y contraseña no es valida.');
        } catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('flash_message', 'Algo salio mal. ' .  $e->getMessage())
                ->with('flash_type', 'alert-danger');
        }
	}


	public function destroy()
	{

        $username = Auth::user()->username;

        Auth::logout();

        return Redirect::to('/')
            ->with('flash_message', 'Adios ' . $username)
            ->with('flash_type', 'alert-success');
	}

    public function setLanguage(){

        $language = Input::all();

        if (isset ($language)) {

            Session::forget('lan');

            Session::put('lan', $language);
            return Redirect::back();
        }
    }

}