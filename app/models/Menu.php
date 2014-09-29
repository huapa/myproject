<?php
Class Menu extends Eloquent
{
	
	protected $table='menu';
	public function sub_menu()
    {
        return $this->belongsTo('Submenu');
    }
	
}
