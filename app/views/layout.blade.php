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
              <li><a href="{{URL::route('frondend')}}"><i class="glyphicon glyphicon-home"></i></a></li>
              @foreach($menu as $key => $value1)
                  <li class="dropdown">
                      <?php $submenu = Submenu::where('menu_id','=', $value1->id )->orderBy('position')->get(); ?>
                      @if($submenu->count() != 0)
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      @else
                        <a href="{{URL::route('frondend.content',$value1->id)}}" class="dropdown-toggle">
                      @endif 
                        {{$value1->menu_title}} 
                        <?php if($submenu->count() != 0) echo "<span class='caret'></span>"; ?>
                      </a>
                      @if($submenu->count() != 0)
                        <ul class="dropdown-menu" role="menu">
                        @foreach($submenu as $key => $value)
                          <li><a href="{{URL::route('frondend.sub_content',$value->id)}}">{{$value->sub_menu_title}}</a></li>
                        @endforeach       
                        </ul>
                      @endif
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
