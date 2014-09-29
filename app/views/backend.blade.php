
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Panel</title>
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../css/backend.css" rel="stylesheet">
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="../../js/jquery.js"></script> 
    <script src="../../js/bootstrap.js"></script>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{URL::route('register.index')}}">Add User</a></li>
            <li><a href="#">Setting</a></li>
            <li><a href="{{URL::route('logout')}}">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
            <li>
              <a href="{{URL::route('page.index')}}">Page</a>
              <ul>
                <li><a href="{{URL::route('page.create')}}">Create Basic</a></li>
              </ul>
            </li>
            <li><a href="{{URL::route('menu.index')}}">Menu</a></li>
            <li><a href="{{URL::route('sub-menu.index')}}">Sub Menu</a></li>
            <li><a href="{{URL::route('category.index')}}">Category</a></li>
            <li><a href="{{URL::route('comment.index')}}">Comment</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--script src="../../assets/js/ie10-viewport-bug-workaround.js"></script-->
  </body>
</html>
