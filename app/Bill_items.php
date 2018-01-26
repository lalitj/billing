<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_items extends CRUDModel
{
    public $guarded = [];
    
    public static function form(){
    
        $form = [
            'bill_id' => [
                "type" => "hidden",
                "label" => "",
                "placeholder" => "",
                "value" => request('bill')

            ],
            'amount' => [
                "type" => "hidden",
                "value" => "200",
                "label" => "",
                "placeholder" => "",

            ],
            'stock_id' => [
                "type" => "select",
                "label" => "Stock",
                "options" => [1,2],
                "text" => "",
                "value" => []
            ],
            'quantity' => [
                "type" => "number",
                "label" => "Quantity",
                "placeholder" => "",
                "text" => "",
                "value" => ""
            ],
            'rate' => [
                "type" => "number",
                "label" => "Rate",
                "placeholder" => "Rate",
                "text" => "",
                "value" => ""
            ],
            'discount' => [
                "type" => "number",
                "label" => "Discount",
                "placeholder" => "Discount",
                "text" => "",
                "value" => ""
            ],
            'gst' => [
                "type" => "select",
                "label" => "GST",
                "options" => [5,12,18,28],
                "text" => "",
                "value" => []
            ],
        ];
    
        return $form;
    }

    /*public static function form(){

        $form = [
            'customer_id' => [
                "type" => "select",
                "label" => "Customer",
                "options" => [1, 2],
                "text" => "",
                "value" => "1"
            ],
            'bill_date' => [
                "type" => "date",
                "label" => "Bill Date",
                "placeholder" => "Enter Bill Date",
                "text" => "",
                "value" => date("Y-m-d")
            ]

        ];

        return $form;
    }*/
   /* public function Stocks(){

        return $this->hasOne(Stocks::class, 'stock_id');


    }*/
}
