<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocks extends CRUDModel
{
    public $guarded = [];

    public static function form(){
    
        $form = [
           'item_id' => [
               "type" => "select",
               "label" => "Item",
               "options" => Items::array_data("product_name"),
               "text" => "<a href='/items/create'>Add Item</a>",
               "text-class" => "text-right d-block",
               "value" => [],
               "required" => "true",
               "class" => "selectize"
           ],
            'vendor_id' => [
                "type" => "select",
                "label" => "Vendor",
                "options" => Vendor::array_data(),
                "text" => "<a href='/vendor/create'>Add Vendor</a>",
                "text-class" => "text-right d-block",
                "value" => [],
                "class" => "selectize"
            ],
            'batch_no' => [
                "type" => "text",
                "label" => "Batch No",
                "placeholder" => "",
                "text" => "",
                "value" => "",
                "required" => true
            ],
            'exp_date' => [
                "type" => "date",
                "label" => "Expiry Date",
                "placeholder"=>"",
                "value" => ""
            ],
            'quantity' => [
                "type" => "text",
                "label" => "Quantity",
                "placeholder" => "",
                "text" => "",
                "value" => "",
                 "required" => true
            ],
            'mrp' => [
                "type" => "number",
                "label" => "MRP",
                "placeholder" => "",
                "text" => "",
                "value" => "",
                "required" => true
            ],

        ];

    
        return $form;
    }

    public function item(){

        return $this->hasOne(Items::class, 'id', 'item_id');


    }

    public function items(){

        return $this->hasOne(Items::class, 'id', 'item_id');


    }

    static function array_data($name = "name"){
        /*   $users = $this->users;*/

        /*$company_id = auth()->user()->company_id;

        if ($company_id == 3) {

            $data = static::select('name', 'id')->get();
        } else {
            $data = static::select('name', 'id')->where('id', $company_id)->get();
        }*/

        $data = static::select('*')->get();
        $new_data = ["" => "Select"];
        foreach($data as $item){
            $new_data[$item->id] = $item->item->product_name;
        }

        return $new_data;

    }
}
