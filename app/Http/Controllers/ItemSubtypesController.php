<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblItemSubtypes;

class ItemSubtypesController extends Controller
{
    public static function getAllSubtypes ($params=null){
        $data=[];
        $data['subtypes'] = TblItemSubtypes::getItemSubtypes();
        dd($data);
    }
}