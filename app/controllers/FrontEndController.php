<?php

class FrontEndController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$menu=DB::table('menu')->orderBy('position','asc')->get();
		$category=DB::table('category')->orderBy('position','asc')->get();
		$page=DB::table('page')->whereHome('on')->orderBy('id','desc')->paginate(4);
		return View::make('frondend.index')
		->with(array('menu' => $menu,'page' => $page,'category' => $category));
	}

	public function sub_content($id)
	{
		$menu=DB::table('menu')->orderBy('position','asc')->get();
		$category=DB::table('category')->orderBy('position','asc')->get();
		$page=DB::table('page')->whereSubMenuId($id)->orderBy('id','desc')->get();
		return View::make('frondend.sub-content')
		->with(array('menu' => $menu,'page' => $page,'category' => $category));
	}

	public function detail($id,$path)
	{
		$comment=DB::table('comment')->wherePageId($id)->get();
		$menu=DB::table('menu')->orderBy('position','asc')->get();
		$category=DB::table('category')->orderBy('position','asc')->get();
		$page=Page::find($id);
		return View::make('frondend.details')
		->with(array('menu' => $menu,'page' => $page,'category' => $category,'comment' => $comment));	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function content($id)
	{
		$category=DB::table('category')->orderBy('position','asc')->get();
		$menu=DB::table('menu')->orderBy('position','asc')->get();
		$page=DB::table('page')->whereMenuId($id)->orderBy('id','desc')->paginate(5);
		return View::make('frondend.content')
		->with(array('menu' => $menu,'page' => $page,'category' => $category));

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function comment()
	{
		$page_id=Input::get('page_id');
		$page_path=Input::get('page_path');
		$rules=array(
			'comment' => 'required'
			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::to('details/'.$page_id.'/'.$page_path)
			->withErrors($validator)
			->withInput();

		}
		else
		{
			$comment=new comment;
			$user=Sentry::getUser();
			$comment->user_name=$user->first_name;
			$comment->body=Input::get('comment');
			$comment->page_id=$page_id;
			$comment->save();
			return Redirect::to('details/'.$page_id.'/'.$page_path);
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
