<?php

namespace App\Http\Controllers;

use App\Bill_items;
use Illuminate\Http\Request;
class BillItemsController extends CRUDController
{
    public function init(){

        $this->model = "Bill_items";
        $this->action = "bill-items";
        $this->redirect = "/bill/items/1/";
    }

    /*public function store(Request $request)
    {
        $data = Bills::create(request()->all());
        if($data){
            return redirect("/bill/items/". $data['id']);
        }
        return $data;
    }*/

}
