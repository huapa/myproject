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
										<td style="vertical-align:middle;"><a href="{{URL::to('/manage-photo/'.$zf_item->id.'/'.$zf_item->zf_yearId)}}">{{$zf_item->zf_name}}</a></td>
							
										<td style="vertical-align:middle;">{{$zf_item->zf_year}}</td>
										
										<td style="vertical-align:middle;"><img src="/upload/{{$zf_item->zf_path}}" class="img-thumbnail" style="width:100%"></td>	
										<td style="vertical-align:middle;"><a href="{{URL::to('gallery/edit-album/'.$zf_item->id)}}"><i class="glyphicon glyphicon-pencil"></i></a></td>
										<td style="vertical-align:middle;"><a href="{{URL::to('gallery/delete-album/'.$zf_item->id)}}"><i class="glyphicon glyphicon-trash"></i></a></td>
									</tr>
							@endforeach
							
							
							</tbody>	
						</table>
					
					<?php echo $zf_data->links(); ?>
					</div>
				</div>
			</div>	
			<div class="col-md-4">
				<div class="panel panel-warning">
					<div class="panel-heading"><i class="glyphicon glyphicon-plus"></i> &nbsp;Add Album</div>
					<div class="panel-body">
						<?php
							//$zf_year=
						?>
						{{Form::open(array('files' => 'true','class' => 'form-horizontal'))}}
							<div class="form-group">
								{{Form::Label('name','Album',array('class' => 'col-md-2'))}}
								<div class="col-md-10">
								{{Form::text('name',null,array('class' => 'form-control'))}}
								</div>
							</div>
							<?php foreach($zf_year as $zf_value)
							{
								 $zf_newyear[$zf_value->zf_id]=$zf_value->zf_year;	
							}
							?>
							<div class="form-group">
								{{Form::label('year','Year',array('class' => 'col-md-2 label-control'))}}
								<div class="col-md-10">
								{{Form::select('year',$zf_newyear,'2002',array('class' => 'form-control'))}}
								</div>	
							</div>
							<div class="form-group">
								{{Form::label('photo','Photo',array('class' => 'col-md-2'))}}
								<div class="col-md-10">
								{{Form::file('photo')}}
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