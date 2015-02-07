<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Target extends Model{

	protected $table = 'target';

	public function karyawan()
	{
		return $this->belongsTo('App\Models\Karyawan');
	}
	
}