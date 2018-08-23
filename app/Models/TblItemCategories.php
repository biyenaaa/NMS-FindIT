<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblItemCategories extends Model {

	protected $table = 'item_categories';
	public $timestamps = false;

	public static function addCategory($params) {
		$ctgry = new TblItemCategories;

		if(isset($params['type']))
			$ctgry->type = $params['type'];

		if(isset($params['subtype']))
			$ctgry->subtype = $params['subtype'];

		try {
			$status->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateCategory($params) {
		$ctgry = TblItemCategories::find($params['id']);

		if(isset($params['type']))
			$ctgry->type = $params['type'];

		if(isset($params['subtype']))
			$ctgry->subtype = $params['subtype'];

		$status->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$status->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

}

?>