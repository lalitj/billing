<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StocksController extends CRUDController
{
    //
    public function init(){

        $this->model = "Stocks";
        $this->action = "stocks";
        $this->redirect = ""; // /bill/items/1/
    }
}