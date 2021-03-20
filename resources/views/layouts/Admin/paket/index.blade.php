@extends('layouts.admin.app')
@section('title','Paket | Laundry Application')

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
                                                    <button type="button" id="demo-btn-addrow" class="btn btn-primary" data-toggle="modal" data-target="#con-close-modal"><i class="mdi mdi-plus-circle mr-2"></i> Add New Paket</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         

                                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    
                                       
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Outlet</th>
                                                <th>Type</th>
                                                <th>Name Paket</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
    
                                            <tbody>
                                                @foreach ($paket as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->outlet->nama}}</td>
                                                <td>{{$row->jenis}}</td>
                                                <td>{{$row->nama_paket}}</td>
                                                <td>{{$row->harga}}</td>
                                                <td>
                                                    <a href="{{url('admin/paket/edit',$row->id)}}" class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i></a>
                                                    <a href="{{url('admin/paket/delete',$row->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('apa kamu serius?')"><i class=" fas fa-trash"></i></a></td>
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
                                              <form action="{{ route('admin.paket.store')}}" method="POST" enctype="multipart/from-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Add New Member</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Outlet</label>
                                                                <select name="id_outlet" id="id_outlet" class="form-control">
                                                                <option disabled selected>Select</option>
                                                                @foreach ($outlet as $item)
                                                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Type</label>
                                                                <select name="jenis" id="jenis" class="form-control">
                                                                <option disabled selected>Select</option>
                                                                <option value="kiloan">Kiloan</option>
                                                                <option value="selimut">Selimut</option>
                                                                <option value="bed_cover">Bed Cover</option>
                                                                <option value="kaos">Kaos</option>
                                                                <option value="lain">Lain</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Name Paket</label>
                                                                <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Name Paket" parsley-trigger="change" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Price</label>
                                                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Price" parsley-trigger="change" required>
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