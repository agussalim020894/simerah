<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Elemenkerjasama;
use App\Model\Mitrakerjasama;
use App\Model\Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\PencarianExport;
use Maatwebsite\Excel\Facades\Excel;

class laporankerjasamaController extends Controller
{
    public function index()
    {
        $mitrakerjasamas = Mitrakerjasama::all();

        if(Auth::user()->level == 2){
            $datas = Elemenkerjasama::with('data')->whereMitrakerjasamaId(Auth::user()->mitrakerjasama_id)->whereNull('parent_id')->get();
        }else{
            $datas = Elemenkerjasama::with('data')->whereNull('parent_id')->get();
        }
        $tahuns = array();
        for ($i=2020; $i < 2025; $i++) { 
            $tahuns[]=$i;
        }
        $elemenkerjasama = new Elemenkerjasama;
        return view('backend.laporankerjasama.index',['mitrakerjasamas'=>$mitrakerjasamas,'datas'=>$datas,'tahuns'=>$tahuns,'elemenkerjasama'=>$elemenkerjasama]);
    }
    public function mitrakerjasama(Request $request)
    {
        $mitrakerjasamas = Mitrakerjasama::all();
        $datas = Elemenkerjasama::whereMitrakerjasamaId($request->mitrakerjasama)->whereNull('parent_id')->get();
        $tahuns = array();
        for ($i=2020; $i < 2025; $i++) { 
            $tahuns[]=$i;
        }
        $elemenkerjasama = new Elemenkerjasama;
        return view('backend.laporankerjasama.index',['mitrakerjasamas'=>$mitrakerjasamas,'datas'=>$datas,'tahuns'=>$tahuns,'elemenkerjasama'=>$elemenkerjasama,'idmitrakerjasama'=>$request->mitrakerjasama]);
    }

    public function chart($id) 
    {
        $tahuns = array();
        for ($i=2020; $i < 2025; $i++) { 
            $tahuns[]=$i;
        }
        $query=Data::whereElemenkerjasamaId($id)->whereIn('tahun', $tahuns)->orderBy('tahun','desc')->get();
        $jumlah=array();
        $tahun=array();
        foreach($query as $qr){
            $jumlah[]=$qr->jumlah;
            $tahun[]=$qr->tahun;
        }
        $data = [
            'jumlah' => $jumlah,
            'tahun' => $tahun
        ];
        return $data;
    }

    public function export($id) 
    {
        return Excel::download(new PencarianExport($id), $id.'.xlsx');
    }
}