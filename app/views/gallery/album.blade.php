@extends('layout')
@section('content')
<div class="container">	        
           <div class="jumbotron">
              <div class="row">
                  <div class="col-md-8">
                      <div class="panel panel-default">
                          <div class="panel-heading"><i class="glyphicon glyphicon-film"></i> PHOTO ALBUM</div>
                              <div class="panel-body">
                                   <table class="table table-responsive">
                                      <?php
                                          $flag=1;
                                          $count=0;
                                        
                                         foreach ($zf_data as $zf_item) 
                                         {
                                           $count++;
                                            if($flag==1)
                                            {
                                              echo "<tr>";
                                              $flag=0;
                                            }
                                             if($count <= 2)
                                            {
                                                
                                               echo "<div class='col-md-6'>
                                                          <td>
                                                            <a href='gallery/photo/$zf_item->id/$zf_item->zf_yearId'>
                                                                <div class='thumbnail'>
                                                                  
                                                                  <img src='upload/$zf_item->zf_path' style='width:100%;'>
                                                                  <div class='caption'>
                                                                   <h5>$zf_item->zf_name</h5>                                                                  
                                                                  </div>
                                                                </div> 
                                                            </a>  
                                                            </td>
                                                      </div>";
                                                
                                            }
                                            if($count == 2)
                                            {
                                              echo "</tr>";
                                              $count=0;
                                              $flag=1;
                                            }
                                          }                                           
                                       ?>  
                                   </table>             
                                  <?php echo $zf_data->links(); ?> 
                               </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                        <div class="panel panel-warning">
                          <div class="panel-heading"><i class="glyphicon glyphicon-th-large"></i> Category</div>
                           <div class="panel-body">
                              <ul>
                              @foreach($zf_year as $zf_item)
                                <li><a href="#">{{$zf_item->zf_year}}</a></li>                                
                              @endforeach
                              </ul> 
                              
                           </div>
                        </div>
                  </div>
            </div><!-- <rows ends> -->        
        </div><!-- jambotron ends -->
</div><!-- <container ends> -->        
@stop