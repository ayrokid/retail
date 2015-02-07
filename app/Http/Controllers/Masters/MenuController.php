<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Menu;
use Response;

class MenuController extends HomeController{

	public function __construct()
	{
		//parent::__construct();
		//$this->middleware('auth');
	}

	public function index()
	{
		return view('admin.master.menu');
	}

	public function menuGrid(Request $request)
	{
		$page   = $request->input('page', 1); //Input::get('page', 1);
		$limit  = $request->input('row', 10); //Input::get('rows', 10);
		$sort   = $request->input('sort', 'id'); //Input::get('sort', 'id');
		$order  = $request->input('order', 'asc'); //Input::get('order', 'asc');
		$cari   = $request->input('cari', '');
		$offset = ($page - 1) * $limit;

		$table    = Menu::query();
		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/menu/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/menu/delete/'.$row->id),
				'back'=> url('master/menu')
			);

			$rows[] = [
						'id'       => $row->id,  
						'name'     => $row->name, 
						'info'     => $row->info, 
						'link'     => $row->link, 
						'update'   => to_date($row->updated_at), 
						'crud'     => $this->link($link) 
					];
		}

		$responce['total'] = $table->count();
		$responce['rows']  = $rows;

		return $responce;
	}

	public function menuNew()
	{
		$data['data'] = Menu::all();
		return view('admin.master.menuNew', $data);
	}

	public function menuSave(Request $request)
	{
		if ($request->ajax())
		{
			$id    = $request->segment(4);
			if($id == 'i'):
				$table = new Menu();				
			else:
				$table = Menu::find($id);				
			endif;
			$table->name = $request->input('name');
			$table->info = $request->input('info');
			$table->link = $request->input('link');
			$table->icon = $request->input('icon');
			$table->sub_id = $request->input('sub');
			$table->save();
			$this->back = 'true';
		}

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

	public function menuEdit($id)
	{
		$data['data'] = Menu::find($id);
		$data['menu'] = Menu::all();
		return view('admin.master.menuEdit', $data);
	}

	public function menuDelete(){
		$this->msg  = 'delete failed';

		if ($request->ajax()):	
			$id    = Request::segment(2);
			$model = Menu::find($id);
			$model->delete();
			$this->back = 'true';
			$this->msg  = "delete successed";		
		endif;

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

}