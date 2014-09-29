@extends('backend')
@section('content')
<div class="row">
@include('alert.message')
  <div class="col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading">Display Category Information</div>
      <div class="panel-body">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Category Description</th>
              <th>Position</th>
              <th>Action</th>
            </tr>
            @foreach($category as $key => $value)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->category_name}}</td>
              <td>{{$value->category_description}}</td>
              <td>{{$value->position}}</td>
              <td>
                <table>
                  <tr>
                    <td><a href="{{URL::route('category.edit',$value->id)}}"><button class="btn-default"><i class="glyphicon glyphicon-pencil"></i></button></a></td>
                    <td style="padding-left:20px;">
                     {{Form::open(array('route'=>array('category.destroy',$value->id),'method' => 'DELETE','id' => 'del'))}}
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
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">Add Category</div>
      <div class="panel-body">
      {{Form::open(array('route'=>'category.store','id' => "myform"))}}
          <div class="form-group">
            <label>Category Name</label>  
            {{Form::text('category_name','',array('class'=>'form-control','placeholder' => 'Menu name'))}}
            <span id="message">
              @if($errors->has('category_name'))
                <p class="text-danger">* {{$errors->first('category_name')}}</p>
              @endif
            </span>
          </div>
          <div class="form-group">
            <label>Category Description</label>  
            {{Form::textarea('category_description','',array('class'=>'form-control','placeholder' => 'Menu description'))}}
            <span id="message">
               @if($errors->has('category_description')) 
               <p class="text-danger">* {{$errors->first('category_description')}}</p>
               @endif
            </span>
          </div>
          
          <div class="form-group">
            <label>Position</label>  
            {{Form::text('position','',array('class'=>'form-control','placeholder' => 'Position'))}}
          <span id="message">
          	@if($errors->has('position'))
          	<p class="text-danger">* {{$errors->first('position')}}</p>
          	@endif
          </span>
          </div>
          <div class="form-group">
            {{Form::submit('Submit',array('class' => 'btn btn-primary','id' => 'submit'))}}
          </div>
        {{Form::close()}}  
      </div>
    </div>  
  <script>
  $('document').ready(function(){
    $('.alert').alert();  
  })
  
  </script>
  </div>
</div>
@stop