<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	protected $back = 'true';
	protected $msg  = 'failed';
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.hello');
	}

	protected function link($data = null)
	{
		$action = "";
		if(is_array($data))
		{
			foreach ($data as $key => $value) {
				if('edit' == $key)
				{
					$action .= "<a class='btn btn-primary btn-xs' data-toggle='modal' data-target='#myModal' href='".$value['url']."' ><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></a> &nbsp;";
				}
				else if('delete' == $key)
				{
					$action .= "<a class='btn btn-danger btn-xs' href='javascript:void(0)' onclick='hapus(\"".$value['url']."\", \"".$value['back']."\")' ><span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></a>";
				}
			}
		}

		return $action;
	}

	public function profile()
	{
		return view('admin.profile');
	}

}
