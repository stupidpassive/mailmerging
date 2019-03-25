<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Template;
use App\Datasource;
use App\DetailDatasource;
use DB;

class TemplateController extends Controller
{
    //

    public function index(){

        $datasourceAll = Datasource::get();

        return view('createtemplate',compact('datasourceAll'));
    }

    public function datasourceSelected(Request $r){

        $datasourceAll = Datasource::get();

        $datasource = Datasource::where("datasource_id",$r->datasource_id)->first();
        $datasourceDetail = DetailDatasource::where("datasource_id",$r->datasource_id)->get();

        return view('createtemplate',compact('datasource','datasourceAll','datasourceDetail'));
    }

    public function create(Request $r){
        $data = new Template;
        $data->datasource_id = $r->datasource_id;
        $data->konten = $r->konten;
        $data->nama = $r->nama;
        $data->save();

        return redirect('/createtemplate');
    }

}
