<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailDatasource extends Model
{
    protected $table = 'tb_detail_datasource';
    protected $primaryKey = 'detail_datasource_id';
    public $timestamps = false;
}
