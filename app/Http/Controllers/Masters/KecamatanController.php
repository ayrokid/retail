<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Kecamatan;
use Response;

class KecamatanController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.master.kecamatan');
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

		$table    = Kecamatan::query();
		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/kecamatan/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/kecamatan/delete/'.$row->id),
				'back'=> url('master/kecamatan')
			);

			$rows[] = [
						'id'       => $row->id,
						'name'     => $row->name,
						'code'     => $row->code,
						'kota'     => $row->kota->name,
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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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

	/**
	 * Search specified resource from storage
	 *
	 * @param string array
	 * @return Response
	 */
	public function search(Request $request)
	{
		$data = array();
		if($request->ajax())
		{
			$field  = $request->input('field');
			$search = $request->input('param');
			$data   = Kecamatan::orderBy('name','asc')
						->where($field, 'like', "$search%")
						->get(array('id','name', 'code'));			
		}

		return Response::json($data);
	}

}
