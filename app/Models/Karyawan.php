<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model{

	protected $table = 'karyawan';

	protected $fillable = array(
		'nik','name','address','telepon','hp','ktp'
	);

	private $rules = array(
		'nik' => 'required|alnum',
		'name'=> 'required',
	);

	public function kecamatan()
	{
		return $this->belongsTo('App\Models\Kecamatan');
	}

	public function kota()
	{
		return $this->belongsToMany('Kecamatan', 'Kota', 'kecamatan_id', 'kecamatan.id');
	}

	public function bagian()
	{
		return $this->belongsTo('App\Models\Bagian');
	}

	public function gudang()
	{
		return $this->belongsTo('App\Models\Gudang');
	}

}