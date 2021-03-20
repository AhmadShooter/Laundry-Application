<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Paket;
use App\Outlet;

class PaketController extends Controller
{
    public function index()
 	{
 		$data['page_title'] = "Paket";
 		$data['page_sub_title'] = "Paket Table";
 		$data['paket'] = Paket::all();
 		$data['outlet'] = Outlet::all();
 		return view('layouts.admin.paket.index',$data);
 	} 
	public function store(Request $request)
	{
		$this->validate($request, [
			'id_outlet' => 'required',
			'jenis' => 'required',
			'nama_paket' => 'required',
			'harga' => 'required',
		]);
		$paket = new Paket;
		$paket->id_outlet = $request->id_outlet;
		$paket->jenis = $request->jenis;
		$paket->nama_paket = $request->nama_paket;
		$paket->harga = $request->harga;
		$paket->save();
		return redirect()->route('admin.paket.index')->with(['success' => 'Paket has been Saved !']);
	}  
	public function edit($id)
	{
		$data['page_title'] = 'Paket';
		$data['page_sub_title'] = 'Edit Paket';
		$data['paket'] = Paket::findOrFail($id);
		$data['outlet'] = Outlet::all();
		return view('layouts.admin.paket.edit', $data);
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'id_outlet' => 'required',
			'jenis' => 'required',
			'nama_paket' => 'required',
			'harga' => 'required',
		]);
		$paket = Paket::findOrFail($id);
		$paket->id_outlet = $request->id_outlet;
		$paket->jenis = $request->jenis;
		$paket->nama_paket = $request->nama_paket;
		$paket->harga = $request->harga;
		$result = $paket->save();
		if ($result){
			return redirect()->route('admin.paket.index')->with(['success' => 'Paket has been Update']);
		} else {
			return redirect()->back();
		}
	}
	public function destroy($id)
	{
		$paket = Paket::findOrFail($id);
		$paket->delete();
		return redirect()->back()->with(['success' => 'Paket has been Delete']);
	}
	  public function paket($id){
        $paket = paket::findOrFail($id);
        return $paket;
    }
}
