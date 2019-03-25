<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datasource extends Model
{
    protected $table = 'tb_datasource';
    protected $primaryKey = 'datasource_id';
    public $timestamps = false;
}
