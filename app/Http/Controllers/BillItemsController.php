<?php

namespace App\Http\Controllers;

use App\Bill_items;
use App\BillItems;
use App\Items;
use App\Stocks;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BillItemsController extends CRUDController
{
    public function init(){

        $this->model = "BillItems";
        $this->action = "bill-items";
        $this->redirect = "/bill/items/1/";
    }

    public function store(Request $request)
    {
        $data = Bill_Items::create(request()->all());
        if($data){
            return redirect("/bill/items/". $data['id']);
        }
        return $data;
    }

    public function bill_items($id){

        $bill_id = $id;

        $stock_field = [
            "name" => "stock_id",
            "type" => "select",
            "label" => "Stock",
            "options" => Stocks::array_data('id'),
            "text" => "",
            "value" => [],
            "class" => "selectize"
        ];
        //return view('Form-E');
        return view('items.create', compact('bill_id', 'stock_field'));
    }

    public function storeall(){
        $data = request()->all();

        $single_data = [];
        foreach (["quantity", "rate", "discount", "gst","amount"] as $item_a) {
            foreach ($data[$item_a] as $key => $item) {
                $single_data[$key][$item_a] = $item;
            }
        }

        foreach($single_data as $one_data){
            $one_data['bill_id'] = $data['bill_id'];
            $one_data['stock_id'] = 1;
            BillItems::create($one_data);
        };


        session()->flash('success', " Bill Created successfully");
        return redirect("/bill/print/".$data['bill_id']);
    }

}
