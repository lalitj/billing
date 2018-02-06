<?php

namespace App\Http\Controllers;

use App\Bills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CRUDController extends Controller
{

    public $form = [];
    public $model = "";
    public $action = "";
    public $required_fields = "";

    public function init(){

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->init();

        $model = "App\\".$this->model;
         $action = $this->action;
         $view=$this->model;

        $form = $model::form();


        return view('forms.add',compact( "form", 'action','view'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->init();

        $model = "App\\" . $this->model;
        $view = $this->model;

        $this->validate(request(), $model::required_fields());

        $data = $model::create(request()->all());
        /*if($this->redirect){

            return redirect($this->redirect);
        }*/
        /* return $data;*/

            session()->flash('success', " $view Added successfully");
            return redirect($this->redirect);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function csv($table)
    {
        if (($handle = fopen(public_path() . "/csv/" . $table .'.csv','r')) !== FALSE)
        {
            $data = fgetcsv($handle, 1000, ',');
            while (($data = fgetcsv($handle, 1000, ',')) !==FALSE)
            {

                $scifi = new \App\Items();
                $scifi->id = $data[0];
                $scifi->product_name = $data[1];
                //$scifi->potency = $data[1];
                $scifi->hsn_code = $data[2];
                $scifi->mfg_code = $data[3];
                $scifi->short_name = $data[4];
                $scifi->save();
            }
            fclose($handle);
        }

        return "Implemented";
    }

    public function search_ajax(){

        $search = request('term');


        /*if(Gate::denies('only-team')){
            abort(403, 'Sorry, not Sorry.');
        }*/

        /*if (isset($_GET['search'])) {
            return redirect("/search/" . $_GET['search']);
        }*/

        /*$user_id = request('user_id');
        if (!$user_id) $user_id = auth()->id();

        $user = User::find($user_id);
        $current_working = $user->current_working($user);*/

        //ready for deploy, In Development, ready for development

        if(env('DB_CONNECTION') == "pgsql"){
            $like_operator = "ilike";
        } else {
            $like_operator = "like";
        }

        $this->init();

        $model = "App\\" . $this->model;
        $field = "product_name";

        $data = $model::where($field, $like_operator, "%$search%")

            //->orderBy('project_id', 'asc')
            //->orderBy('priority', 'desc')
            //->orderBy('order', 'desc')
            ->orderBy($field, 'desc')
            ->limit(20)
            ->get();
        $output = [];

        foreach($data as $item){
            $label = $item->$field;
            if(strlen($label) > 50) {
                $label = substr($item->$field, 0, 50) . "... ";
            }
            //$label .= " - ".Task::statuses()[$item->status];
            $output[] = [
                "label" => $label,
                //"category" => $item->project->name,
                "id" => $item->id,
                //"status" => $item->status
            ];
        }
        return $output;



    }

}
