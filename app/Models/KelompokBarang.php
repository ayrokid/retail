<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelompokBarang extends Model{

	protected $table = 'kelompok_barang';

	protected $fillable = array(
		'name', 'expire'
	);

	private $rules = array(
		'name' => 'required'
	);

}