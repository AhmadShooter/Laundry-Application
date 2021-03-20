<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;
use PDF;
use App\detail_transaksi;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;

class LaporanController extends Controller
{
        public function index(Request $request)
    {
    	$data['page_title'] = "Laporan";
 		$data['page_sub_title'] = "Laporan Table";
        $data['laporan'] =Transaksi::whereBetween('created_at', [$request->get('datetime'), $request->get('batas_waktu') ])->get();

        return view('layouts.admin.laporan.index', $data);
    }

    // public function cari(Request $request)
	// {
	// 	// menangkap data pencarian
    //     $datetime = $request->get('datetime');
    //     // $batas_waktu = $request->get('batas_waktu');
    //     $laporan['laporan'] = Transaksi::all();
        
    //     //untuk proses mencari data
    //     if($datetime){
    //         $laporan = Transaksi::where("datetime","LIKE","%$datetime%")->get();
    //     }
    //     // else if($batas_waktu){
    //     //     $laporan = Transaksi::where("batas_waktu","LIKE","%$batas_waktu%")->get();
    //     // }
    // 		// mengirim data laporan ke view index
	// 	return redirect('admin/laporan',$laporan);

	// }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function print()
    {
        $pdf = PDF::loadredirect('admin/laporan')->setPeper('A4','potret');
        return $pdf->stream();
    }
}
