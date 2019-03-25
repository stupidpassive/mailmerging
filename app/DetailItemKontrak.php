<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\KontrakNasabah;

class DetailItemKontrak extends Model
{
  protected $table = 'tb_detail_item_kontrak';
  protected $primaryKey = 'id_kontrak';
  public $timestamps = false;

  public function kontrakNasabah()
    {
        return $this->hasMany('App\KontrakNasabah','id_kontrak','id_kontrak');
    }

}
