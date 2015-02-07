<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model{

	protected $table = 'bagian';

	protected $fillable = array(
		'name'
	);

	private $rules = array(
		'name' => 'required|alnum'
	);
}