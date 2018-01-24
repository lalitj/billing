<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends CRUDModel
{
    public $guarded = [];

    public static function form(){

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
    }
}
