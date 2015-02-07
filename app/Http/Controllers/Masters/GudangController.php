<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Gudang;
use App\Models\Kecamatan;
use Response;

class GudangController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.master.gudang');
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
		$cari   = ucwords($request->input('cari', ''));
		$offset = ($page - 1) * $limit;

		$table    = Gudang::query();
		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/gudang/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/gudang/delete/'.$row->id),
				'back'=> url('master/gudang')
			);

			$rows[] = [
						'id'       => $row->id,
						'name'     => $row->name,
						'address'  => $row->address,
						'telepon'  => $row->telepon,
						'hp'       => $row->hp,
						'kecamatan'=> $row->kecamatan->name,
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
		$data['kecamatan']  = Kecamatan::all();
		return view('admin.master.gudangNew', $data);
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
				$table = new Gudang();				
			else:
				$table = Gudang::find($id);				
			endif;
			$table->name    = $request->input('name');
			$table->address = $request->input('address');
			$table->telepon = $request->input('telepon');
			$table->hp      = $request->input('hp');
			$table->kecamatan_id = $request->input('kecamatan');
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
		$data['data']   	   = Gudang::find($id);
		$data['kecamatan']     = Kecamatan::all();
		return view('admin.master.gudangEdit', $data);
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
			$model = Kecamatan::find($id);
			$model->delete();
			$this->back = 'true';
			$this->msg  = "delete successed";
		endif;

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

}
