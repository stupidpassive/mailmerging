<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
  protected $table = 'tb_template';
  protected $primaryKey = 'template_id';
  public $timestamps = false;
}