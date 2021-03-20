<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Paket;
use App\Outlet;
use App\member;
use App\User;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    // protected $primaryKey = 'id';
    protected $fillable = [
        'id','id_outlet','kode_invoice','id_member','datetime','jenis','sub_total','batas_waktu','tgl_bayar','ttl_harga','biaya_tambahan','diskon','pajak','status','dibayar', 'kembalian', 'kekuragan','id_user'
    ];

    public function Member()
    {
        return $this->belongsTo(member::class, 'id_member', 'id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function detail_transaksi()
    {
        // return $this->hasOne('App\Detail_transaksi', 'id_transaksi','id');
        return $this->hasOne(detail_transaksi::class, 'id_transaksi', 'id');
    }
      public function Paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket', 'id');
    }
    public function Outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet', 'id');
    }
}
