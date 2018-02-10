<?php

namespace App\Http\Controllers;

use App\Bill_items;
use App\BillItems;
use App\Bills;
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
            "options" => Stocks::object_data(),
            "text" => "",
            "value" => [],
            "class" => "selectize"
        ];
        //return view('Form-E');
        return view('items.create', compact('bill_id', 'stock_field'));
    }

    public function storeall(){
        return $data = request()->all();
        $single_data = [];
        foreach (["quantity", "rate", "discount", "gst","amount"] as $item_a) {//repeated items array
            foreach ($data[$item_a] as $key => $item) {
                if($key == "discount" && !$item){
                    $item = 0;
                }
                $single_data[$key][$item_a] = $item;

            }
        }

        foreach($single_data as $one_data){
            if(count(array_filter($one_data))) {
                $one_data['bill_id'] = $data['bill_id'];
                $one_data['stock_id'] = 1;
                //BillItems::create($one_data);
            }
        };
        return $bill_data=[
            'cgst_amount' => $data['cgst_amount'],
            'sgst_amount' => $data['sgst_amount'],
            'total_amount' => $data['total_amount']
            ];

            Bills::where( 'id',$data['bill_id'])->update($bill_data);



        session()->flash('success', " Bill Created successfully");
        return redirect("/bill/print/".$data['bill_id']);
    }

}
