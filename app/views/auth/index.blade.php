<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>My Website</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/blueimp-gallery.min.css" rel="stylesheet">
    <link  href="/css/bootstrap-image-gallery.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/user.css" rel="stylesheet">
  </head>
  <body style="margin-top:100px">
      <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
          <div class="panel panel-info">
            <div class="panel-heading"><i class="glyphicon glyphicon-lock"></i><strong>LOGIN</strong></div>
            <div class="panel-body">
            {{Form::open(array('route' => 'user','class' => 'form-horizontal'))}}
                {{Form::label('name','Username')}}
                {{Form::text('name','',array('class' => 'form-control','placeholder' => 'Enter Username'))}}
                {{Form::label('name','Password')}}
                {{Form::password('pwd',array('class' => 'form-control','placeholder' => 'Enter Password'))}}
                <hr>
              <footer>
                {{Form::submit('Cancel',array('class' => 'btn btn-default'))}}
                {{Form::submit('Log In',array('class' => 'btn btn-primary'))}}
              </footer>
            {{Form::close()}}
            </div> 
          </div>
        </div>  
      </div>
   </body>
</html>
