<html>

<head>
    <title>STRUK</title>
    <style>
        body {
            margin: 0px;
            text-decoration: none;
            box-sizing: border-box;
            list-style: none;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: 'Josefin Sans', sans-serif;
        }

        .navbar {
            background-color: #f41818;
            width: 249px;
            height: 60px;
            float: left;
            font-family: 'Josefin Sans', sans-serif;
        }

        .navbar h3 {
            color: white;
            font-size: 30px;
            margin-left: 20px;
            margin-top: 4px;
            padding-top: 20px;
        }

        .navbar-default {
            background-color: #f41818;
            width: 843px;
            height: 90px;
            float: left;
            margin-left: 249px;
            margin-top: -90px;
        }

        .navbar-default h3 {
            font-size: 39px;
            color: white;
            margin-top: 80px;
            font-family: 'Josefin Sans', sans-serif;
        }

        .wrapper {
            display: flex;
            position: static;
            float: left;
            background-color: #b50c0c;
        }

        .wrapper.sidebar {
            margin-left: 100px;
            width: 200px;
            height: 100%;
            background: #4b4276;
            padding: 30px 0px;
            position: fixed;

        }

        .wrapper .sidebar ul li {

            padding: 15px;
            border-bottom: 1px solid #bdb8d7;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.05);

        }

        .wrapper .sidebar ul li a {
            color: #bdb8d7;
            display: block;
        }

        .wrapper .sidebar ul li a.fas {
            width: 25px;
        }

        .wrapper .sidebar ul li:hover {
            background-color: #594f8d;
        }

        .wrapper .sidebar ul li:hover a {
            color: #fff;
        }

        .dropdown:hover .isi-dropdown {
            display: block;
        }

        .isi-dropdown a:hover {
            color: #bdb8d7;
        }

        .isi-dropdown {
            display: none;
            z-index: 1;
        }

        .isi-dropdown a {
            color: #4B4276;
            padding: 10px;
        }

        .content {
            height: 540px;
            width: 1365px;
            background-color: #dddddd;
            float: left;

        }





        .box {
            width: 830px;
            height: 50px;
            background-color: white;
            float: left;
            margin-left: 7px;
            margin-top: 10px;
            border-radius: 10px;
            border-top: 2px solid #9b0c0c;
            border-bottom: 2px solid #9b0c0c;
        }

        .box1 {
            width: 830px;
            height: 300px;
            background-color: white;
            float: left;
            margin-left: 7px;
            margin-top: 20px;
            border-radius: 10px;
            border-top: 2px solid #9b0c0c;
            border-bottom: 2px solid #9b0c0c;
        }

        .box p {
            margin-left: 10px;
            margin-top: 20px;
        }

        .box1 p {
            margin-left: 10px;
            margin-top: 20px;
        }

        .transaksi tr td input {
            width: 120px;
            height: 30px;
            border-radius: 5px;
        }

        .tabel tr th {
            height: 30px;
            width: 120px;
            background-color: #2bf2e1;
        }

        .tabel tr td {
            background-color: #dbbcbc;
        }
            .kotak-struk .custom_font{
        font-family:Tahoma;
    }
    @font-face{
        font-family:Tahoma;
        src: url(‘http://localhost/laundry/fonts/Tahoma.TTF’);
    }
    .kotak-struk{
        float: left;
        width: 380px;
        height: auto;
    }
    .kotak-struk .head p{
        text-align: center;
    }
    .kotak-struk .head .logo{
        font-weight: bold;
    }
    .kotak-struk .head .logo, .almt, .notelp{
        font-family: 'Tahoma';
        line-height: 15px;
    }
    .kotak-struk .table1{
        margin: 0px 30px;
    }
    .kotak-struk .table1 tr td{
        font-family: 'Tahoma';
        line-height: 25px;
    }
    .kotak-struk .table2{
        margin: 0px 30px;
    }
    .kotak-struk .table2 tr td{
        font-family: 'Tahoma';
        line-height: 25px;
        text-align: center;
    }
    .kotak-struk .table2 tr th{
        font-family: 'Tahoma';
        line-height: 25px;
        text-align: center;
    }
    .kotak-struk .table4{
        float: right;
        margin: 0px 30px;
    }
    .kotak-struk .table4 tr td{
        text-align: right;
    }
    .kotak-struk .foot{
        float: left;
        text-align: center;
        line-height: 20px;
        margin: 0px 40px ;
        margin-top: 10px;
        font-family: 'Tahoma';
        line-height: 20px;
    }
    </style>
</head>
<?php use App\Detail_transaksi as Dt;use App\Paket;?>
<body>
    <div class="kotak-struk" style="margin-left: 30%;">
        <div class="head">
            <p class="logo">JAYA</p>
            <p class="almt">Laundry</p>
            <p class="notelp">085213770187</p>
        </div>
        <div class="isi">
            <table class="tabel1">
                <tr>
                    <td>Kode Transaksi</td>
                    <td>:</td>
                    <td>{{$data->id}}</td>
                </tr>
                <tr>
                    <td>Tanggal Mencuci</td>
                    <td>:</td>
                    <td>{{$data->datetime}}</td>
                </tr>
                <tr>
                    <td>Tanggal Bayar</td>
                    <td>:</td>
                    <td>{{$data->tgl_bayar}}</td>
                </tr>
                <tr>
                    <td>Tanggal Selesai</td>
                    <td>:</td>
                    <td>{{$data->batas_waktu}}</td>
                </tr>
                <tr>
                    <td>Member/Bukan Member</td>
                    <td>:</td>
                    <td>{{$data->member_id}}</td>
                </tr>
                <tr>
                    <td colspan="4">====================================================</td>
                </tr>
            </table>
            <?php
                $dt = Dt::where('id_transaksi', $row->id)->first();
                $paket = Paket::where('id', $dt->id_paket)->first();
            ?>
            <table class="tabel2">
                <tr>
                    <td>Jenis</td>
                    <td>:</td>
                    <td>{{$paket->jenis}}</td>
                </tr>
                <tr>
                    <td>Nama Paket</td>
                    <td>:</td>
                    <td>{{$paket->nama_paket}}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td>{{$paket->harga}}</td>
                </tr>
                <tr>
                    <td>Berat</td>
                    <td>:</td>
                    <td>{{$row->qty}}</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td>:</td>
                    <td>{{$data->sub_total}}</td>
                </tr>
                <tr>
                    <td colspan="4">====================================================</td>
                </tr>
            </table>
            <table class="tabel3">
                <tr>
                    <td>Diskon</td>
                    <td>:</td>
                    <td>{{$data->diskon}}%</td>
                </tr>
                <tr>
                    <td>pajak</td>
                    <td>:</td>
                    <td>{{$data->pajak}}%</td>
                </tr>
                <tr>
                    <td>Biaya Tambahan</td>
                    <td>:</td>
                    <td>{{$data->biaya_tambahan}}</td>
                </tr>
                <tr>
                    <td>dibayar</td>
                    <td>:</td>
                    <td>{{$data->dibayar}}</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>:</td>
                    <td>{{$data->ttl_harga}}</td>
                </tr>
                <tr>
                    <td>Kembalian</td>
                    <td>:</td>
                    <td>{{$data->kembalian}}</td>
                </tr>
                <tr>
                    <td>Kekuragan</td>
                    <td>:</td>
                    <td>{{$data->kekuragan}}</td>
                </tr>
                <tr>
                    <td colspan="4">====================================================</td>
                </tr>
            </table>
            <div class="foot">
                <p>Terima Kasih Atas Kunjungan Anda</p>
                <p>Semoga Anda Puas Dengan Layanan Kami</p>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    window.print();
</script>