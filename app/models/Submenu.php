<?php
Class Submenu extends Eloquent
{
	
	protected $table='sub_menu';
	public function menu()
    {
        return $this->belongsTo('Menu','menu_id');
    }
}
		
