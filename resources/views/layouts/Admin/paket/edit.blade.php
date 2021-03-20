@extends('layouts.admin.app')
@section('title','Paket | Laundry Application')

@section('content')
						<div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="header-title">{{$page_sub_title}}</h4>
                                    
                                    <form action="{{url('admin/paket/update',$paket->id)}}" class="parsley-examples" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                         <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4" class="col-form-label">Outlet</label>
                                                            <select name="id_outlet" id="id_outlet" class="form-control">
                                                                @foreach ($outlet as $row)
                                                                <option @if($row->id==$paket->id_outlet) selected @endif value="{{$row->id}}">{{$row->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="from-group col-md-4">
                                                                <label for="field-2" class="col-form-label">Type</label>
                                                                <select name="jenis" id="jenis" class="form-control">
                                                                <option disabled selected>Select</option>
                                                                <option value="kiloan" @if($paket->jenis == 'kiloan') selected @endif>Kiloan</option>
                                                                <option value="selimut" @if($paket->jenis == 'selimut') selected @endif>Selimut</option>
                                                                <option value="bed_cover" @if($paket->jenis == 'bed_cover') selected @endif>Bed Cover</option>
                                                                <option value="kaos" @if($paket->jenis == 'kaos') selected @endif>Kaos</option>
                                                                <option value="lain" @if($paket->jenis == 'lain') selected @endif>Lain</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-3" class="col-form-label">Name Paket</label>
                                                                <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Name Paket" value="{{$paket->nama_paket}}" parsley-trigger="change" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-3" class="col-form-label">Price</label>
                                                                <input type="text" class="form-control" id="harga" name="harga" value="{{$paket->harga}}" placeholder="Price" parsley-trigger="change" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                Submit
                                            </button>
                                            <a href="{{route('admin.paket.index')}}" class="btn btn-secondary waves-effect waves-light">
                                                Cancel
                                        	</a>
                                        </div>
                                    </form>
                                </div> <!-- end card-box -->
                            </div>
                            <!-- end col -->
                        </div>
@endsection