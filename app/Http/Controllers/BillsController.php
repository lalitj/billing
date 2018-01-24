<?php

namespace App\Http\Controllers;

use App\Bills;
use Illuminate\Http\Request;

class BillsController extends CRUDController
{

    public $form = [];

    public function init(){

        $this->model = "Bills";
        $this->action = "bill";

    }

    public function store(Request $request)
    {
        $data = Bills::create(request()->all());
        if($data){
            return redirect("/bill/items/". $data['id']);
        }
        return $data;
    }

}
