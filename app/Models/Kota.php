<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Kota extends Model{

	protected $table = 'kota';

	public function propinsi()
	{
		return $this->belongsTo('App\Models\Propinsi');
	}

	public function kecamatan()
	{
		return $this->hasMany('App\Models\Kecamatan');
	}
	
}