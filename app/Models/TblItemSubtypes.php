<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblItemSubtypes extends Model
{
    public static function getItemSubtypes ( $params=null ){
        $query = \DB::table('item_subtypes as ist')
            ->get();
        return $query;
    }
}
