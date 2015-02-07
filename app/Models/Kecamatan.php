<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model{

	protected $table = 'kecamatan';

	public function kota()
	{
		return $this->belongsTo('App\Models\Kota');
	}
	
}