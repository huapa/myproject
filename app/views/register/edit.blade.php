@extends('backend')
@section('content')
<div class="row">
@if(Session::has('message'))
  <span><p class="alert alert-success">{{Session::get('message')}}</p></span>
@endif
  <div class="col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading">Display User Information</div>
      <div class="panel-body">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>#</th>
              <th>Email address</th>
              <th>First name</th>
              <th>Last name</th>
            </tr>
            @foreach($data as $key => $value)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->email}}</td>
              <td>{{$value->first_name}}</td>
              <td>{{$value->last_name}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">Edit User</div>
      <div class="panel-body">
        {{Form::model($users,array('route' => array('register.update',$users->id),'method' => 'PUT'))}}
          <div class="form-group">
            <label>Email Address</label>  
            {{Form::text('email',Input::old('email'),array('class'=>'form-control','placeholder' => 'Email'))}}
            <span id="message">
              @if($errors->has('email'))
                <p class="text-danger">* {{$errors->first('email')}}</p>
              @endif
            </span>
          </div>
          <div class="form-group">
            <label>FirstName</label>  
            {{Form::text('first_name',Input::old('first_name'),array('class'=>'form-control','placeholder' => 'First name'))}}
            <span id="message">
               @if($errors->has('first_name')) 
               <p class="text-danger">* {{$errors->first('first_name')}}</p>
               @endif
            </span>
          </div>
          <div class="form-group">
            <label>LastName</label>  
            {{Form::text('last_name',Input::old('last_name'),array('class'=>'form-control','placeholder' => 'Last name'))}}
          </div>
          <div class="form-group">
            <label>Password</label>  
            {{Form::password('password',array('class'=>'form-control','id' => 'password','placeholder' => 'Password'))}}
            <span id="message">
               @if($errors->has('password')) 
              <p class="text-danger">* {{$errors->first('password')}}</p>  
               @endif
            </span>
          </div>
          <div class="form-group">
            <label>Confirm Password</label>  
            {{Form::password('confirm_password',array('class'=>'form-control','id' => 'confirm_password','placeholder' => 'Re-enter password'))}}
            <span id='message'>
              @if($errors->has('confirm_password'))
                  <p class="text-danger">* {{$errors->first('confirm_password')}}</p>    
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
<script>
$(document).ready(function() {
    $('#submit').click(function(event){
        // data = $('#password').val();
        // event.preventDefault();
        // var len = data.length;
        // if(len < 1) {
        //     alert("Password cannot be blank");
        //     event.preventDefault();
        // }
         
        if($('#password').val() != $('#confirm_password').val()) {
            alert("Password and Confirm Password don't match");
            // Prevent form submission
            event.preventDefault();
          }
         
    });
});
</script>
@stop