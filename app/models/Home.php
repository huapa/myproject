<?php
Class Home extends Eloquent
{
	public $timestamps=false;
	protected $table="zf_album";
	public function zf_albumyear()
	{
		return $this->hasMany('zf_albumyear');
	}
}