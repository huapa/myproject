@extends('layout')
@section('content')
<div class="row">
	<div class="col-md-8">
		<div align="justify">
			@foreach($page as $key => $value)
			<div class="panel panel-default">
				<div class="panel-body">
					<h4><strong>{{$value->page_title}}</strong></h4>
					<hr>
					<p style="color:#af2d2d;">
						<strong>Posted at:</strong>&nbsp;
						<?php echo date("F d, Y", strtotime($value->created_at)); ?>
					</p> 
					<p><?php echo substr($value->page_content,0,600); ?>...</p>
					<hr>
					<a href=""><img src="/images/fb.png"></a>
					<a class="pull-right" href="{{URL::to('details/'.$value->id.'/'.$value->path)}}">Read More</a>
				</div>
			</div>	
				
			@endforeach
		</div>
	</div>	
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<p>Category</p>
				<hr>
				<ul>
					@foreach($category as $key => $value)
					<li><a href="">{{$value->category_name}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@stop