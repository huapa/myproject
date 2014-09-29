@extends('layout')
@section('content')
<div class="row">
	<div class="col-md-8">
		<div align="justify">
			<div class="panel panel-default" style="margin-bottom:1px;">
				<div class="panel-body">
					<h5><strong>{{$page->page_title}}</strong></h5>
					<hr>
					<p style="color:#af2d2d;">
						<strong>Posted at:</strong>&nbsp;
						<?php echo date("F d, Y", strtotime($page->created_at)); ?>
					</p> 
					<p>{{$page->page_content}}</p>
					<hr>
					<a href=""><img src="/images/fb.png"></a>
					<p style="color:#af2d2d;" class="pull-right">
						<strong>Posted by:</strong>&nbsp;Admin
					</p>
				</div>
			</div>
			<!-- this is for comment -->
			<div class="panel panel-default" style="background-color:#eeeeee">
				<div class="panel-body">
				<a href=""><p>Comments</p></a>
				<hr>
					<form class="form-horizontal" role="form">
					  <div class="form-group">
					    <label for="coment" class="col-sm-2 control-label"><img src="/images/test.jpg" width="60px" height="60px"></label>
					    <div class="col-sm-10">
					      <textarea class="form-control" placeholder="Enter comment" name="menu_description" cols="50" rows="3"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Comment</button>
					    </div>
					  </div>
					</form>
				</div>
			</div>
			<!-- comment ends -->	
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