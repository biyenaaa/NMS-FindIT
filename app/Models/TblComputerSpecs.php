<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblComputerSpecs extends Model {

	protected $table = 'computer_specs';
	public $timestamps = false;

	public static function getCompSpecs($params = null) {
		if(isset($params['id'])) {
			$query = \DB::table('computer_specs as cs')
				->where('cs.id', '=', $params['id'])
				->groupBy('compunit_id')
				->orderBy('created_at', 'desc')
				->get();
		}elseif(isset($params['user_id'])) {
			$query = \DB::table('computer_specs as cs')
				->where('cs.user_id', '=', $params['user_id'])
				->groupBy('compunit_id')
				->orderBy('created_at', 'desc')
				->get();
		}else {
			$query = \DB::table('computer_specs as cs')
				->groupBy('compunit_id')
				->orderBy('created_at', 'desc')
				->get();
		}
	}

	public static function addCompSpec($params) {
		$compspec = new TblComputerSpecs;
		$compspec->user_id = $params['user_id'];
		$compspec->compunit_id = $params['compunit_id'];
		$compspec->item_id = $params['item_id'];
		$compspec->created_at = $params['created_at'];

		try {
			$compspec->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateCompSpec($params) {
		$compspec = TblComputerSpecs::find($params['id']);

		if(isset($params['compunit_id']))
			$compspec->compunit_id = $params['compunit_id'];

		if(isset($params['item_id']))
			$compspec->item_id = $params['item_id'];

		if(isset($params['created_at']))
			$compspec->created_at = $params['created_at'];

		$compspec->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$compspec->save();
		}catch(QueryException $e) {
			die($e);
		}


	}

}

?>