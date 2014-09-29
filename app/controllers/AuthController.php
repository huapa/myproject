<?php
Class AuthController extends BaseController{
	public function __construct()
	{
		$this->beforeFilter('csfr',array('on' => 'post'));
	}

	public function index()
	{
		if(Sentry::check())
			return Redirect::route('dashboard.index');
		else
			return View::make('auth.index');
	}
	public function auth()
	{	

		try
		{
		    // Login credentials
		    $credentials = array(
		        'email'    => Input::get('name'),
		        'password' => Input::get('pwd'),
		    );
		    if($user = Sentry::authenticate($credentials, false))
		    	{
		    		return Redirect::route('dashboard.index');
		    	}

		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    echo 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    echo 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    echo 'User is not activated.';
		}
	}
	public function logout()
	{
		Sentry::logout();
		return Redirect::route('login');
	}
}