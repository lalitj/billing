<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{

    public $guarded = [];
public static function form(){

    $form = [
        'name' => [
            "type" => "text",
            "label" => "Name",
            "placeholder" => "",
            "text" => "",
            "value" => ""
        ],
        'address' => [
            "type" => "text",
            "label" => "Address",
            "placeholder" => "",
            "text" => "",
            "value" => ""
        ],
        'city' => [
            "type" => "text",
            "label" => "City",
            "placeholder" => "",
            "text" => "",
            "value" => ""
        ],
        'state' => [
            "type" => "text",
            "label" => "State",
            "placeholder" => "",
            "text" => "",
            "value" => ""
        ],
        'tel' => [
            "type" => "number",
            "label" => "Telephone",
            "placeholder" => "",
            "text" => "",
            "value" => ""
        ],
        'fax' => [
            "type" => "text",
            "label" => "Fax",
            "placeholder" => "",
            "text" => "",
            "value" => ""
        ],
        'email' => [
            "type" => "text",
            "label" => "email",
            "placeholder" => "",
            "text" => "",
            "value" => ""
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
            "value" => ""
        ],
    ];

    return $form;
}
}
