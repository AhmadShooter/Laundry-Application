<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;
use App\Outlet;
use App\Member;
use App\User;
use App\Paket;
use App\Detail_transaksi;

use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['transaksi'] = Transaksi::all();
        // dd($data['transaksi']->paket());
        $data['page_title'] = "Transaksi";
 		$data['page_sub_title'] = "Transaksi Table";
        return view('layouts.admin.transaksi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trx= Transaksi::first();
        if (!$trx) {
        $data['invNo'] = 1;
        }else {
        $data['invNo'] = $trx->id + 1;
        }
        $data['paket'] = Paket::get();
        $data['detail_transaksi'] = Detail_transaksi::get();
        $data['outlet']= Outlet::get();
        $data['member']= Member::get();
        $data['user']= User::get();
        $data['page_title'] = "Transaksi";
 		$data['page_sub_title'] = "Transaksi Table";
        return view('layouts.admin.transaksi.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $data = new Transaksi();
        // $data->id_outlet = $request->get('id_outlet');
        // $data->kode_invoice = $request->get('kode_invoice');
        // $data->id_member = $request->get('id_member');
        // $data->datetime = $request->get('datetime');
        // $data->batas_waktu = $request->get('batas_waktu');
        // $data->tgl_bayar = $request->get('tgl_bayar');
        // $data->biaya_tambahan = $request->get('biaya_tambahan');
        // $data->diskon = $request->get('diskon');
        // $data->pajak = $request->get('pajak');
        // $data->ttl_harga = $request->get('ttl_harga');
        // $data->status = $request->get('status');
        // $data->dibayar = $request->get('dibayar');
        // $data->id_user  = $request->get('id_user ');
        $transaksi = Transaksi::make([
            'id_outlet' => $request->id_outlet,
            'kode_invoice' => $request->kode_invoice,
            'id_member' => $request->id_member,
            'jenis' => $request->jenis,
            'datetime' => $request->datetime,
            'batas_waktu' => $request->batas_waktu,
            'tgl_bayar' => $request->tgl_bayar,
            'biaya_tambahan' => $request->biaya_tambahan,
            'sub_total' => $request->sub_total,
            'diskon' => $request->diskon,
            'pajak' => $request->pajak,
            'ttl_harga' => $request->ttl_harga, 
            'status' => $request->status,
            'dibayar' => $request->dibayar,
            'kembalian' => $request->kembalian,
            'id_user' => $request->id_user, 
            'kekuragan' => $request->kekuragan,
        ]);

        if($transaksi->save()){
            $paket = Paket::findOrFail($request->id_paket);
            $outlet = Outlet::findOrFail($request->id_outlet);
            $detail_transaksi = Detail_transaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_paket' => $request->id_paket,
                'qty' => $request->qty,
                'keterangan' => 'Pembayaran ('.$paket->nama_paket.') oleh ('.$outlet->nama.') '.' , dengan catatan '.$request->keterangan   
            ]);
        }

        return redirect('admin/transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Transaksi::where('id',$id)->first();
        $data['row'] = Detail_transaksi::where('id',$id)->first();
        return view('layouts.admin.transaksi.struk', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trx = Transaksi::first();
        if (!$trx) {
            $data['invNo'] = 1;
        } else {
            $data['invNo'] = $trx->id + 1;
        }
        $data['paket'] = Paket::get();
        $data['detail_transaksi'] = detail_transaksi::get();
        $data['outlet']= outlet::get();
        $data['member']= Member::get();
        $data['user']= User::get();
        $data['page_title'] = "Transaksi";
        $data['page_sub_title'] = "Transaksi Table";
        $data['transaksi'] = Transaksi::where('id',$id)->first();
        return view('layouts.admin.transaksi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $transaksi = Transaksi::FindOrFail($id);
        $data = array(
            
            'ttl_harga' => $request->ttl_harga,
            'status' => $request->status,
            'dibayar' => $request->dibayar,
            'kembalian' => $request->kembalian,
            'kekurangan' => $request->kekurangan,
            'id_user' => $request->id_user,
        );
        $notif = $transaksi->fill($data)->save();
        if($notif){
            request()->session()->flash('success', 'Data berhasil di ubah');
        }else{
            request()->session()->flash('gagal', 'Data gagal di ubah');
        }
        return redirect('admin/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  //dd($data = Transaksi::FindOrfail($id));
        $transaksi = Transaksi::FindOrfail($id);
        $status = $transaksi->delete();
        if($status){
            request()->session()->flash('success','data berhasil di hapus');
        }else{
            request()->session()->flash('eror','data gagal di hapus');
        }
        return redirect('admin/transaksi');
    }
}
