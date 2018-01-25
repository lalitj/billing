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
}
