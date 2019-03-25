<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
  protected $table = 'tb_nasabah';
  protected $primaryKey = 'id_nasabah';
  public $timestamps = false;
}
