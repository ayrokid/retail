<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Kelompok;
use Response;

class KelompokController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.master.kelompok');
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

		$table    = Kelompok::query();
		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/kelompok/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/kelompok/delete/'.$row->id),
				'back'=> url('master/kelompok')
			);

			$rows[] = [
						'id'       => $row->id, 
						'name'     => $row->name, 
						'update'   => to_date($row->updated_at), 
						'crud'     => $this->link($link) 
					];
		}

		$responce['total'] = $table->count();
		$responce['rows']  = $rows;

		return $responce;
	}

	public function create()
	{
		return view('admin.master.kelompokNew');
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
				$table = new Kelompok();
			else:
				$table = Kelompok::find($id);
			endif;
			$table->name = $request->input('name');
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
		$data['data'] = Kelompok::find($id);
		return view('admin.master.kelompokEdit', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request)
	{
		$this->msg = 'delete failed';
		if($request->ajax()):
			$table = Kelompok::find($request->segment(4));
			$table->delete();

			$this->back = 'true';
			$this->msg  = 'delete successed';
		endif;

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

	
}
