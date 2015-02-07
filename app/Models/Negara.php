<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model{
	
	protected $table = 'negara';

	public function propinsi()
	{
		return $this->hasMany('propinsi');
	}
}