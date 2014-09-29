@extends('backend')
@section('content')
<script type="text/javascript" src="/../js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		@include('alert.message')
		<div class="panel panel-default">
			<div class="panel-heading">Edit Page</div>
			<div class="panel-body">
			 {{Form::model($page,array('route'=>array('page.update',$page->id),'id' => "myform",'method' => 'PUT'))}}
		         <div class="form-group">
		            <label>Page title</label>  
		            {{Form::text('page_title',Input::old('page_title'),array('class'=>'form-control','placeholder' => 'Page title'))}}
		            <span id="message">
		              @if($errors->has('page_title'))
		                <p class="text-danger">* {{$errors->first('page_title')}}</p>
		              @endif
		            </span>
		         </div>
		         <div class="form-group">
		            <label>Category</label>  
		            {{Form::select('category_id',$category,'0',array('id' => 'menu','class' => 'form-control'))}}
		            <span id="message">
		               @if($errors->has('category_id')) 
		               <p class="text-danger">* {{$errors->first('category_id')}}</p>
		               @endif
		            </span>
		         </div>
		         <div class="form-group">
		            <label>Body</label>  
		            {{Form::textarea('page_content',Input::old('page_content'),array('class'=>'form-control','placeholder' => 'First name'))}}
		            <span id="message">
		               @if($errors->has('page_content')) 
		               <p class="text-danger">* {{$errors->first('page_content')}}</p>
		               @endif
		            </span>
		         </div>
		         <div class="form-group">
		            <label>Menu Name</label>  
		            {{Form::select('menu_id',$menu,Input::old('menu_id'),array('id' => 'menu','class' => 'form-control','onchange' => 'sub_menu(this.value)'))}}
		            <span id="message">
		               @if($errors->has('menu_id')) 
		               <p class="text-danger">* {{$errors->first('menu_id')}}</p>
		               @endif
		            </span>
		         </div>
		         <div class="form-group" id="sub_menu">
		         	<label>Sub-menu Name</label>  
		            {{Form::select('sub_menu_id',$sub_menu,Input::old('sub_menu_id'),array('id' => 'menu','class' => 'form-control'))}}
		            <span id="message">
		               @if($errors->has('sub_menu_id')) 
		               <p class="text-danger">* {{$errors->first('sub_menu_id')}}</p>
		               @endif
		            </span>
		         </div>
		         <div class="form-group">
					<div class="checkbox">
				    <label>
				      <input type="checkbox" id="mycheckbox" name="home"> Promoted to Home Page
				    </label>
				 </div> 	
				 </div>
			   	 <hr>
		         <div class="form-group">
		            {{Form::submit('Submit',array('class' => 'btn btn-primary','id' => 'submit'))}}
		         </div>
        	{{Form::close()}}
			</div>
		</div>
	</div>
	<script>
	// $('document').ready(function(){
	// 	 $('#sub_menu').hide();
	// 	 $('#mycheckbox').click(function(){
	// 	 	if($('#mycheckbox').is(':checked'))
	// 	 	{
	// 			$('#sub_menu').show();		 		
	// 	 	}	
	// 	 	else
	// 	 	{
	// 	 		$('#sub_menu').hide();
	// 	 	}
	// 	 });
		 
	// });
	function sub_menu(str){
		$.ajax({
			url: "{{ URL::route('page.process')}}",
			data: {'id': str},
			type: 'GET', 
		}).success(function(data){
			$('#sub_menu').html(data);
		});

	}

	</script>
</div>
@stop