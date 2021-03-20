<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    public function index()
 	{
 		$data['page_title'] = "Member";
 		$data['page_sub_title'] = "Member Table";
 		$data['member'] = Member::all();
 		return view('layouts.admin.member.index', $data);
 	} 
	public function store(Request $request)
	{
		$this->validate($request, [
			'nama' => 'required|min:2',
			'alamat' => 'required|min:2',
			'telepon' => 'required|min:2',
		]);
		$member = new Member;
		$member->nama = $request->nama;
		$member->alamat = $request->alamat;
		$member->jenis_kelamin = $request->jenis_kelamin;
		$member->telepon = $request->telepon;
		$member->save();
		return redirect()->route('admin.member.index')->with(['success' => 'Member has been Saved !']);
	}  
	public function edit($id)
	{
		$data['page_title'] = 'Member';
		$data['page_sub_title'] = 'Edit Member';
		$data['member'] = Member::findOrFail($id);
		return view('layouts.admin.member.edit', $data);
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'nama' => 'required|min:2',
			'alamat' => 'required|min:2',
			'telepon' => 'required|min:2',
		]);
		$member = Member::findOrFail($id);
		$member->nama = $request->nama;
		$member->alamat = $request->alamat;
		$member->jenis_kelamin = $request->jenis_kelamin;
		$member->telepon = $request->telepon;
		$result = $member->save();
		if ($result){
			return redirect()->route('admin.member.index')->with(['success' => 'Member has been Update']);
		} else {
			return redirect()->back();
		}
	}
	public function destroy($id)
	{
		$member = Member::findOrFail($id);
		$member->delete();
		return redirect()->back()->with(['success' => 'Member has been Delete']);
	}
}