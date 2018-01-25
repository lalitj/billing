<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends CRUDModel
{
    public $guarded = [];
    public static function form(){

        $form = [
            'name' => [
                "type" => "text",
                "label" => "Name",
                "placeholder" => "",
                "text" => "",
                "value" => "",
                 "required" => true
            ],
            'address' => [
                "type" => "text",
                "label" => "Address",
                "placeholder" => "",
                "text" => "",
                "value" => "",
                "required" => true
            ],
            'city' => [
                "type" => "text",
                "label" => "City",
                "placeholder" => "",
                "text" => "",
                "value" => "",
                "required" => true
            ],
            'state' => [
                "type" => "text",
                "label" => "State",
                "placeholder" => "",
                "text" => "",
                "value" => "",
                "required" => true
            ],
            'tel' => [
                "type" => "number",
                "label" => "Telephone",
                "placeholder" => "",
                "text" => "",
                "value" => "",
                "required" => true
            ],
            'fax' => [
                "type" => "text",
                "label" => "Fax",
                "placeholder" => "",
                "text" => "",
                "value" => "",

            ],
            'email' => [
                "type" => "text",
                "label" => "email",
                "placeholder" => "",
                "text" => "",
                "value" => "",
                "required" => true
            ],
            'website' => [
                "type" => "text",
                "label" => "Website",
                "placeholder" => "",
                "text" => "",
                "value" => ""
            ],
            'cin_no' => [
                "type" => "text",
                "label" => "Cin number",
                "placeholder" => "",
                "text" => "",
                "value" => "",
                "required" => true
            ],
        ];

        return $form;
    }

}
