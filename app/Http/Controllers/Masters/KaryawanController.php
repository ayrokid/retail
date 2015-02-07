<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Gudang;
use App\Models\Propinsi;
use App\Models\Bagian;
use App\Models\karyawan;
use Response;

class KaryawanController extends HomeController{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.master.karyawan');
	}

	/**
	 * show all resource in storage.
	 *
	 * @return Response
	 */
	public function grid(Request $request)
	{
		$page   = $request->input('page', 1); 
		$limit  = $request->input('row', 10); 
		$sort   = $request->input('sort', 'id'); 
		$order  = $request->input('order', 'asc');
		$cari   = $request->input('cari', '');
		$offset = ($page - 1) * $limit;

		$table    = Karyawan::query();
		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/karyawan/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/karyawan/delete/'.$row->id),
				'back'=> url('master/karyawan')
			);

			$rows[] = [
						'nik'      => $row->id,
						'name'     => $row->name,
						'address'  => $row->address,
						'telepon'  => $row->telepon,
						'hp'       => $row->hp,
						'kecamatan'=> $row->kecamatan->name,
						'bagian'   => $row->bagian->name,
						'gudang'   => $row->gudang->name,
						'update'   => to_date($row->updated_at), 
						'crud'     => $this->link($link) 
					];
		}

		$responce['total'] = $table->count();
		$responce['rows']  = $rows;

		return $responce;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['propinsi']   = Propinsi::orderBy('name','asc')->get(array('id','name'));
		$data['bagian']     = Bagian::orderBy('name','asc')->get(array('id','name'));
		$data['gudang']     = Gudang::orderBy('name','asc')->get(array('id','name'));
		return view('admin.master.karyawanNew', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if ($request->ajax())
		{
			$id    = $request->segment(4);
			if($id == 'i'):
				$table = new Karyawan();				
			else:
				$table = Karyawan::find($id);				
			endif;
			$table->nik          = $request->input('nik');
			$table->name         = $request->input('name');
			$table->address      = $request->input('address');
			$table->telepon      = $request->input('telepon');
			$table->hp           = $request->input('hp');
			$table->kecamatan_id = $request->input('kecamatan');
			$table->ktp          = $request->input('ktp');
			$table->bagian_id    = $request->input('bagian');
			$table->gudang_id    = $request->input('gudang');
			$table->flag         = '1';
			$table->save();
			$this->back = 'true';
		}

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['data']   	= Karyawan::find($id);
		$data['propinsi']   = Propinsi::orderBy('name','asc')->get(array('id','name'));
		$data['bagian']     = Bagian::orderBy('name','asc')->get(array('id','name'));
		$data['gudang']     = Gudang::orderBy('name','asc')->get(array('id','name'));
		return view('admin.master.karyawanEdit', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request)
	{
		$this->msg  = 'delete failed';

		if ($request->ajax()):
			$model = Karyawan::find($request->segment(4));
			$model->delete();
			$this->back = 'true';
			$this->msg  = "delete successed";
		endif;

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

	public function search(Request $request)
	{
		$data = array();
		if($request->ajax())
		{
			$field  = $request->input('field');
			$search = $request->input('param');
			$get    = Karyawan::orderBy('name','asc')
						->where($field, 'like', "$search%")
						->get(array('id','name','address'));
			foreach ($get as $value) {
						$data[] = array(
							'label' => $value->name,
							'desc'  => $value->address,
							'id'    => $value->id
						);
					}		
		}

		return Response::json($data);	
	}
}