<div class="form-group" id="sub_menu">
	<label>Sub-menu Name</label>  
	{{Form::select('sub_menu_id',$sub_menu,'',array('class' => 'form-control'))}}
	<span id="message">
	   @if($errors->has('first_name')) 
	   <p class="text-danger">* {{$errors->first('first_name')}}</p>
	   @endif
	</span>
</div>