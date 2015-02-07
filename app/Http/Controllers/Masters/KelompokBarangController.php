<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\KelompokBarang;
use Response;


class KelompokBarangController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.master.kelompok-barang');
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

		$table    = KelompokBarang::query();
		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/kelompok-barang/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/kelompok-barang/delete/'.$row->id),
				'back'=> url('master/kelompok-barang')
			);

			$rows[] = [
						'id'       => $row->id, 
						'name'     => $row->name,
						'expire'   => $row->expire,
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
		return view('admin.master.kelompok-barangNew');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if($request->ajax())
		{
			$id = $request->segment(4);
			if('i' == $id):
				$table = new KelompokBarang();
			else:
				$table = KelompokBarang::find($id);
			endif;
			$table->name   = $request->input('name');
			$table->expire = $request->input('expire');
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
		$data['data'] = KelompokBarang::find($id);
		return view('admin.master.kelompok-barangEdit', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->msg = 'delete failed';
		if($request->ajax()):
			$table = KelompokBarang::find($id);
			$table->delete();

			$this->back = 'true';
			$this->msg  = 'delete successed';
		endif;

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}


}
