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
    <script src="/js/jquery.js"></script>  
  </head>
  <body>
  <div class="container">
         <div class="page-header">
             <!-- <img src="images/ecm_banner.jpg" alt="Banner" class="img-responsive"> -->
             <h1 style="font-style: italic;font-family: -webkit-pictograph;color: #fff; font-size:50px;">FATU ALBUM</h1>
         </div>           
          <div class="nav navbar-inverse">
           <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              @foreach($menu as $key => $value1)
                  <?php $flag=1; $f=0; $ ?>
                  @foreach($sub_menu as $key => $value)
                    <?php if($flag==1){ $flag=0; $f=1; ?>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$value1->menu_title}}</a>
                      <ul class="dropdown-menu" role="menu">
                    <?php } ?>  
                    @if($value->menu_id == $value1->id)
                      <li><a href="#">{{$value->sub_menu_title}}</a></li>
                    @endif
                  @endforeach       
                @if($f==1)
                </ul>
                @endif
                <li><a href="">list1</a></li>
              </li>
              @endforeach
            </ul>
          </div>
          </div><!--navigation-->
  </div><!--container-->
  <div class="container">         
        <div class="jumbotron"> 
            @yield('content')
        </div>
  </div>          
  <div class="container">
       <footer class="text-muted">
            <p>Copyright &copy; 2012</p>
        </footer>
  </div>        
      <script src="/js/bootstrap.js"></script>
      <script src="/js/jquery.blueimp-gallery.min.js"></script>
      <script src="/js/bootstrap-image-gallery.js"></script>
  </body>
</html>
