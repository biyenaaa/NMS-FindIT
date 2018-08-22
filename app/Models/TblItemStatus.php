<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblItemStatus extends Model {

	protected $table = 'item_status';
	public $timestamps = false;

	public static function addStatus($params) {
		$status = new TblItemStatus;
		$status->name = $params['name'];

		try {
			$status->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateStatus($params) {
		$status = TblItemStatus::find($params['id']);

		if(isset($params['name']))
			$status->name = $params['name'];

		$status->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$status->save();
		}catch(QueryException e) {
			die($e);
		}
	}

}

?>