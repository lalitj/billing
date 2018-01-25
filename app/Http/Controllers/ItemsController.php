<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends CRUDController
{
    //
    public function init(){

        $this->model = "Items";
        $this->action = "items";
        $this->redirect = "/items/create"; // /bill/items/1/
    }
}