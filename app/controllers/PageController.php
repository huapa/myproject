<?php

class PageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$page =DB::table('page') 
				->join('category','page.category_id','=','category.id')
				->select('page.id','page.page_title','category.category_name','page.path')
				->get();
		return View::make('page.index')
		->with('page',$page);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$menu=Menu::lists('menu_title','id');
		$category=Category::lists('category_name','id');
		$menu_id=Menu::pluck('id');
		$sub_menu_list=DB::table('sub_menu')->where('menu_id','=',$menu_id)->lists('sub_menu_title','id');
		$sub_menu=array(
			'0'		=>	'None'
			);
		foreach($sub_menu_list as $key => $value)
		{
			$sub_menu[$key] = $value;	
		}
		return View::make('page.create')
		->with(array('menu'=> $menu, 'sub_menu' => $sub_menu,'category' => $category));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules=array(
			'page_title'	=>	'required',
			'page_content'	=> 	'required'
			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::route('page.create')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$page=new Page;
			$page->page_title=Input::get('page_title');
			$page->page_content=Input::get('page_content');
			$page->menu_id=Input::get('menu_id');
			$page->sub_menu_id=Input::get('sub_menu_id');
			$page->category_id=Input::get('category_id');
			$page->path=Str::slug(Input::get('page_title'));
			$data=Input::get('home');
			if(isset($data))
			{
				$page->home=$data;
			}
			else
			{
				$page->home='off';
			}
			if($page->save())
			{
				return Redirect::route('page.index')
				->with('message','Page Created Successfully!!');
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
		$page=Page::find($id);
		$menu=Menu::lists('menu_title','id');
		$category=Category::lists('category_name','id');
		$menu_id=DB::table('page')->whereId($id)->pluck('menu_id');
		$sub_menu_list=DB::table('sub_menu')->where('menu_id','=',$menu_id)->lists('sub_menu_title','id');
		$sub_menu=array(
			'0'		=>	'None'
			);
		foreach($sub_menu_list as $key => $value)
		{
			$sub_menu[$key] = $value;	
		}
		return View::make('page.edit')
		->with(array('page' => $page,'menu'=> $menu, 'sub_menu' => $sub_menu,'category' => $category));
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
			'page_title'	=>	'required',
			'page_content'	=> 	'required'
			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::route('page.create')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$page=Page::find($id);
			$page->page_title=Input::get('page_title');
			$page->page_content=Input::get('page_content');
			$page->menu_id=Input::get('menu_id');
			$page->sub_menu_id=Input::get('sub_menu_id');
			$page->category_id=Input::get('category_id');
			$page->path=Str::slug(Input::get('page_title'));
			$data=Input::get('home');
			if(isset($data))
			{
				$page->home=$data;
			}
			else
			{
				$page->home='off';
			}
			if($page->save())
			{
				return Redirect::route('page.index')
				->with('message','Page Created Successfully!!');
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
		return $id;
		$page=Page::find($id);
		$page->delete();
		return Redirect::route('page.index');
	}
	public function sub_menu()
	{
		$id = Input::get('id');
		$sub_menu_list=DB::table('sub_menu')->where('menu_id','=',$id)->lists('sub_menu_title','id');
		$sub_menu=array(
			'0'		=> 'None'
			);
		$flag=1;
		foreach($sub_menu_list as $key => $value)
		{
			$sub_menu[$key] = $value;
		}
		return View::make('page.process')
		->with(array('sub_menu' => $sub_menu));
	}


}
