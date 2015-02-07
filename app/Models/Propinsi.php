<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propinsi extends Model{

	protected $table = 'propinsi';

	public function negara()
	{
		return $this->belongsTo('App\Models\Negara');
	}

	public function kota()
	{
		return $this->hasMany('App\Models\Kota');
	}
	
}