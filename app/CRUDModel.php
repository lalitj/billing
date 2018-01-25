<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CRUDModel extends Model
{
    static public function form(){
        return [];
    }

    static function array_data($name = "name"){
        /*   $users = $this->users;*/

        /*$company_id = auth()->user()->company_id;

        if ($company_id == 3) {

            $data = static::select('name', 'id')->get();
        } else {
            $data = static::select('name', 'id')->where('id', $company_id)->get();
        }*/

        $data = static::select($name, 'id')->get();
        $new_data = [];
        foreach($data as $item){
            $new_data[$item->id] = $item->$name;
        }

        return $new_data;

    }
}