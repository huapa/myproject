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
				@foreach($comment as $key => $value)
					<div class="row">
						<div class="col-md-12">
						</div>
						<div class="col-md-2">
							<img src="/images/pro_thumbnail.png" style="width:70px; height:70px;">
						</div>
						<div class="col-md-10">
							<div class="jumbotron"><strong>{{$value->user_name}}:</strong><p>{{$value->body}}</p><p style="color:#cccccc;"><?php echo time_elapsed_string($value->created_at); ?></p></div>
						
						</div>
					</div>
				@endforeach
					{{Form::open(array('class' => 'form-horizontal','route' =>'comment' ,'method' => 'POST'))}}
					  <div class="form-group">
					    <label for="coment" class="col-sm-2 control-label"><img src="/images/pro_thumbnail.png" width="60px" height="60px"></label>
					    <div class="col-sm-10">
					      <textarea class="form-control" placeholder="Enter comment" name="comment" cols="50" rows="3"></textarea>
					    </div>
					  </div>
					  {{Form::hidden('page_id',$page->id)}}
					  {{Form::hidden('page_path',$page->path)}}
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Comment</button>
					    </div>
					  </div>
					{{Form::close()}}
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
<?php
		function time_elapsed_string($datetime, $full = false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
 ?>	
@stop