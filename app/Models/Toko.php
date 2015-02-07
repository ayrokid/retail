<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model{

	protected $table = 'toko';

	public function grade()
	{
		return $this->belongsTo('App\Models\Grade');
	}

	public function kecamatan()
	{
		return $this->belongsTo('App\Models\Kecamatan');
	}

	public function kota()
	{
		return $this->belongsToMany('Kecamatan', 'Kota', 'kecamatan_id', 'kecamatan.id');
	}

	public function pelanggan()
	{
		return $this->belongsTo('App\Models\Pelanggan');
	}
	
}