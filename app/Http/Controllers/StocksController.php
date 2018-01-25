<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StocksController extends CRUDController
{
    //
    public function init(){

        $this->model = "Stocks";
        $this->action = "stocks";
        $this->redirect = "/stocks/create"; // /bill/items/1/
    }
}