@extends('layouts.admin.app')
@section('title','Transaksi | Laundry Application')

@section('content')

<div class="picker-1"></div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$page_sub_title}}</h3>
                    </div>
                    <form role="form" action="{{route('admin.transaksi.store')}}" method="POST" enctype="multipart/from-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label>invoice</label>
                                <div>
                                    <input data-parsley-type="text" name="kode_invoice" id="kode_invoice"  type="text" class="form-control" readonly required value="<?php echo  'INV-' . date('is') . '-' . $invNo; ?>" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Nama Outlet</label>
                                <div>
                                    <select name="id_outlet" class="form-control">
                                        <option disabled selected>Select</option>
                                        @foreach($outlet as $row)
                                        <option value="{{$row->id}}"> {{$row->nama}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Waktu</label>
                                <div>
                                    <input data-parsley-type="text" name="datetime" id="datetime" type="text" class="form-control" value="<?php $tgl = date('Y/m/d');
                                                                                                                                            echo $tgl; ?>" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Tanggal bayar</label>
                                <div>
                                    <input data-parsley-type="date" name="tgl_bayar" id="tgl_bayar" type="date" class="form-control" required placeholder="Enter number" />
                                </div>
                            </div>
                            <div class="col-md-2">

                                <label>Member</label>
                                <div>
                                    <select class="form-control member">
                                        <option disabled selected>Select</option>
                                        <option value="member">Member</option>
                                        <option value="bukan_member" id="bukan_member">Bukan Member</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" id="id_member">
                                <label>Nama member</label>
                                <div>
                                    <select name="id_member" id="id_member" onkeyup="NM()" class="form-control">
                                        <option value="bukan_member">Select</option>
                                        @foreach($member as $row)
                                        <option value="{{$row->id}}"> {{$row->nama}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Batas Waktu</label>
                                <div>
                                    <input data-parsley-type="date" name="batas_waktu" id="batas_waktu" type="date" class="form-control" required placeholder="Enter number" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>jenis</label>
                                <div>
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option>Select</option>
                                        @foreach($paket as $row)
                                        <option value="{{$row->id}}"> {{$row->jenis}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Nama Paket</label>
                                <div>
                                    <select name="id_paket" id="id_paket" class="form-control">
                                        <option>Select</option>
                                        @foreach($paket as $row)
                                        <option value="{{$row->id}}"> {{$row->nama_paket}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Harga</label>
                                <div>
                                    <input data-parsley-type="text" name="harga_paket" id="harga_paket" type="text" class="form-control" readonly="" required placeholder="Enter number" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Berat</label>
                                <div>
                                    <input data-parsley-type="number" name="qty" id="qty" type="number" class="form-control" required placeholder="Enter number" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Sub Total</label>
                                <div>
                                    <input data-parsley-type="number" name="sub_total" id="sub_total" type="number" class="form-control disabled" required placeholder="Enter number" />
                                    <input data-parsley-type="number" id="tambah" hidden readonly="" type="number" class="form-control" value="0" />
                                </div>
                            </div>
                            <div style="margin-top:2.7%;">
                                <button class="btn btn-danger" id="idTombolPlus">+</button>
                            </div>
                        </div>
                        <br>
                        <table id="idtable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Jenis</th>
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    <th>Berat</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                        </table>
                        <br>
                        <div class="row">
                            <div class="col-md-2" id="diskon">
                                <label>diskon</label>
                                <div class="input-group m-b-15">
                                    <input data-parsley-type="number"  name="diskon" id="diskon" type="number" class="form-control diskon" placeholder="Enter number" />
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Pajak</label>
                                <div class="input-group m-b-15">
                                    <input data-parsley-type="text" name="pajak" id="pajak" type="text" class="form-control" value="10" required placeholder="Enter number" />
                                    <span class="input-group-addon">%</span>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Biaya Tambahan</label>
                                <div>
                                    <input data-parsley-type="number" name="biaya_tambahan" id="biaya_tambahan" type="number" class="form-control"  placeholder="Enter number" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>dibayar</label>
                                <div>
                                    <input data-parsley-type="number" name="dibayar" id="dibayar" type="number" class="form-control" required placeholder="Enter number" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Total Harga</label>
                                <div>
                                    <input data-parsley-type="number" name="ttl_harga" id="ttl_harga" value="0" type="number" readonly="" class="form-control disabled tambah" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Kembalian</label>
                                <div>
                                    <input data-parsley-type="number" name="kembalian" id="kembalian" readonly="" value="0" type="number" class="form-control disabled " />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Kekurangan</label>
                                <div>
                                    <input data-parsley-type="number" name="kekuragan" id="kekuragan" readonly="" value="0" type="number" class="form-control disabled kk" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Nama user</label>
                                <div>
                                    <select name="id_user" id="id_user" class="form-control">
                                        <option disabled selected>Select</option>
                                        @foreach($user as $row)
                                        <option value="{{$row->id}}"> {{$row->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>status</label>
                                <div>
                                    <select name="status" class="form-control">
                                        <option disabled selected>Status</option>
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
            $("#id_member").hide();
            $("#diskon").hide();
        } else if (tbmember == 'member') {
            $("#id_member").show();
            $("#diskon").show();
        }
    });
</script>
<script>
    $('#idTombolPlus').on('click', function() {
        var _kode_invoice = $('input[name="kode_invoice"]').val();
        var _jenis = $('select[name="jenis"]').val();
        var _id_paket = $('select[name="id_paket"]').val();
        var _harga_paket = $('input[name="harga_paket"]').val();
        var _qty = $('input[name="qty"]').val();
        var _sub_total = $('input[name="sub_total"]').val();

        var _tr = '<tr> <td>' + _kode_invoice + '</td> <td>' + _jenis + '</td> <td>' + _id_paket + '</td> <td>' + _harga_paket + '</td> <td>' + _qty + '</td> <td>' + _sub_total + '</td> </tr>';

        $('#idtable').append(_tr);
    });
</script>

<script>
    $('document').ready(function() {
        $('#id_paket').on('change', function() {
            var id_paket = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('admin.paket.data') }}/" + id_paket,
                success: function(data) {
                    console.log(data);
                    $('#harga_paket').val(data.harga);
                }
            });
        })

        $('#qty').on('keyup', function() {
            var harga_paket = $('#harga_paket').val();
            var qty = $(this).val();

            var sub_total = parseInt(harga_paket) * parseInt(qty);
            $('#sub_total').val(sub_total);
        })

        $('#idTombolPlus').on('click', function() {
            var sub_total = $('#sub_total').val();
            var ttl_harga = $('#tambah').val();
            var pajak = $('#pajak').val();
            // console.log(sub_total + ' - ' + ttl_harga);
            var anjim = parseInt(sub_total) + parseInt(ttl_harga);
            var ttl = parseInt(sub_total) * parseInt(pajak) / 100;
            var pjk = parseInt(anjim) + parseInt(ttl);
            $('#tambah').val(pjk);
            $('#ttl_harga').val(pjk);
        })

        $('.diskon').on('change', function() {
            var ttl_harga = $('#ttl_harga').val();
            var diskon = $(this).val();

            var jumlah = parseInt(ttl_harga) - parseInt(diskon);
            $('#ttl_harga').val(jumlah);
        })

        $('#biaya_tambahan').on('change', function() {
            var ttl_harga = $('#ttl_harga').val();
            var biaya_tambahan = $(this).val();

            var jumlah = parseInt(ttl_harga) + parseInt(biaya_tambahan);
            $('#ttl_harga').val(jumlah);
        })

        $('#dibayar').on('change', function() {
            var ttl_harga = $('#ttl_harga').val();
            var dibayar = $(this).val();
            var jumlah = parseInt(ttl_harga) ;
            if (dibayar > jumlah) {
                var kembalian = parseInt(dibayar) - parseInt(ttl_harga);
                $('#kembalian').val(kembalian);
            } else {
                var jumlah = parseInt(ttl_harga) - parseInt(dibayar);
                $('.kk').val(jumlah);
            }

        })
    });
</script>
@endpush