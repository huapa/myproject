@extends('backend')
@section('content')
<div class="row">
@if(Session::has('message'))
  <span><p class="alert alert-success">{{Session::get('message')}}</p></span>
@endif
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
            </tr>
            @foreach($category as $key => $value)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->category_name}}</td>
              <td>{{$value->category_description}}</td>
              <td>{{$value->position}}</td>
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
      {{Form::model($category_data,array('route'=>array('category.update',$category_data->id),'method' => 'PUT'))}}
          <div class="form-group">
            <label>Category Name</label>  
            {{Form::text('category_name',Input::old('category_name'),array('class'=>'form-control','placeholder' => 'Menu name'))}}
            <span id="message">
              @if($errors->has('category_name'))
                <p class="text-danger">* {{$errors->first('category_name')}}</p>
              @endif
            </span>
          </div>
          <div class="form-group">
            <label>Category Description</label>  
            {{Form::textarea('category_description',Input::old('category_description'),array('class'=>'form-control','placeholder' => 'Menu description'))}}
            <span id="message">
               @if($errors->has('category_description')) 
               <p class="text-danger">* {{$errors->first('category_description')}}</p>
               @endif
            </span>
          </div>
          
          <div class="form-group">
            <label>Position</label>  
            {{Form::text('position',Input::old('position'),array('class'=>'form-control','placeholder' => 'Position'))}}
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
  </div>
</div>
@stop