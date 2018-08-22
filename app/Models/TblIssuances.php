<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblIssuances extends Model {

	protected $table = 'issuances';
	public $timestamps = false;

	public static function getIssuances($params = null) {
		$query = \DB::table('issuances AS i')
			->where('i.status_id', '=', '2')
			->orderBy('created_at', 'desc')
			->get();

			if(isset($params['id'])) {
				$query->where('i.id', '=', $params['id']);
			}

		return $query;	
	}

	public static function addIssuance($params) {
		$issuance = new TblIssuances;
		$issuance->compunit_id = $params['compunit_id'];
		$issuance->item_id = $params['item_id'];
		$issuance->emp_id = $params['emp_id'];
		$issuance->user_id = $params['user_id'];
		$issuance->created_at = $params['created_at'];

		if(isset($params['issued_until']))
			$issuance->issued_until = $params['issued_until'];

		try {
			$issuance->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateIssuance($params) {
		$issuance = Tblissuances::find($params['id']);

		if(isset($params['compunit_id']))
			$issuance->compunit_id = $params['compunit_id'];

		if(isset($params['item_id']))
			$issuance->item_id = $params['item_id'];

		if(isset($params['emp_id']))
			$issuance->emp_id = $params['emp_id'];

		if(isset($params['user_id']))
			$issuance->user_id = $params['user_id'];

		if(isset($params['created_at']))
			$issuance->created_at = $params['created_at'];

		//if status is from issued to instock
		if(isset($params['returned_at']))
			$issuance->returned_at = $params['returned_at'];

		if(isset($params['remarks']))
			$issuance->remarks = $params['remarks'];

		if(isset($params['status_id']))
			$issuance->status_id = $params['status_id'];

		issuance->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$event->save();
		} catch(QueryException $e) {
			die($e);
		}

	}

}

?>