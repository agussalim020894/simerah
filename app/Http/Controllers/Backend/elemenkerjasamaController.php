<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Model\Wilayahkerjasama;
use App\Model\Data;

class elemenkerjasamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.$this->kode.'.index');
    }

    public function data(Request $request, $id=NULL)
    {
        if ($request->ajax()) {
            $data= $id!=NULL ? $this->model::whereParentId($id)->whereMitrakerjasamaId(Auth::user()->mitrakerjasama_id)->get() : $this->model::whereNull('parent_id')->whereMitrakerjasamaId(Auth::user()->mitrakerjasama_id)->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('kelola', function($q){
                    if($q->status==0){
                        $kelola = '<div style="text-align: center;"><a href="'.url($this->kode.'/'.$q->id).'" class="text-info"><i class="fa fa-share text-info"></i></a></div>';
                    }
                    elseif($q->status==1 || $q->status==2){
                        $kelola = '<div style="text-align: center;"><a href="'.url('data/'.$q->id).'" class="text-info"><i class="fa fa-plus text-info"></i></a></div>';
                    }
                    return $kelola ?? NULL;
                })
                ->addColumn('action', '<div style="text-align: center;">
               <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" '.$this->kode.'-id="{{ $id }}" href="#edit-{{ $id }}">
                   <i class="fa fa-edit text-warning"></i>
               </a>&nbsp; &nbsp;
               <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" href="#hapus-{{ $id }}" '.$this->kode.'-id="{{ $id }}">
                   <i class="fa fa-trash text-danger"></i>
               </a>
           </div>')->rawColumns(['action', 'kelola'])->make(TRUE);
        }
        else {
            exit("Not an AJAX request -_-");
        }
    }

    public function detaildata(Request $request, $id=NULL)
    {
        if ($request->ajax()) {
            $data= Data::whereElemenkerjasamaId($id)->latest()->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', '<div style="text-align: center;">
               <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" '.$this->kode.'-id="{{ $id }}" href="#edit-{{ $id }}">
                   <i class="fa fa-edit text-warning"></i>
               </a>&nbsp; &nbsp;
               <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" href="#hapus-{{ $id }}" '.$this->kode.'-id="{{ $id }}">
                   <i class="fa fa-trash text-danger"></i>
               </a>
           </div>')->rawColumns(['action'])->make(TRUE);
        }
        else {
            exit("Not an AJAX request -_-");
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.$this->kode.'.tambah');
    }

    public function create_child($id)
    {
        return view('backend.'.$this->kode.'.tambah-detail', ['id'=>$id]);
    }

    public function createdata($id)
    {
        return view('backend.'.$this->kode.'.tambah-data', ['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
                $validator=Validator::make($request->all(), [
                    'nama'         => 'required|'.config('master.regex.json'),
                    'status'       => 'required'
                    ]);
                if ($validator->fails()) {
                    $respon=['status'=>false, 'pesan'=>$validator->messages()];
                }
                else {
                    $data = $this->model::create($request->all());
                    if ($request->hasFile('file')) {
                        $data->file()->create([
                            'name'      => 'fileinstansi',
                            'data'      =>  [
                            'disk'      => config('filesystems.default'),
                            'target'    => Storage::putFile($this->kode.'/fileinstansi/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('file')),
                            ]
                        ]);
                    }
                    if($request->parent_id){
                        $request->request->add(['parent_id'=>$request->parent_id]);
                    }
                    $request->request->add(['mitrakerjasama_id'=>Auth::user()->mitrakerjasama_id]);
                    $this->model::create($request->all());
                    $respon=['status'=>true, 'pesan'=>'Data berhasil disimpan'];
                }
                return $respon;
        }
        else {
            exit('Ops, an Ajax request');
        }
    }

    public function save($id)
    {
        $data=[
            'data'    => $this->model::find($id)
        ];
        return view('backend.'.$this->kode.'.save', $data);
    }

    public function store_profil(Request $request)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
                'isi'       => 'required'
                ]);
            if ($validator->fails()) {
                $respon=['status'=>false, 'pesan'=>$validator->messages()];
            }
            else {
                $this->model::whereId($request->id)->first()->update($request->all());
                $respon=['status'=>true, 'pesan'=>'Data berhasil disimpan'];
            }
            return $respon;
        }
        else {
            exit('Ops, an Ajax request');
        }
    }
    public function store_data(Request $request)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
                'tahun'       => 'required'
                ]);
            if ($validator->fails()) {
                $respon=['status'=>false, 'pesan'=>$validator->messages()];
            }
            else {
                $this->model::whereId($request->id)->first()->update($request->all());
                $respon=['status'=>true, 'pesan'=>'Data berhasil disimpan'];
            }
            return $respon;
        }
        else {
            exit('Ops, an Ajax request');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $elemenkerjasama = $this->model::find($id);
        $nama = '<a href="'.url($this->kode.'/'.$elemenkerjasama->id).'" class="text-dark">'.$elemenkerjasama->nama.'</a>';
        if($elemenkerjasama->parent){
            $nama = $elemenkerjasama->getParentNama($nama,$elemenkerjasama->parent->id);
            // dd($nama);   
        }
        $data=[
            'data'    => $this->model::find($id),
            'nama'    => $nama
        ];
        return view('backend.'.$this->kode.'.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[
            'data'    => $this->model::find($id)
        ];
        return view('backend.'.$this->kode.'.ubah', $data);
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
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
                'nama'         => 'required|'.config('master.regex.json'),
                'status'       => 'required'
            ]);
            if ($validator->fails()) {
                $response=['status'=>FALSE, 'pesan'=>$validator->messages()];
            }
            else {
                $data=$this->model::find($id);
                if($request->status!=0 && $data->status==0){
                    $data->whereParentId($id)->delete();
                    Data::whereElemenkerjasamaId($id)->delete();
                    $request->request->add(['satuan'=>null,'wilayahkerjasama_id'=>null,'keterangan'=>null]);
                }
                if ($data->update($request->all())) {
                    $response=['status'=>TRUE, 'pesan'=>['msg'=>'Data berhasil diubah']];
                }
                else {
                    $response=['status'=>FALSE, 'pesan'=>['msg'=>'Data gagal diubah']];
                }
            }
            return $response ?? ['status'=>FALSE, 'pesan'=>['msg'=>'Data gagal disimpan']];
        }
        else {
            exit('Ops, an Ajax request');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $data=$this->model::find($id);
        return view('backend.'.$this->kode.'.hapus', ['data'=>$data]);
    }

    public function destroy($id)
    {
        $data=$this->model::find($id);
        if ($data->delete()) {
            $response=['status'=>TRUE, 'pesan'=>['msg'=>'Data berhasil dihapus']];
        }
        else {
            $response=['status'=>FALSE, 'pesan'=>['msg'=>'Data gagal dihapus']];
        }
        return response()->json($response);
    }
}
