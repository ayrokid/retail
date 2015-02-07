<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Toko;
use App\Models\Kecamatan;
use App\Models\Grade;
use App\Models\Pelanggan;
use App\Models\Propinsi;
use Response;

class TokoController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.master.toko');
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

		$table    = Toko::query();
		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/toko/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/toko/delete/'.$row->id),
				'back'=> url('master/toko')
			);

			$rows[] = [
						'id'       => $row->id,  
						'name'     => $row->name, 
						'address'  => $row->address, 
						'telepon'  => $row->telepon, 
						'top'      => $row->top,
						'plafon'   => $row->plafon,
						'update'   => to_date($row->updated_at), 
						'crud'     => $this->link($link) 
					];
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['propinsi']   = Propinsi::orderBy('name','asc')->get(array('id','name'));
		$data['bagian']     = Grade::orderBy('info','asc')->get(array('id','info'));
		return view('admin.master.tokoNew', $data);
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
				$table = new Toko();				
			else:
				$table = Toko::find($id);				
			endif;
			$table->name         = $request->input('name');
			$table->address      = $request->input('address');
			$table->telepon      = $request->input('telepon');
			$table->cp           = $request->input('cp');
			$table->kecamatan_id = $request->input('kecamatan');
			$table->fax          = $request->input('fax');
			$table->top          = $request->input('top');
			$table->plafon       = $request->input('plafon');
			$table->pelanggan_id = $request->input('pelanggan');
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
