<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblComputerUnits extends Model {

	protected $table = 'computer_units';
	public $timestamps = false;

	public static function getCompUnits($params=null) {
		if(isset($params['id'])) {
			$query = \DB::table('computer_units AS cu')
				->where('cu.id', '=', $params['id'])
				->orderBy('created_at', 'desc')
				->get();
		}elseif(isset($params['user_id'])) {
			$query = \DB::table('computer_units AS cu')
				->where('cu.id', '=', $params['id'])
				->orderBy('created_at', 'desc')
				->get();
		}else {
			$query = \DB::tab;e('computer_units AS cu')
				->where('status_id', '!=', '6')
				->or_where('status_id', '!=', '7')
				->orderBy('status_id', 'asc')
				->orderBy('created_at', 'desc')
				->get();
		}
		return $query;
	}

	public static function addCompUnit($params) {
		$compunit = new TblComputerUnits;
		$compunit->user_id = $params['user_id'];
		$compunit->receipt_no = $params['receipt_no'];
		$compunit->mac_address = $params['mac_address'];
		$compunit->location = $params['location'];
		$compunit->created_at = $params['created_at'];
		$compunit->status_id = $params['status_id'];

		if(isset($params['remarks']))
			$compunit->remarks = $params['remarks'];

		try {
			$compunit->save();
		} catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateCompUnit($params) {
		$compunit = TblComputerUnits::find($params['id']);

		if(isset($params['receipt_no']))
			$compunit->receipt_no = $params['receipt_no'];
		
		if(isset($params['mac_address']))
			$compunit->mac_address = $params['mac_address'];
		
		if(isset($params['location']))
			$compunit->location = $params['location'];
		
		if(isset($params['created_at']))
			$compunit->created_at = $params['created_at'];
		
		if(isset($params['status_id']))
			$compunit->status_id = $params['status_id'];

		$compunit->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$compunit->save();
		}catch(QueryException $e) {
			die($e);
		}
	}
}

?>