<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Kota;
use App\Models\Supplier;
use Response;

class SupplierController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.master.supplier');
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

		$table    = Supplier::query();
		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/supplier/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/supplier/delete/'.$row->id),
				'back'=> url('master/supplier')
			);

			$rows[] = [
						'id'       => $row->id, 
						'code'     => $row->code, 
						'name'     => $row->name, 
						'address'  => $row->address, 
						'telepon'  => $row->telepon, 
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
		$data['kota']  = Kota::all();
		return view('admin.master.supplierNew', $data);
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
				$table = new Supplier();				
			else:
				$table = Supplier::find($id);				
			endif;
			$table->name    = $request->input('name');
			$table->address = $request->input('address');
			$table->telepon = $request->input('telepon');
			$table->fax     = $request->input('fax');
			$table->kota_id = $request->input('kota');
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
		$data['data']     = Supplier::find($id);
		$data['kota']     = Kota::all();
		return view('admin.master.supplierEdit', $data);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->msg  = 'delete failed';

		if ($request->ajax()):
			$model = Supplier::find($id);
			$model->delete();
			$this->back = 'true';
			$this->msg  = "delete successed";
		endif;

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

}
