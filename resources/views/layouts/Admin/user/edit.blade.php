@extends('layouts.admin.app')
@section('title','User | Laundry Application')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="header-title">{{$page_sub_title}}</h4>
                                    
                <form action="{{url('admin/user/update',$user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-row">
                            <div class="from-group col-md-4">
                                <label for="field-1" class="col-form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" parsley-trigger="change" value="{{$user->name}}" required>
                            </div>
                            <div class="from-group col-md-4">
                                <label for="field-1" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" parsley-trigger="change" value="{{$user->email}}" required>
                            </div>
                        </div>
                    <div class="form-row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="field-3" class="col-form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" parsley-trigger="change">
                                    <small><span>(Leave blank if you don't want to change the password)</span></small>
                                </div>
                            </div>                     
                        </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-3" class="col-form-label">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo"  parsley-trigger="change">
                                <small><span>(Leave blank if you don't want to change the photo)</span></small>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="inputEmail4" class="col-form-label">Outlet</label>
                                    <select name="id_outlet" id="id_outlet" class="form-control">
                                        @foreach ($outlet as $row)
                                            <option @if($row->id==$user->id_outlet) selected @endif value="{{$row->id}}">{{$row->nama}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    <div class="form-row">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-3" class="col-form-label">Privilage</label>
                                    <select class="form-control" id="role" name="role">
                                        <option disabled selected>Select</option>
                                            @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ $role->name == $user->getRoleNames()->first() ? 'selected' : ''}}>{{ $role->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-3" class="col-form-label">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option disabled selected>Select</option>
                                        <option value="1" @if($user->status == '1') selected @endif>Active</option>
                                        <option value="0" @if($user->status == '0') selected @endif>Unactive</option>
                                </select>
                            </div>
                        </div>     -->
                    </div>
                    <div class="form-group text-right mb-0">
                        <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">        Submit
                        </button>
                            <a href="{{route('admin.user.index')}}" class="btn btn-secondary waves-effect waves-light">
                                Cancel
                            </a>
                    </div>
                </form>
            </div> <!-- end card-box -->
        </div>
                            <!-- end col -->
    </div>
@endsection