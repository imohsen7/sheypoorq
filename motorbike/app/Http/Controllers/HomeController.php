<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Home;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 
	protected $_rules = [
		'proimage' => 'required|mimes:jpg,png,jpeg',
		'name' => 'required',
		'price'=>'required|integer'
	];
	
	protected $motorbike = NULL ; 
	
    public function __construct()
    {
        $this->middleware('auth' , ['except' => 'getlist']);
		$this->motorbike= new Home();
		
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        return view('home');
    }
	
	public function getlist(Request $r) { 
		$model_list = $this->motorbike->getModels();		
		if ( count($r->route()->parameters())) { 
			$detail_id = $r->route()->parameters()['id'];
			$products = $this->motorbike->getProductDetails($detail_id);
		}else{
			$products = $this->motorbike->getProductList($r->except('_token'));
		}
		
		
		return view('splash' , [ 'products' => $products , 'model_list' => $model_list]);
	}
	
	public function addnew(Request $r)
    {
        return view('addnew');
    }
	
	public function addnewbike(Request $r) {

		$this->validate($r, $this->_rules);
		$imgname = generate_name().'.'.$r->file('proimage')->getClientOriginalExtension();
		$path = $r->file('proimage')->move(public_path().'/upload_images' , $imgname  );
		
		$this->motorbike->name = $r->name;
		$this->motorbike->model = $r->model;
		$this->motorbike->weight = $r->weight;
		$this->motorbike->price = $r->price;
		$this->motorbike->img = url('/upload_images/'.$imgname);
		if ( $this->motorbike->save()) { 
			$r->session()->flash('ok', 'محصول ( '.$this->motorbike->name.' ) اضافه شد ');
			return redirect('/addnew');
		}else{
			App:abort(500,'Query Error ');
		}
		
	}
	
}
