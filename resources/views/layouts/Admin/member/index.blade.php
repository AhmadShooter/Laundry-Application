@extends('layouts.admin.app')
@section('title','Member| Laundry Application')

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
                                                    <button type="button" id="demo-btn-addrow" class="btn btn-primary" data-toggle="modal" data-target="#con-close-modal"><i class="mdi mdi-plus-circle mr-2"></i> Add New Member</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         

                                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    
                                       
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Gender</th>
                                                <th>Phone Number</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
    
                                            <tbody>
                                                @foreach ($member as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->nama}}</td>
                                                <td>{{$row->alamat}}</td>
                                                @if ($row->jenis_kelamin == "L")
                                                <td>Laki-Laki</td>
                                                @else
                                                <td>Perempuan</td>
                                                @endif
                                                <td>{{$row->telepon}}</td>
                                                <td>
                                                    <a href="{{url('admin/member/edit',$row->id)}}" class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i></a>
                                                    <a href="{{url('admin/member/delete',$row->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('apa kamu serius?')"><i class=" fas fa-trash"></i></a></td>
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
                                              <form action="{{ route('admin.member.store')}}" method="POST" enctype="multipart/from-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Add New Member</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Name</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Name" parsley-trigger="change" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Address</label>
                                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Address" parsley-trigger="change" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState" class="control-label">Gender</label>
                                                            <select name="jenis_kelamin" class="form-control">
                                                                <option disabled selected>Select</option>
                                                                <option value="L">Laki-Laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Phone Number</label>
                                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Phone Number" parsley-trigger="change" required>
                                                            </div>
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