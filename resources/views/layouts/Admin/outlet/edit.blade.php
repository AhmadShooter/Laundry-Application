@extends('layouts.admin.app')
@section('title','Outlet | Laundry Application')

@section('content')
						<div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="header-title">{{$page_sub_title}}</h4>
                                    
                                    <form action="{{url('admin/outlet/update',$outlet->id)}}" class="parsley-examples" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                         <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4" class="col-form-label">Name</label>
                                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Name" value="{{$outlet->nama}}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4" class="col-form-label">Address</label>
                                                            <input type="text" name="alamat" class="form-control" name="alamat" id="alamat" placeholder="Password" value="{{$outlet->alamat}}">
                                                        </div>
                                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="emailAddress" class="col-form-label">Phone Number</label>
                                            <input type="text" name="telepon" parsley-trigger="change" required placeholder="Enter email" class="form-control" id="telepon" value="{{$outlet->telepon}}">
                                        </div>
                                    </div>

                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                Submit
                                            </button>
                                            <a href="{{route('admin.outlet.index')}}" class="btn btn-secondary waves-effect waves-light">
                                                Cancel
                                        	</a>
                                        </div>
                                    </form>
                                </div> <!-- end card-box -->
                            </div>
                            <!-- end col -->
                        </div>
@endsection