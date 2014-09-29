@extends('layout')
@section('content')
<div class="container">
	<div class="jumbotron">
		<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li><a href="#">Library</a></li>
			  <li class="active">Data</li>
		</ol>
		@if (Session::has('message'))
			<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif
			<div class="row">
			<div class="col-md-8">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-6">
								<i class="glyphicon glyphicon-film"></i> Album Details
							</div>	
							<div class="col-md-6">
								<div class="input-group">
								  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
								  <input type="text" class="form-control" placeholder="Username">
								</div>
									
							</div>	
						</div>	 
					</div>
							
					<div class="panel-body">
						
						

						<table class="table table-striped table-hover">
							<thead>
									<tr>
										<th>#</th>
										<th>Album Name</th>
										<th>Year</th>
										<th>File Name</th>
										<th></th>
											
									</tr>
							</thead>
										
									<tr>
										<td>{{$zf_data->id}}</td>
										<td>{{$zf_data->zf_name}}</td>
										<td>{{$zf_year}}</td>
										<td>{{$zf_data->zf_path}}</td>
										<td><a href="#"><i class="glyphicon glyphicon-trash"></i></a></td>

									</tr>
																	
						</table>
					

					</div>
				</div>
			</div>	
			<div class="col-md-4">
				<div class="panel panel-danger">
					<div class="panel-heading"><i class="glyphicon glyphicon-pencil"></i> &nbsp;Edit Album</div>
					<div class="panel-body">
						{{Form::open(array('files' => 'true','class' => 'form-horizontal'))}}
							<div class="form-group">
								{{Form::Label('name','Album',array('class' => 'col-md-2'))}}
								<div class="col-md-10">
								{{Form::text('name',$zf_data->zf_name,array('class' => 'form-control'))}}
								</div>
							</div>
							
							<div class="form-group">
								{{Form::label('year','Year',array('class' => 'col-md-2 label-control'))}}
								<div class="col-md-10">
								<?php 
									foreach($zf_years as $item)
									{
										$newyear[$item->zf_id]=$item->zf_year ;    
									}

								?>
								{{Form::select('year',$newyear,$zf_data->zf_yearId,array('class' => 'form-control'))}}
								</div>	
							</div>
							
							<div class="form-group">
								{{Form::label('photo','Photo',array('class' => 'col-md-2'))}}
								<div class="col-md-10">
								{{Form::file('photo')}}
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-2">
								</div>	
								<div class="col-md-10">
									<img src="/upload/{{$zf_data->zf_path}}" class="img-thumbnail" style="width: 500px; height:100px;">
								</div>
							</div>						
							<div class="form-group">
								<div class="col-md-2"></div>
								<div class="col-md-10">
								{{Form::submit('submit',array('class' => 'btn btn-primary'))}}
								</div>
							</div>
						{{Form::close()}}
					</div>
				</div>
			
			</div>
		</div>	
	</div><!-- <jumbotron ends> -->	
</div><!-- <container ends> -->
	
@stop