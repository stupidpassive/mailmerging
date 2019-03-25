<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
  protected $table = 'tb_pejabat';
  protected $primaryKey = 'id_pejabat';
  public $timestamps = false;
}
