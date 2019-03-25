<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterItemKontrak extends Model
{
  protected $table = 'tb_master_item_kontrak';
  protected $primaryKey = 'id_item_kontrak';
  public $timestamps = false;
}
