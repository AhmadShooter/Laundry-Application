<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Outlet;
use App\Paket;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function Outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }

    public function Paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }
}