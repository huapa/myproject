<?php

class GalleryController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	// public function showWelcome()
	// {
	// 	return View::make('hello');
	// }
	// DB::table('users')
 //            ->join('contacts', 'users.id', '=', 'contacts.user_id')
 //            ->join('orders', 'users.id', '=', 'orders.user_id')
 //            ->select('users.id', 'contacts.phone', 'orders.price');
	public function Index()
	{
		 
		 return View::make('gallery.index');
		 // $zf_data=Home::orderBy('zf_yearId','desc')->paginate(4);
		 // $zf_year=Year::all();
		 // return View::make('gallery.album')->with(array('zf_data' => $zf_data, 'zf_year' => $zf_year));
		
	}
	
	 public function getManageAlbum()
	 {
	 	$zf_data=DB::table('zf_album')
		->join('zf_albumyear','zf_album.zf_yearId','=','zf_albumyear.zf_id')
		->select('zf_album.id','zf_album.zf_name','zf_album.zf_path','zf_album.zf_yearId','zf_albumyear.zf_year','zf_albumyear.zf_id')
	 	->orderBy('zf_albumyear.zf_year','desc')->paginate(5);
	 	$zf_year=Year::all();
	 	return View::make('gallery.manage-album')->with(array('zf_data' => $zf_data, 'zf_year' => $zf_year));
	 }
	public function postManageAlbum()
	{
		 $zf_data=new Home;
		 $zf_data->zf_name=Input::get('name');
		 $zf_data->zf_yearId=Input::get('year');
		$zf_destinationPath='upload/';
		$zf_file=Input::file('photo');
		if(Input::hasFile('photo'))
		{
			$zf_extension=Input::file('photo')->getClientOriginalExtension();	
			$zf_filename=$zf_file->getClientOriginalName();
			Input::file('photo')->move($zf_destinationPath, $zf_filename);
			$zf_path=$zf_filename;
			$zf_data->zf_path = $zf_path;
			$zf_data->save();	
		}
		 else	
		
		 return 'no file';
		
		return Redirect::to('manage-album')->with('message','Photo Inserted Successfully!!!');
	}
	public function getEditAlbum($id)
	{
		$zf_data=Home::find($id);
	 	$zf_years=Year::all();
	 	$zf_year = Year::wherezfId($zf_data->zf_yearId)->pluck('zf_year');
	 	return View::make('gallery.edit-album')->with(array('zf_data' => $zf_data, 'zf_year' =>$zf_year, 'zf_years' =>$zf_years));
	}
	public function getDeleteAlbum($id)
	{
		$zf_data=Home::find($id);
		$zf_temp=$zf_data->zf_path;
		File::delete('upload/'.$zf_temp);
		$zf_data->delete();
		return Redirect::to('gallery/manage-album')->with('message','Photo Deleted Successfully!!');
	}
	public function postEditAlbum($id)
	{
			$zf_data=Home::find($id);
		 	$zf_data->zf_name=Input::get('name');
		 	$zf_data->zf_yearId=Input::get('year');
			$zf_destinationPath='upload/';
			$zf_file=Input::file('photo');
			if(Input::hasFile('photo'))
			{
				$zf_extension=Input::file('photo')->getClientOriginalExtension();	
				$zf_filename=$zf_file->getClientOriginalName();
				Input::file('photo')->move($zf_destinationPath, $zf_filename);
				$zf_path=$zf_filename;
				$zf_data->zf_path = $zf_path;
					
			}
		 	$zf_data->save();
			return Redirect::to('manage-gallery')->with('message','Photo Updated Successfully!!!');
	}
	public function getPhoto($zf_albumId,$zf_yearId)
	{
		$zf_data=Photo::whereZfAlbumid($zf_albumId)
		->where('zf_yearId','=',$zf_yearId)
		->get();
		return View::make('gallery.photo')
		->with('zf_data',$zf_data);
	}
	public function getManagePhoto($zf_albumid,$zf_yearId)
	{
		$zf_data=Photo::wherezfAlbumid($zf_albumid)->where('zf_yearId','=',$zf_yearId)->get();
		$zf_album=Home::whereid($zf_albumid)->pluck('zf_name');
		$zf_year=Year::wherezfId($zf_yearId)->pluck('zf_year');
		return View::make('home.manage-photo')
		->with(array('zf_album' => $zf_album, 'zf_year' => $zf_year,'zf_data' => $zf_data));
	}
	public function postManagePhoto($zf_albumId,$zf_yearId)
	{
		
		foreach(Input::file('photo') as $zf_file)
		{
			
			if(Input::hasFile('photo'))
			{
				$zf_data=new Photo;
				$zf_destinationPath='upload/photo/';
				$zf_data->zf_yearId=$zf_yearId;
				$zf_data->zf_albumid=$zf_albumId;
				$zf_extension=$zf_file->getClientOriginalExtension();	
				$zf_filename=$zf_file->getClientOriginalName();
				$zf_file->move($zf_destinationPath, $zf_filename);
				$zf_path=$zf_filename;
				$zf_data->zf_filepath = $zf_path;
				$zf_data->save();
			}		
		}
		return Redirect::to('manage-photo/'.$zf_albumId.'/'.$zf_yearId)->with('message','Photo Inserted Successfully!!!');
	}
	public function getDeletePhoto($zf_albumId,$zf_yearId,$id)
	{
		$zf_data=Photo::find($id);
		$zf_temp=$zf_data->zf_filepath;
		File::delete('upload/photo/'.$zf_temp);
		$zf_data->delete();
		return Redirect::to('manage-photo/'.$zf_albumId.'/'.$zf_yearId)->with('message','Photo Deleted Successfully!!');
	}

}