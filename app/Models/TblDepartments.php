<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblDepartments extends Model {

	protected $table = 'departments';
	public $timestamps = false;

	public static function addDept($params) {
		$dept = new TblDepartments;
		$dept->name = $params['name'];

		try {
			$dept->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateStatus($params) {
		$dept = TblDepartments::find($params['id']);

		if(isset($params['name']))
			$dept->name = $params['name'];

		$dept->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$dept->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

}

?>