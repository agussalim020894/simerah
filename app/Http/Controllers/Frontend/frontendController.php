<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\foto;
use App\Model\Mitrakerjasama;
use App\Model\Wilayahkerjasama;
use App\Model\Elemenkerjasama;
use App\Model\Dokumenkerjasama;
use App\Model\Data;
use App\Exports\PencarianExport;
use Maatwebsite\Excel\Facades\Excel;
class frontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = array(
            'slider' => foto::where('status',config('master.status_foto.slider'))->orderBy('id','desc')->take(5)->get(),
            'data' => Elemen::where('status','1')->get(),
            'elemen' => Elemen::whereNull('parent_id')->get(),
            'mitrakerjasama' => Mitrakerjasama::orderby('tingkatan','asc')->get(),
            'wilayahkerjasama' => Wilayahkerjasama::where('tingkatan','1')->get(),
            'buku' => Dokumen::whereStatus(config('master.status_dokumen.buku'))->latest()->get(),
            'monografi' => Dokumen::whereStatus(config('master.status_dokumen.monografi'))->latest()->get(),
        );
        return view('frontend.beranda.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mitrakerjasamaAll(){
        $mitrakerjasama = Mitrakerjasama::orderby('tingkatan','asc')->get();
        return view('frontend.beranda.mitrakerjasamaall', compact('mitrakerjasama'));
    }

    public function mitrakerjasamaDetail($id){
        $tahun5 = config('master.tahunlaporan');

        if (!isset($_GET['tahunawal'], $_GET['tahunakhir'])) {
            $tahuns = config('master.tahunlaporan');
            }else{
            for ($i = $_GET['tahunawal']; $i <= $_GET['tahunakhir']; $i++){
                $tahuns[]=$i;
            }
        }
        $datas = Elemen::whereMitrakerjasamaId($id)->whereNull('parent_id')->get();
        $elemen = new Elemen;
        $dataMitrakerjasama = Mitrakerjasama::findOrFail($id);
        return view('frontend.beranda.mitrakerjasama', compact('dataMitrakerjasama','tahuns', 'elemen','datas', 'tahun5'));
    }

    public function cari(Request $request){
        $cari = $request->keyword;
        $data = [
            'count'=>Elemen::where('nama' ,'LIKE','%'.$cari.'%')->count(),
            'elemen'=>Elemen::whereNull('parent_id')->where('nama' ,'LIKE','%'.$cari.'%')->get(),
            'subelemen'=>Elemen::whereNotNull('parent_id')->where('nama' ,'LIKE','%'.$cari.'%')->get(),
            'keyword'=>$cari
        ];
        return view('frontend.beranda.cari.index', $data);
    }

    public function caridetail($id){
        $elemen = Elemen::find($id);

        $nama = '<i>'.$elemen->nama.'</i>';
        if($elemen->parent){
            $nama = $elemen->getParentNamaFront($nama,$elemen->parent->id);
        }
        $data = [
            'datas'=> $elemen,
            'tahuns' => config('master.tahunlaporan'),
            'elemen' => new Elemen,
            'nama' => $nama,
        ];
        return view('frontend.beranda.cari.cari-detail', $data);
    }

    public function export($id) 
    {
        return Excel::download(new PencarianExport($id), $id.'.xlsx');
    }

    public function chart($id) 
    {
        
        $query=Data::whereElemenId($id)->whereIn('tahun',config('master.tahunlaporan'))->orderBy('tahun','desc')->get();
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

}
