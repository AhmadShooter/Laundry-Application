@extends('layouts.admin.app')
@section('title','User | Laundry Application')

@section('content')
						<div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                        <h4 class="header-title">{{$page_sub_title}}</h4>
                                        <p class="sub-header">
                                        </p>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline">
                                                <div class="form-group mr-2">
                                                    <button type="button" id="demo-btn-addrow" class="btn btn-primary" data-toggle="modal" data-target="#con-close-modal"><i class="mdi mdi-plus-circle mr-2"></i> Add New User</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         

                                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    
                                       
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Outlet</th>
                                                <th>Privilage</th>
                                                <!-- <th>Status</th> -->
                                                <th>Action</th>
                                            </tr>
                                            </thead>
    
                                            <tbody>
                                                @foreach ($user as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                @if ($row->photo == "NULL")
                                                <td><span class="badge rounded-pill badge-danger">Empt</span></td>
                                                @else
                                                <td><img class="rounded-circle avatar-sm" src="{{url('/avatar/'.$row->photo) }}"></td>
                                                @endif
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->email}}</td>
                                                <td><span class="badge label-table badge-primary">{{$row->outlet->nama}}</span></td>
                                                <td><span class="badge rounded-pill badge-info">{{$row->getRoleNames()->first()}}</span></td>
                                                <!-- @if ($row->status == "1")
                                                <td><span class="badge rounded-pill badge-success" >Active</span></td>
                                                @else
                                                <td><span class="badge rounded-pill badge-danger">Unactive</span></td>
                                                @endif -->
                                                <td>
                                                    <a href="{{url('admin/user/edit',$row->id)}}" class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i></a>
                                                    <a href="{{url('admin/user/delete',$row->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('apa kamu serius?')"><i class=" fas fa-trash"></i></a></td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                    <!-- sample modal content -->

                                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                              <form action="{{ route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Add New User</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Name</label>
                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" parsley-trigger="change" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Email</label>
                                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" parsley-trigger="change" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                                <label for="field-3" class="control-label">Password</label>
                                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" parsley-trigger="change" required>
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                                <label for="field-3" class="control-label">Photo</label>
                                                                <input type="file" id="photo" name="photo" class="form-control">
                                                            </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState" class="control-label">Outlet</label>
                                                            <select name="id_outlet" id="id_outlet" class="form-control">
                                                                <option disabled selected>Select</option>
                                                                @foreach ($outlet as $item)
                                                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                       </div>
                                                    </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label for="field-3" class="control-label">Privilege</label>
                                                                <select name="role" id="role" class="form-control">
                                                                <option disabled selected>Select</option>
                                                                @foreach($roles as $role)
                                                                <option value="{{ $role->name }}" {{ $role->name == old('role') ? 'selected' : ''}}>{{ $role->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                </div>
                                            </div>
                                           </form>
                                        </div>
                                    </div><!-- /.modal -->
                                </div>
                            </div>
@endsection