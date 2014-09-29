<?php

class SubMenuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$submenu =DB::table('sub_menu') 
				->join('menu','sub_menu.menu_id','=','menu.id')
				->select('sub_menu.id','sub_menu.sub_menu_title','sub_menu.menu_description','menu.menu_title','sub_menu.position')
				->get();
		$sub_menu=Menu::lists('menu_title','id');
		return View::make('sub-menu.index')
		->with(array('sub_menu'=> $sub_menu,'submenu' => $submenu));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
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
			'parent_menu'	=>	'required',
			'position'	=>	'required|numeric'
			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::route('sub-menu.index')
			->withErrors($validator)
			->withInput();

		}
		else
		{
			$menu=new submenu;
			$menu->sub_menu_title=Input::get('menu_name');
			$menu->menu_description=Input::get('menu_description');
			$menu->menu_id=Input::get('parent_menu');
			$menu->position=Input::get('position');
			if($menu->save())
			{
				return Redirect::route('sub-menu.index')
				->with('message','Sub Menu Successfully Created');
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
		$submenu =DB::table('sub_menu') 
				->join('menu','sub_menu.menu_id','=','menu.id')
				->select('sub_menu.id','sub_menu.sub_menu_title','sub_menu.menu_description','menu.menu_title','sub_menu.position')
				->get();
		$data=Submenu::find($id);
		$sub_menu=Menu::lists('menu_title','id');
		return View::make('sub-menu.edit')
		->with(array('submenu' => $submenu,'sub_menu' => $sub_menu,'data' => $data));
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
			'sub_menu_title' => 'required',
			'parent_menu_id'	=>	'required',
			'position'	=>	'required|numeric'
			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::route('sub-menu.edit',$id)
			->withErrors($validator)
			->withInput();

		}
		else
		{
			$sub_menu=Submenu::find($id);
			$sub_menu->sub_menu_title=Input::get('sub_menu_title');
			$sub_menu->menu_description=Input::get('menu_description');
			$sub_menu->menu_id=Input::get('parent_menu_id');
			$sub_menu->position=Input::get('position');
			if($sub_menu->save())
			{
				return Redirect::route('sub-menu.index')
				->with('message','Sub Menu Edited Successfully');
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
		$submenu=Submenu::find($id);
		$submenu->delete();
		return Redirect::route('sub-menu.index')
		->with('message','Sub Menu Deleted Successfully!');
	}


}
