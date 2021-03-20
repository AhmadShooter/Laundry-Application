<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Outlet;

class OutletController extends Controller
{
 	public function index()
 	{
 		$data['page_title'] = "Outlet";
 		$data['page_sub_title'] = "Outlet Table";
 		$data['outlet'] = Outlet::all();
 		return view('layouts.admin.outlet.index',$data);
 	} 
	public function store(Request $request)
	{
		$this->validate($request, [
			'nama' => 'required|min:2',
			'alamat' => 'required|min:2',
			'telepon' => 'required|min:2',
		]);
		$outlet = new Outlet;
		$outlet->nama = $request->nama;
		$outlet->alamat = $request->alamat;
		$outlet->telepon = $request->telepon;
		$outlet->save();
		return redirect()->route('admin.outlet.index')->with(['success' => 'Outlet has been Saved !']);
	}  
	public function edit($id)
	{
		$data['page_title'] = 'Outlet';
		$data['page_sub_title'] = 'Edit Outlet';
		$data['outlet'] = Outlet::findOrFail($id);
		return view('layouts.admin.outlet.edit', $data);
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'nama' => 'required|min:2',
			'alamat' => 'required|min:2',
			'telepon' => 'required|min:2',
		]);
		$outlet = Outlet::findOrFail($id);
		$outlet->nama = $request->nama;
		$outlet->alamat = $request->alamat;
		$outlet->telepon = $request->telepon;
		$result = $outlet->save();
		if ($result){
			return redirect()->route('admin.outlet.index')->with(['success' => 'Outlet has been Update']);
		} else {
			return redirect()->back();
		}
	}
	public function destroy($id)
	{
		$outlet = Outlet::findOrFail($id);
		$outlet->delete();
		return redirect()->back()->with(['success' => 'Outlet has been Delete']);
	}
}
