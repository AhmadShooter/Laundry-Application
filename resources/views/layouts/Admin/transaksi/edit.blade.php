@extends('layouts.admin.app')
@section('title','Transaksi | Laundry Application')

@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$page_title}}</h3>
                    </div>
                    <form role="form" action="{{url('admin/transaksi/update',$transaksi->id)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label>invoice</label>
                                <div>
                                    <input data-parsley-type="text" name="kode_invoice" id="kode_invoice" type="text" class="form-control" required value="<?php echo  'INV-' . date('is') . '-' . $invNo; ?>" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>dibayar</label>
                                <div>
                                    <input data-parsley-type="number" name="dibayar" id="dibayar" value="{{$transaksi->dibayar}}" type="number" class="form-control" required placeholder="Enter number" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Total Harga</label>
                                <div>
                                    <input data-parsley-type="number" name="ttl_harga" value="{{$transaksi->ttl_harga}}" id="ttl_harga" value="0" type="number" class="form-control disabled tambah" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Kembalian</label>
                                <div>
                                    <input data-parsley-type="number" name="kembalian" id="kembalian" value="{{$transaksi->kembalian}}" value="0" type="number" class="form-control disabled tambah" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>kekuragan</label>
                                <div>
                                    <input data-parsley-type="number" name="kekuragan" id="kekuragan" value="{{$transaksi->kekuragan}}" value="0" type="number" class="form-control disabled tambah" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Nama user</label>
                                <div>
                                    <select name="id_user" class="form-control">
                                        <option option>---Atas Nama---</option>
                                        @foreach($user as $row)
                                        <option value="{{$row->id}}"> {{$row->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>status</label>
                                <div>
                                    <select name="status" class="form-control">
                                        <option value="">--Status---</option>
                                        <option value="baru">Baru</option>
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                        <option value="diambil">Diambil</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right mb-0">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                <a href="{{route('admin.transaksi.index')}}" class="btn btn-secondary waves-effect waves-light">
                                    Cancel
                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- End Row -->
    </div> <!-- container -->
</div>

@endsection
@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('.member').on('change', function() {
        var tbmember = $(this).val();
        if (tbmember == 'bukan_member') {
            $("#member_id").hide();
            $("#diskon").hide();

        } else if (tbmember == 'member') {
            $("#member_id").show();
            $("#diskon").show();

        }
    });
</script>

<script>
    $('#dibayar').on('change', function() {
        var ttl_harga = $('#ttl_harga').val();
        var dibayar = $(this).val();
        var jumlah = parseInt(ttl_harga);
        if (dibayar > jumlah) {
            var kembalian = parseInt(dibayar) - parseInt(ttl_harga);
            $('#kembalian').val(kembalian);
            $('#kekuragan').val(0);
        } else {
            var jumlah = parseInt(ttl_harga) - parseInt(dibayar);
            $('.kk').val(jumlah);
        }

    })
</script>
@endpush