<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Datasource;
use App\DetailDatasource;
use App\Template;
use DB;
use PDO;

class GenerateController extends Controller
{
    //
    public function index(){
        $templateAll = Template::get();
        return view('generate',compact('templateAll'));
    }

    public function templateSelected(Request $r){
        $templateAll = Template::get();
        $template = Template::where("template_id",$r->template_id)->first();

        $datasourceSelected = Datasource::where("datasource_id",$template->datasource_id)->first();
        $detailDatasource = DetailDatasource::where("datasource_id",$template->datasource_id)->get();

        $selectedTable = DB::table($datasourceSelected->table_name);
        foreach($detailDatasource as $detail){
            $selectedTable->selectRaw($detail->field_name);
        }
        $selectedTable = $selectedTable->get();

        return $selectedTable;

        return view('generate',compact('templateAll','template','selectedTable'));                
    }

}
