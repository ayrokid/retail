<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model{

	protected $table = 'grade';

	protected $fillable = array(
		'info'
	);

	private $rules = array(
		'info' => 'required'
	);
}