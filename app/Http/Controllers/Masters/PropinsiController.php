<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Propinsi;
use Response;

class PropinsiController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.master.propinsi');
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

		$table    = Propinsi::query();
		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/propinsi/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/propinsi/delete/'.$row->id),
				'back'=> url('master/propinsi')
			);

			$rows[] = [
						'id'       => $row->id,
						'name'     => $row->name,
						'code'     => $row->area_code,
						'negara'   => $row->negara->name,
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
		//return
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
			$data   = Propinsi::where($field, 'like', "$search%")->get();			
		}

		return Response::json($data);
	}

}
