<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends CRUDController
{
    //
    public function init(){

        $this->model = "Vendor";
        $this->action = "vendor";
        $this->redirect = ""; // /bill/items/1/
    }
}