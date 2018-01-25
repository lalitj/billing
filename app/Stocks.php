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
               "label" => "Item id",
               "options" => Items::array_data("product_name"),
               "text" => "",
               "value" => []
           ],
            'vendor_id' => [
                "type" => "select",
                "label" => "Vendor Id",
                "options" => Vendor::array_data(),
                "text" => "",
                "value" => []
            ],
            'batch_no' => [
                "type" => "text",
                "label" => "Batch No",
                "placeholder" => "",
                "text" => "",
                "value" => ""
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
                "value" => ""
            ],
            'mrp' => [
                "type" => "number",
                "label" => "MRP",
                "placeholder" => "",
                "text" => "",
                "value" => ""
            ],

        ];

    
        return $form;
    }
}
