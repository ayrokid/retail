<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Bagian;
use Response;

class BagianController extends HomeController{

	public function __construct()
	{
		//parent::__construct();
		//$this->middleware('auth');
	}

	public function index()
	{
		return view('admin.master.bagian');
	}

	public function bagianGrid(Request $request)
	{
		$page   = $request->input('page', 1); //Input::get('page', 1);
		$limit  = $request->input('row', 10); //Input::get('rows', 10);
		$sort   = $request->input('sort', 'id'); //Input::get('sort', 'id');
		$order  = $request->input('order', 'asc'); //Input::get('order', 'asc');
		$cari   = $request->input('cari', '');
		$offset = ($page - 1) * $limit;

		$table    = Bagian::query();
		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/bagian/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/bagian/delete/'.$row->id),
				'back'=> url('master/bagian')
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

	public function bagianNew()
	{
		return view('admin.master.bagianNew');
	}

	public function bagianSave(Request $request)
	{
		if ($request->ajax())
		{
			$id    = $request->segment(4);
			if($id == 'i'):
				$table = new Bagian();				
			else:
				$table = Bagian::find($id);				
			endif;
			$table->name = $request->input('name');
			$table->save();
			$this->back = 'true';
		}

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

	public function bagianEdit($id)
	{
		$data['data'] = Bagian::find($id);
		return view('admin.master.bagianEdit', $data);
	}

	public function bagianDelete(Request $request){
		$this->msg  = 'delete failed';

		if ($request->ajax()):
			$model = Bagian::find($request->segment(4));
			$model->delete();
			$this->back = 'true';
			$this->msg  = "delete successed";		
		endif;

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

}
