<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Datasource;
use App\DetailDatasource;
use DB;

class MainController extends Controller
{
    //

    public function index(){

        $tables = DB::select('SHOW TABLES');

        return view('datasource',compact('tables'));
    }

    public function tableSelected(Request $r){

        $tables = DB::select('SHOW TABLES');

        $tableName = $r->table_name;
        // $tableColumns = DB::getSchemaBuilder()->getColumnListing($tableName);
        $tableColumns = DB::select( DB::raw("SHOW COLUMNS FROM ".$tableName));

        return view('datasource',compact('tables','tableColumns','tableName'));
    }

    public function submitDatasource(Request $r){
        $data = new Datasource;
        $data->name = $r->datasource_name;
        $data->table_name = $r->datasource_tablename;
        $data->save();

        // $i = 0;
        // return var_dump($r->col);
        // return sizeof($r->col);
        // return max(array_keys($r->col));
        for($i = 0; $i <= max(array_keys($r->col)); $i++){
            // echo $i;
            // echo $r->col[$i];
            if(isset($r->col[$i]) && $r->col[$i] != ""){
                // echo $r->col[$i];                
                $detail = new DetailDatasource;
                $detail->datasource_id = $data->datasource_id;
                $detail->field_name = $r->col[$i];
                if(isset($r->format[$i])){
                    $detail->option = $r->format[$i];
                }
                else{
                    $detail->option = 0;
                }
                $detail->save();
            }
        }

        // return "";

        // foreach($r->col as $column){
        //     $detail = new DetailDatasource;
        //     $detail->datasource_id = $data->datasource_id;
        //     $detail->field_name = $column;
        //     if(isset($r->format[$i])){
        //         $detail->option = $r->format[$i];
        //     }
        //     else{
        //         $detail->option = 0;
        //     }
        //     $detail->save();

        //     $i++;
        // }

        return redirect('/');


    }

}
