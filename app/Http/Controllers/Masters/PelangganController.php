<?php namespace App\Http\Controllers\Masters;

use App\Http\Controllers\HomeController;
use App\Models\Pelanggan;
use App\Models\Propinsi;
use App\Models\Kota;
use Response;

use Illuminate\Http\Request;

class PelangganController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.master.pelanggan');
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
		$sort   = $request->input('sort', 'name'); 
		$order  = $request->input('order', 'asc');
		$cari   = $request->input('cari', '');
		$offset = ($page - 1) * $limit;

		$table    = Pelanggan::query();

		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/pelanggan/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/pelanggan/delete/'.$row->id),
				'back'=> url('master/pelanggan')
			);

			$rows[] = [
						'id'      => $row->id, 
						'name'    => $row->name,
						'address' => $row->address,
						'kota'    => $row->kota->name,
						'telepon' => $row->telepon,
						'hp'      => $row->hp,
						'update'  => to_date($row->updated_at), 
						'crud'    => $this->link($link) 
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
		return view('admin.master.pelangganNew', $data);
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
				$table = new Pelanggan();				
			else:
				$table = Pelanggan::find($id);				
			endif;
			$table->name       = $request->input('name');
			$table->address    = $request->input('address');
			$table->telepon    = $request->input('telepon');
			$table->hp         = $request->input('hp');
			$table->fax        = $request->input('fax');
			$table->kota_id    = $request->input('kota');
			$table->zip_code   = $request->input('kode-pos');
			$table->email      = $request->input('email');
			$table->sex        = $request->input('gender');
			$table->status     = $request->input('marital');
			$table->agama      = $request->input('agama');
			$table->tmpt_lhr   = $request->input('tmpt-lahir-id');
			$table->tgl_lhr    = $request->input('tgl-lahir');
			$table->type_id    = $request->input('type-id');
			$table->no_id      = $request->input('no-id');
			$table->npwp       = $request->input('npwp');
			$table->flag       = '1';
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
		$data['data']   	= Pelanggan::find($id);
		$data['propinsi']   = Propinsi::orderBy('name','asc')->get(array('id','name'));
		return view('admin.master.pelangganEdit', $data);
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
			$model = Pelanggan::find($request->segment(4));
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
			$get    = Pelanggan::orderBy('name','asc')
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
