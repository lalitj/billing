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

    public function print_output(Bills $bills){

        //return $bills;
         // $bills->BillItems;
        // return $bills->Stocks;
        //return $data;

        $bill = $bills;
       /* return $bill->customer->gst_no;*/
        /*foreach($bill->BillItems as $item){
            return $item->stocks->items;
        }*/
        return view('billing',compact('bill'));
    }


}
