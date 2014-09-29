<?php

class RegisterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = Sentry::findAllUsers();
		return View::make('register.index')
		->with('users',$users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules=array(
			'email'				=> 'required',
			'first_name'		=> 'required',
			'password'			=> 'required',
			'confirm_password'	=> 'required'

			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::route('register.index')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			try
			{
			    // Create the user
			    $user = Sentry::createUser(array(
			        'email'       	=> Input::get('email'),
			        'first_name'  	=> Input::get('first_name'),
			        'last_name'  	=> Input::get('last_name'),
			        'password'  	=> Input::get('password'),
			        
			    ));

			    // Find the group using the group id
			    $adminGroup = Sentry::findGroupById(1);

			    // Assign the group to the user
			    $user->addGroup($adminGroup);
			    return Redirect::route('register.index')
			    ->with('message', 'User Created successfully!!');
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    return Redirect::route('register.index')
			    ->with('message','Login field is required.');
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
			    return Redirect::route('register.index')
			    ->with('message','Password field is required.');
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
				return Redirect::route('register.index')
			    ->with('message','User with this login already exists');	
			}
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
			{
			    return Redirect::route('register.index')
			    ->with('message','Group was not found.');
			}
			
		}


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$users = Sentry::findUserById($id);
		$data = Sentry::findAllUsers();
		return View::make('register.edit')
		->with(array('users' => $users,'data' => $data));


	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules=array(
			'email'				=> 'required',
			'first_name'		=> 'required',
			'password'			=> 'required',
			'confirm_password'	=> 'required'

			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::route('register.edit',$id)
			->withErrors($validator)
			->withInput();
		}
		else
		{
			try
			{
			    // Find the user using the user id
			    $user = Sentry::findUserById($id);
			    // Update the user details
			    $user->email = Input::get('email');
			    $user->first_name =Input::get('first_name');
			    $user->last_name =Input::get('last_name');
			    $user->password =Input::get('password');
			    // Update the user
			    if ($user->save())
			    {
			        return Redirect::route('register.index')
			        ->with('message', 'User Updated successfully!!');
			    }
			    else
			    {
			        // User information was not updated
			    }
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    return Redirect::route('register.edit',$id)
			    ->with('message','Login field is required.');
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
			    return Redirect::route('register.edit',$id)
			    ->with('message','Password field is required.');
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
				return Redirect::route('register.edit',$id)
			    ->with('message','User with this login already exists');	
			}
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
			{
			    return Redirect::route('register.index',$id)
			    ->with('message','Group was not found.');
			}	
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$user = Sentry::findUserById($id);
			if($user->delete()){
				return Redirect::route('register.index')
				->with('message','User Deleted successfully!!');
			}
		
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			    return Redirect::route('register.index')
			    ->with('message','User was not found');
		}
	}


}
