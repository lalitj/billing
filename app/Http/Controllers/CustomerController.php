<?php

namespace App\Http\Controllers;

use App\CRUDModel;
use Illuminate\Http\Request;

class CustomerController extends CRUDController
{
    //
    public function init(){

        $this->model = "Customer";
        $this->action = "Customer";
        $this->redirect = ""; // /bill/items/1/
    }
}
