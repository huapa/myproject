<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$category=Category::all();
		return View::make('category.index')
		->with('category',$category);
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
			'category_name'	=> 'required',
			'position'		=> 'required'
			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::route('category.index')
			->withErrors($validator);
		}
		else
		{
			$category=new Category;
			$category->category_name=Input::get('category_name');
			$category->category_description=Input::get('category_description');
			$category->position=Input::get('position');
			if($category->save())
			{
				return Redirect::route('category.index')
				->with('message','Category Successfully Created!');
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
		$category=Category::all();
		$category_data=Category::find($id);
		return View::make('category.edit')
		->with(array('category' => $category,'category_data' => $category_data));
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
			'category_name'	=> 'required',
			'position'		=> 'required'
			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::route('category.edit')
			->withErrors($validator);
		}
		else
		{
			$category=Category::find($id);
			$category->category_name=Input::get('category_name');
			$category->category_description=Input::get('category_description');
			$category->position=Input::get('position');
			if($category->save())
			{
				return Redirect::route('category.index')
				->with('message','Category Edited Successfully!!');
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
		$category=Category::find($id);
		$category->delete();
		return Redirect::route('category.index')
		->with('message','Category Deleted Successfully!!');
	}


}
