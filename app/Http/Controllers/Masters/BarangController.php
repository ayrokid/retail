<?php namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Barang;
use App\Models\Supplier;
use Response;

class BarangController extends HomeController{

	public function __construct()
	{
		//parent::__construct();
		//$this->middleware('auth');
	}

	public function index()
	{
		return view('admin.master.barang');
	}

	public function barangGrid(Request $request)
	{
		$page   = $request->input('page', 1); //Input::get('page', 1);
		$limit  = $request->input('row', 10); //Input::get('rows', 10);
		$sort   = $request->input('sort', 'id'); //Input::get('sort', 'id');
		$order  = $request->input('order', 'asc'); //Input::get('order', 'asc');
		$cari   = $request->input('cari', '');
		$offset = ($page - 1) * $limit;

		$table    = Barang::query();
		$getTable = $table->where('name', 'like', "$cari%")->orderBy($sort, $order);

		$rows  = array();
		foreach ($getTable->skip($offset)->take($limit)->get() as $row) {
			$link['edit'] = array(
				'url' => url('master/barang/edit/'.$row->id)
			);
			$link['delete'] = array(
				'url' => url('master/barang/delete/'.$row->id),
				'back'=> url('master/barang')
			);

			$rows[] = [
						'id'       => $row->id, 
						'code'     => $row->code, 
						'name'     => $row->name, 
						'location' => $row->location, 
						'buy'      => currency_idr($row->price_buy), 
						'sell'     => currency_idr($row->price_sell), 
						'stock'    => $row->stock_current,
						'update'   => to_date($row->updated_at), 
						'crud'     => $this->link($link)
					];
		}

		$responce['total'] = $table->count();
		$responce['rows']  = $rows;

		return $responce;
	}

	public function barangNew()
	{
		$data['supplier'] = Supplier::all();
		return view('admin.master.barangNew', $data);
	}

	public function barangSave(Request $request)
	{
		if ($request->ajax())
		{
			$id    = $request->segment(4);
			if($id == 'i'):
				$table = new Barang();				
			else:
				$table = Barang::find($id);				
			endif;
			$table->code = $request->input('code');
			$table->name = $request->input('name');
			$table->barcode     = $request->input('barcode');
			$table->location    = $request->input('location');
			$table->price_buy   = filter_numeric($request->input('price_buy'));
			$table->price_sell  = filter_numeric($request->input('price_sell'));
			$table->piece       = $request->input('piece');
			$table->stock_min   = filter_numeric($request->input('stock_min'));
			$table->stock_max   = filter_numeric($request->input('stock_max'));
			$table->supplier_id = $request->input('supplier');
			$table->flag = $request->input('flag');
			$table->save();
			$this->back = 'true';
		}

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

	public function barangEdit($id)
	{
		$data['data']     = Barang::find($id);
		$data['supplier'] = Supplier::all();
		return view('admin.master.barangEdit', $data);
	}

	public function barangDelete(){
		$this->msg  = 'delete failed';

		if ($request->ajax()):	
			$id    = Request::segment(2);
			$model = Barang::find($id);
			$model->delete();
			$this->back = 'true';
			$this->msg  = "delete successed";		
		endif;

		return Response::json(array('back' => $this->back, 'msg' => $this->msg));
	}

}
