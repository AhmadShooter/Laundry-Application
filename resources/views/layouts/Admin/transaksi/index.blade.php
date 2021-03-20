@extends('layouts.admin.app')
@section('title','Transaksi | Laundry Application')

@section('content')
<?php use App\Detail_transaksi as Dt;use App\Paket;?>
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
                                                    <a href="{{url('admin/transaksi/create')}}">
                                                    <button type="button" id="demo-btn-addrow" class="btn btn-primary" data-toggle="modal" data-target="#con-close-modal"><i class="mdi mdi-plus-circle mr-2"></i> Add New Transaksi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></a>
                        <table id="table-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Outlet</th>
                                    <th>Nama Paket</th>
                                    <th>Kode invoice</th>
                                   <!--  <th>Id member</th> -->
                                    <th>Waktu</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Batas waktu</th>
                                    <th>Biaya Tambahan</th>


                                <!--     <th>Diskon</th>
                                    <th>Pajak</th>
                                    <th>Berat</th> -->
                                    <th>Total harga</th>
                                    <th>Status</th>
                                    <th>DI Bayar</th>
                                    <th>Id User</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $row)

                                <?php
                                    $dt = Dt::where('id_transaksi', $row->id)->first();
                                    $paket = Paket::where('id', $dt->id_paket)->first();
                                ?>
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->outlet->nama}}</td>
                                    <td>{{$paket->nama_paket}}</td>
                                    <td>{{$row->kode_invoice}}</td>
                                   <!--  <td>
                                        @if(!empty($row->member->nama))
                                        {{$row->member->nama}}
                                        @else
                                        {{$row->id_member}}
                                        @endif
                                    </td> -->
                                    <td>{{$row->datetime}}</td>
                                    <td>{{$row->tgl_bayar}}</td>
                                    <td>{{$row->batas_waktu}}</td>
                                    <td>{{$row->biaya_tambahan}}</td>
<!--                                     <td>{{$row->diskon}}</td>
                                    <td>{{$row->pajak}}</td>
                                    <td>{{$dt->qty}}</td> -->
                                    <td>{{$row->ttl_harga}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>{{$row->dibayar}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td>
                                        <a href="{{url('admin/transaksi/edit',$row->id)}}" class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i></a>
                                        &nbsp;&nbsp;
                                        <a target="__blank" href="{{route('admin.transaksi.struk',$row->id)}}" target_blank class="btn btn-sm btn-primary"><i class="fe-file-text"></i></a>
                                        &nbsp;&nbsp;
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection