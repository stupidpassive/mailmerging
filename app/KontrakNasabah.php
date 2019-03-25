<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontrakNasabah extends Model
{
  protected $table = 'tb_kontrak_nasabah';
  protected $primaryKey = 'id_kontrak';
  public $timestamps = false;
  
}
