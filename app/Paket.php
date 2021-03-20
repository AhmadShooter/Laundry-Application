<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Outlet;

class Paket extends Model
{
	protected $table = 'tb_paket';
    protected $fillable = [
        'id_outlet','jenis','nama_paket','harga',
    ];

    public function Outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }
}