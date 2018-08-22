<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblItems extends Model {

	protected $table = 'items';
	public $timestamps = false;

	public static function getItems($params = null) {
		if(isset($params['id'])){
			$query = \DB::table('items as i')
				->where('b.id', '=', $params[id])
				->orderBy('created_at', 'desc')
				->get();
		}else{
			$query = \DB::table('items as i')
				->where('status_id', '!=', '6')
				->orWhere('status_id', '!=', '7')
				->orderBy('category_id', 'asc')
				->orderBy('status_id', 'asc')
				->orderBy('created_at', 'desc')
				->get();
		}
		return $query;
	}

	public static function addItem($params) {
		$item = new TblItems;
		$item->user_id = $params['user_id'];
		$item->receipt_no = $params['receipt_no'];
		$item->category_id = $params['category_id'];
		$item->serial_no = $params['serial_no'];
		$item->mac_address = $params['mac_address'];
		$item->brand = $params['brand'];
		$item->model = $params['model'];
		$item->specs = $params['specs'];
		$item->location = $params['location'];
		$item->created_at = $params['created_at'];
		$item->status_id = $params['status_id'];
		                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
		try {
			$item->save();
		}catch(QueryException $e) {
			die($e);	
		}
	}

	public static function updateItem($params) {
		$item = TblItems::find($params['id']);

		if(isset($params['receipt_no']))
			$item->receipt_no = $params['receipt_no'];
		
		if(isset($params['category_id']))
			$item->category_id = $params['category_id'];
		
		if(isset($params['serial_no']))
			$item->serial_no = $params['serial_no'];
		
		if(isset($params['mac_address']))
			$item->mac_address = $params['mac_address'];
		
		if(isset($params['brand']))
			$item->brand = $params['brand'];
		
		if(isset($params['model']))
			$item->model = $params['model'];
		
		if(isset($params['specs']))
			$item->specs = $params['specs'];
		
		if(isset($params['location']))
			$item->location = $params['location'];
		
		if(isset($params['created_at']))
			$item->created_at = $params['created_at'];

		if(isset($params['remarks']))
			$item->remarks = $params['remarks'];
		
		if(isset($params['status_id']))
			$item->status_id = $params['status_id'];

		$booking->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$booking->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

}

?>