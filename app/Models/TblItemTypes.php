<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblItemTypes extends Model
{
    public static function getItemTypes ($params=null){
        $query = \DB::table('item_types as it')
            ->get();
        return $query;
    }
}

?>