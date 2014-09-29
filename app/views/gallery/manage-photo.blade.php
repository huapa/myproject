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
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-6">
								<i class="glyphicon glyphicon-film"></i> PHOTOS
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
										<th>{{$zf_album}}</th>
										<th>{{$zf_year}}</th>
										<th>Photo File</th>
										<th></th>
										<th></th>	
									</tr>
							</thead>
							<tbody>
							
							<?php $count=1;?>
							@foreach($zf_data as $zf_item)
									<tr>
										<td style="vertical-align:middle;">{{$count++}}</td>
										<td style="vertical-align:middle;"></td>
							
										<td style="vertical-align:middle;"></td>
										
										<td style="vertical-align:middle;"><img src="/upload/photo/{{$zf_item->zf_filepath}}" class="img-thumbnail" style="width:100%"></td>	
										<td style="vertical-align:middle;"><a href="{{URL::to('edit-album/'.$zf_item->id)}}"><i class="glyphicon glyphicon-pencil"></i></a></td>
										<td style="vertical-align:middle;"><a href="{{URL::to('delete-photo/'.$zf_item->zf_albumid .'/'. $zf_item->zf_yearId.'/'. $zf_item->id)}}"><i class="glyphicon glyphicon-trash"></i></a></td>
									</tr>
							@endforeach
					
							</tbody>	
						</table>
					
					
					</div>
				</div>
			</div>	
			<div class="col-md-4">
				<div class="panel panel-warning">
					<div class="panel-heading"><i class="glyphicon glyphicon-plus"></i> &nbsp;Add Photo</div>
					<div class="panel-body">
						
						{{Form::open(array('files' => 'true', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal'))}}
							<div class="form-group">
								{{Form::Label('name','Album',array('class' => 'col-md-2'))}}
								<div class="col-md-10">
								{{Form::label('name',$zf_album,array('class' => 'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								{{Form::label('year','Year:',array('class' => 'col-md-2 label-control'))}}
								<div class="col-md-10">
								{{Form::label('year',$zf_year,array('class' => 'col-md-2 form-control'))}}
								</div>	
							</div>
													
							<div class="form-group">
								{{Form::label('photo','Photo',array('class' => 'col-md-2'))}}
								<div class="col-md-10">
								{{Form::file('photo[]',array('multiple' => 'multiple'))}}
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