<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
	protected $table = 'tb_member';
 protected $fillable = [
        'nama','alamat','jenis_kelamin','telepon',];
}
