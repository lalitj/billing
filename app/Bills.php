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
                "options" =>  Customer::array_data(),
                "text" => "<a href='/customer/create'>Add Customer</a>",
                "text-class" => "text-right d-block",
                "value" => []
            ],
            'bill_date' => [
                "type" => "date",
                "label" => "Bills Date",
                "placeholder" => "Enter Bills Date",
                "text" => "",
                "value" => date("Y-m-d")
            ]

        ];

        return $form;
    }

    public function BillItems(){

        return $this->hasMany(BillItems::class, 'bill_id');

    }
}
