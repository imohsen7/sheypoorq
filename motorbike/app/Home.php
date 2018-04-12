<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //
	protected $table = 'products';
	protected $softDelete = false;
	
	public function getProductList($filters=NULL) { 
		if ( count($filters) > 0 ) {
			foreach ( $filters as $filter => $searchq) { 
				
				switch ( $filter ) { 
					case 'model':
						$qry = Home::select ('*')->where('model' , '=', $searchq )->paginate(5);
					break;
				}
			}
		}else{
			$qry = Home::select ('*')->paginate(5);
		}
		return $qry;
	}
	
	public function getProductDetails($id) {
		$qry = Home::select ('*')->where('id' , '=', $id )->get() ;
		return $qry;
	}
	
	public function getModels(){
		$qry = Home::select ('model')->groupby('model')->get();;
		return $qry;
	}
	
}
