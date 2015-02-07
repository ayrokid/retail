<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model{

	protected $table = 'perusahaan';

	public function pelanggan()
	{
		return $this->belongsTo('pelanggan');
	}
	
	public function kota()
	{
		return $this->belongsTo('App\Models\Kota');
	}
}