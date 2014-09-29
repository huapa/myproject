<?php
class MenuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$menu=DB::table('menu')->get();
		return View::make("menu.index")
		->with('menu',$menu);
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
			'menu_name' => 'required',
			'position'	=>	'required|numeric'
			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::route('menu.index')
			->withErrors($validator)
			->withInput();

		}
		else
		{
			$menu=new Menu;
			$menu->menu_title=Input::get('menu_name');
			$menu->menu_description=Input::get('menu_description');
			$menu->position=Input::get('position');
			if($menu->save())
			{
				return Redirect::route('menu.index')
				->with('message','Menu Successfully Created');
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

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$menulist=Menu::all();
		$menu=Menu::find($id);
		return View::make('menu.edit')
		->with(array('menu' => $menu, 'menulist' => $menulist));
	
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
			'menu_title' => 'required',
			'position'	=>	'required|numeric'
			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::route('menu.index')
			->withErrors($validator)
			->withInput();

		}
		else
		{
			$menu=Menu::find($id);
			$menu->menu_title=Input::get('menu_title');
			$menu->menu_description=Input::get('menu_description');
			$menu->position=Input::get('position');
			if($menu->save())
			{
				return Redirect::route('menu.index')
				->with('message','Menu Edited Successfully');
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
		$menu=Menu::find($id);
		$menu->delete();
		return Redirect::route('menu.index')
		->with('message','Menu Deleted Successfully!!');
	}


}
