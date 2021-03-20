<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
	protected $table = 'tb_outlet';
     protected $fillable= [
        'nama','alamat','telepon',];
}