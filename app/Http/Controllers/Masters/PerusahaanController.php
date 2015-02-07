<?php namespace App\Http\Controllers\Masters;

use App\Http\Controllers\HomeController;
use App\Models\Pelanggan;
use App\Models\Propinsi;
use App\Models\Kota;
use Response;

use Illuminate\Http\Request;

class Perusahaan extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.master.perusahaan');
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

		$table    = Perusahaan::query();

		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/perusahaan/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/perusahaan/delete/'.$row->id),
				'back'=> url('master/perusahaan')
			);

			$rows[] = [
						'id'      => $row->id, 
						'name'    => $row->name,
						'address' => $row->address,
						'kota'    => $row->kota->name,
						'telepon' => $row->telepon,
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
		$data['propinsi']  = Propinsi::orderBy('name', 'asc')->get(array('id','name'));
		return view('admin.master.perusahaanBaru', $data);
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
			if( $id == 'i'):
				$table = new Perusahaan();
			else:
				$table = Perusahaan::find($id);
			endif;
			$table->name    = $request->input('name');
			$table->address = $request->input('address');
			
		}
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
