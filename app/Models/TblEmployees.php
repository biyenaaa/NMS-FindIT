<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblEmployees extends Model {

	protected $table = 'employees';
	public $timestamps = false;

	public static function getEmployees($params = null) {
		if(isset($params['id'])){
			$query = \DB::table('employees as e')
				->where('e.id', '=', $params['id'])
				->get();
		}else {
			$query = \DB::table('employees as e')
				->where('b.status', '=', 'active')
				->groupBy('dept_id')
				->orderBy('lname', 'asc');
		}
	}

	public static function addEmployee($params) {
		$emply = new TblEmloyees;
		$emply->fname = $params['fname'];
		$emply->lname = $params['lname'];
		$emply->email = $params['email'];
		$emply->dept_id = $params['dept_id'];

		try {
			$emply->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateEmployee($params) {
		$emply = TblEmployees::find($params['id']);

		if(isset($params['fname']))
			$emply->fname = $params['fname'];

		if(isset($params['lname']))
			$emply->lname = $params['lname'];

		if(isset($params['email']))
			$emply->email = $params['email'];

		if(isset($params['dept_id']))
			$emply->dept_id = $params['dept_id'];

		$emply->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$emply->save();
		} catch(QueryException $e) {
			die($e);
		}

	}

}

?>