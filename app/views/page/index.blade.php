@extends('backend')
@section('content')
<div class="row">
	<div class="col-md-9 col-md-offset-1">
		@include('alert.message')
		<div class="panel panel-default">
			<div class="panel-heading">Page List</div>
			<div class="panel-body">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th>#</th>
							<th>Page title</th>
							<th>Category</th>
							<th>Path</th>
							<th>Action</th>	
						</tr>
						@foreach($page as $key => $value)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$value->page_title}}</td>
							<td>{{$value->category_name}}</td>
							<td>{{$value->path}}</td>
							<td>
								<table>
				                    <tr>
				                      <td><a href="{{URL::route('page.edit',$value->id)}}"><button class="btn-default"><i class="glyphicon glyphicon-pencil"></i></button></a></td>
				                      <td style="padding-left:20px;">
				                        {{Form::open(array('route'=>array('page.destroy',$value->id),'method' => 'DELETE','id' => 'del'))}}
				                        <button><i class="glyphicon glyphicon-trash"></i></button>
				                        <!-- <a href="javascript:void();" onclick="$('form').submit()"><i class="glyphicon glyphicon-trash"></i></a> -->
				                        {{Form::close()}}
				                      </td>
				                    </tr>
				                </table>
							</td>
						</tr>
						@endforeach	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop