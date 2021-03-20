<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Paket;

class detail_transaksi extends Model
{
     protected $fillable = [
        'id_transaksi','id_paket','qty','keterangan',
    ];


 public function Paket()
    {
        return $this->hashOne(Paket::class,  'id', 'id_paket' );
    }
    
}

