<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model{

	protected $table = 'pelanggan';

	public function toko()
	{
		return $this->hasMany('perusahaan');
	}

	public function kota()
	{
		return $this->belongsTo('App\Models\Kota');
	}
	
}