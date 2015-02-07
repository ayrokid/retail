<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model{

	protected $table = 'gudang';

	public function kecamatan()
	{
		return $this->belongsTo('App\Models\Kecamatan');
	}
}