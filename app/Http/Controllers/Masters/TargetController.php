<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Target;
use App\Models\Karyawan;
use Response;

class TargetController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.master.target');
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
		$sort   = $request->input('sort', 'target.id'); 
		$order  = $request->input('order', 'asc');
		$cari   = $request->input('cari', '');
		$offset = ($page - 1) * $limit;

		$table    = Target::leftJoin('Karyawan', function($join) {
					    $join->on('karyawan_id', '=', 'karyawan.id');
					});

		$getTable = $table->where('karyawan.name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/target/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/target/delete/'.$row->id),
				'back'=> url('master/target')
			);

			$rows[] = [
						'id'     => $row->id, 
						'name'   => $row->karyawan->name,
						'tahun'  => $row->tahun,
						'b1'     => $row->b01,
						'b2'     => $row->b02,
						'b3'     => $row->b03,
						'b4'     => $row->b04,
						'b5'     => $row->b05,
						'b6'     => $row->b06,
						'b7'     => $row->b07,
						'b8'     => $row->b08,
						'b9'     => $row->b09,
						'b10'    => $row->b10,
						'b11'    => $row->b11,
						'b12'    => $row->b12,
						'update' => to_date($row->updated_at), 
						'crud'   => $this->link($link) 
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
		return view('admin.master.targetNew');
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
			$id = $request->segment(4);
			if ('i' == $id) {
				$table = new Target();
			} else {
				$table = Target::find($id);
			}

			$table->tahun = $request->input('tahun');
			$table->b01   = $request->input('b1');
			$table->b02   = $request->input('b2');
			$table->b03   = $request->input('b3');
			$table->b04   = $request->input('b4');
			$table->b05   = $request->input('b5');
			$table->b06   = $request->input('b6');
			$table->b07   = $request->input('b7');
			$table->b08   = $request->input('b8');
			$table->b09   = $request->input('b9');
			$table->b10   = $request->input('b10');
			$table->b11   = $request->input('b11');
			$table->b12   = $request->input('b12');
			$table->karyawan_id = $request->input('karyawan_id');	
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
		$data['data'] = Target::find($id);
		return view('admin.master.targetEdit', $data);
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
			$table = Target::find($id);
			$table->delete();

			$this->back = 'true';
			$this->msg  = 'delete successed';
		endif;

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

}
