<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends CRUDModel
{
    public $guarded = [];

    public static function form(){




        $form = [
            'product_name' => [
                "type" => "text",
                "label" => "Product Name",
                "placeholder" => "",
                "text" => "",
                "value" => ""
            ],
            'potency' => [
                "type" => "text",
                "label" => "Potency",
                "placeholder" => "",
                "text" => "",
                "value" => ""
            ],
            'packing' => [
                "type" => "text",
                "label" => "Packing",
                "placeholder" => "",
                "text" => "",
                "value" => ""
            ],
            'hsn_code' => [
                "type" => "text",
                "label" => "HSN Code",
                "placeholder" => "",
                "text" => "",
                "value" => ""
            ],
            'mfg_code' => [
                "type" => "text",
                "label" => "MFG Code",
                "placeholder" => "",
                "text" => "",
                "value" => ""
            ],



        ];
    
        return $form;
    }
}
