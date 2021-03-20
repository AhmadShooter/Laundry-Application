<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use App\Outlet;
use Hash;
use File;
use DB;

class UserController extends Controller
{
    public function index()
 	{
 		$data['page_title'] = "User";
 		$data['page_sub_title'] = "User Table";
 		$data['user'] = User::all();
 		$data['outlet'] = Outlet::all();
 		$data['roles'] = Role::all();
 		return view('layouts.admin.user.index', $data);
 	} 
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|min:2',
			'email' => 'required|min:2',
			'password' => 'required|min:5',
			'photo' => 'required',
			'id_outlet' => 'required',
			'role' => 'required|string|exists:roles,name',
		]);
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->id_outlet = $request->id_outlet;
		$photo = $request->file('photo');
		$send_upload = 'avatar';
		$photo_name = time() . "_" . $photo->getClientOriginalName();
		$photo->move($send_upload, $photo_name);
		$user->photo = $photo_name;
		$user->save();
		$user->syncRoles([$request->role]);
		return redirect()->route('admin.user.index')->with(['success' => 'User has been Saved !']);
	}  
	public function edit($id)
	{
		$data['page_title'] = 'User';
		$data['page_sub_title'] = 'Edit User';
		$data['user'] = User::findOrFail($id);
		$data['outlet'] = Outlet::all();
		$data['roles'] = Role::all();
		return view('layouts.admin.user.edit', $data);
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required|min:2',
			'email' => 'required|min:2',
			'id_outlet' => 'required',
			'role' => 'required|string|exists:roles,name',
			// 'status' => 'required',
		]);
		$user = User::findOrFail($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->id_outlet = $request->id_outlet;
		// $user->status = $request->status;
		if ($request->get('password') != '') {
			$user->password = Hash::make($request->password);
		}
		if ($request->file('photo') != '') {
			File::delete('avatar/' . $user->photo);
			$photo = $request->file('photo');
			$send_upload = 'avatar';
			$photo_name = time() . "_" . $photo->getClientOriginalName();
			$photo->move($send_upload, $photo_name);
			$user->photo = $photo_name;
		}

		$result = $user->save();
		$user->syncRoles([$request->role]);
		if ($result){
			return redirect()->route('admin.user.index')->with(['success' => 'User has been Update']);
		} else {
			return redirect()->back();
		}
	}
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();
		return redirect()->back()->with(['success' => 'User has been Delete']);
	}
	public function active($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 1]);
        return redirect()->route('admin.user.index')->with(['success' => 'User has been unactive']);
    }

    public function unactive($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 0]);
        return redirect()->route('admin.user.index')->with(['success' => 'User has been active']);
    }
}
