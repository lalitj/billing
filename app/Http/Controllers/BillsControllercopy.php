<?php

namespace App\Http\Controllers;

use App\Bills;
use Illuminate\Http\Request;

class BillsController extends CRUDController
{
    //

    public function index(){

    }

    public function create()
    {

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
        /*$form = [
            'name' => [
                "type" => "text",
                "label" => "Name",
                "placeholder" => "Enter Name",
                "text" => "We'll never share your email with anyone else.",
                "value" => "",
                //"value" => $project->name
            ],
            'users' => [
                "type" => "text",
                "label" => "Users",
                "placeholder" => "Enter Name",
                "text" => "We'll never share your email with anyone else.",
                "value" => "",
                //"value" => explode(",", $project->users),
                //"options" => User::array_data(),
            ],
            'client_id' => [
                "type" => "text",
                "label" => "Clients",
                "placeholder" => "Enter Name",
                //"text" => "We'll never share your email with anyone else.",
                "value" => "",
                //"options" => Client::array_data()
            ],
            'color' => [
                "type" => "text",
                "label" => "Color",
                "placeholder" => "Enter Color",
                "value" => "",
                //"text" => "We'll never share your email with anyone else.",
                //"value" => $project->color
            ],
            'priority' => [
                "type" => "number",
                "label" => "Priority",
                "placeholder" => "Enter Priority",
                "value" => "",
                //"text" => "We'll never share your email with anyone else.",
                //"value" => $project->priority
            ],
            'delivery_date' => [
                "type" => "date",
                "label" => "Delivery Date",
                "placeholder" => "Enter Delivery Date",
                "value" => "",
                //"text" => "We'll never share your email with anyone else.",
                //"value" => $project->delivery_date
            ],
            'status' => [
                "type" => "boolean",
                "label" => "Status",
                "placeholder" => "Enter Status",
                "value" => "",
                //"text" => "We'll never share your email with anyone else.",
                //"value" => $project->status
            ],
            /*'projects' => "multi",
            //'clients' => "multi",
            'priority' => "number",
            'delivery_date' => "date",
            'status' => "boolean"
        ];*/

        return view('forms.add',compact( "form"));

    }

    public function store(){
        $status = Bills::create(request()->all());
        return $status;
        return redirect ('/');
    }

    public function edit(Project $project)
    {


        //$projects= project::select('name','projects','clients','priority','delivery_date','status')->where('id', $user_id)->get()->toArray();
        //$projects = $projects[0];
        //$clients= Client::all();
        //return $project;
        $form = [
            'name' => [
                "type" => "text",
                "label" => "Name",
                "placeholder" => "Enter Name",
                "text" => "We'll never share your email with anyone else.",
                "value" => $project->name
            ],
            'users' => [
                "type" => "multi",
                "label" => "Users",
                "placeholder" => "Enter Name",
                "text" => "We'll never share your email with anyone else.",
                "value" => explode(",", $project->users),
                "options" => User::array_data(),
            ],
            'client_id' => [
                "type" => "select",
                "label" => "Clients",
                //"placeholder" => "Enter Name",
                //"text" => "We'll never share your email with anyone else.",
                "value" => $project->client_id,
                "options" => Client::array_data()
            ],
            'color' => [
                "type" => "text",
                "label" => "Color",
                "placeholder" => "Enter Color",
                //"text" => "We'll never share your email with anyone else.",
                "value" => $project->color
            ],
            'priority' => [
                "type" => "number",
                "label" => "Priority",
                "placeholder" => "Enter Priority",
                //"text" => "We'll never share your email with anyone else.",
                "value" => $project->priority
            ],
            'delivery_date' => [
                "type" => "date",
                "label" => "Delivery Date",
                "placeholder" => "Enter Delivery Date",
                //"text" => "We'll never share your email with anyone else.",
                "value" => $project->delivery_date
            ],
            'status' => [
                "type" => "boolean",
                "label" => "Status",
                "placeholder" => "Enter Status",
                //"text" => "We'll never share your email with anyone else.",
                "value" => $project->status
            ],
            /*'projects' => "multi",
            //'clients' => "multi",
            'priority' => "number",
            'delivery_date' => "date",
            'status' => "boolean"*/
        ];

        return view('projects.edit',compact('project','clients', "form"));
    }

}
