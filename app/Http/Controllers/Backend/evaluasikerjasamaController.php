<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Model\File;

class evaluasikerjasamaController extends Controller
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

    public function data(Request $request)
    {
        // if ($request->ajax()) {
            $data= $this->model::whereStatus(config('master.status_dokumen.evaluasi'))->latest()->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('file', function($q){
                    $file = $q->file && $q->file->getFileName($q->id,'buku')?'<div style="text-align: center;"><a href="'.url($q->file->getFileName($q->id,'buku')->extension==='pdf'?$q->file->getFileName($q->id,'buku')->url_stream : $q->file->getFileName($q->id,'buku')->url_download).'?t='.time().'" target="_blank" class="text-info"><i class="fa fa-search text-info"></i></a></div>':null;
                    return $file ?? NULL;
                })
                ->addColumn('gambar', function($q){
                    $file = $q->file && $q->file->getFileName($q->id,'gambar')?'<div style="text-align: center;"><img src="'.url($q->file->getFileName($q->id,'gambar')->url_stream).'?t='.time().'" width="80px"></div>':null;
                    return $file ?? NULL;
                })
                ->addColumn('action', '<div style="text-align: center;">
               <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" '.$this->kode.'-id="{{ $id }}" href="#edit-{{ $id }}">
                   <i class="fa fa-edit text-warning"></i>
               </a>&nbsp; &nbsp;
               <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" href="#hapus-{{ $id }}" '.$this->kode.'-id="{{ $id }}">
                   <i class="fa fa-trash text-danger"></i>
               </a>
           </div>')->rawColumns(['file','gambar','action'])->make(TRUE);
        // }
        // else {
        //     exit("Not an AJAX request -_-");
        // }
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
                'nama'             => 'required|'.config('master.regex.json'),
                'file'        => 'required|mimes:pdf',
                'gambar'        => 'required|mimes:jpg,png,jpeg'
                ]);
            if ($validator->fails()) {
                $respon=['status'=>false, 'pesan'=>$validator->messages()];
            }
            else {
                $request->request->add(['status'=>config('master.status_dokumen.evaluasi')]);
                $data = $this->model::create($request->all());
                if ($request->hasFile('file')) {
                    $data->file()->create([
                        'name'                  => 'buku',
                        'data'                      =>  [
                            'disk'      => config('filesystems.default'),
                            'target'    => Storage::putFile($this->kode.'/buku/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('file')),
                        ]
                    ]);
                }
                if ($request->hasFile('gambar')) {
                    $data->file()->create([
                        'name'                  => 'gambar',
                        'data'                      =>  [
                            'disk'      => config('filesystems.default'),
                            'target'    => Storage::putFile($this->kode.'/buku/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('gambar')),
                        ]
                    ]);
                }
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
                'nama'             => 'required|'.config('master.regex.json'),
                'file'             => $request->hasFile('file') ? 'required|mimes:pdf' : '',
                'gambar'           => $request->hasFile('gambar') ? 'required|mimes:jpg,png,jpeg' : ''
            ]);
            if ($validator->fails()) {
                $response=['status'=>FALSE, 'pesan'=>$validator->messages()];
            }
            else {
                if($data = $this->model::find($id)){
                    $data->update($request->all());
                    if ($request->hasFile('file')) {
                        $data->file()->updateOrCreate(['name'=>'buku'],[
                            'name'                  => 'buku',
                            'data'                      =>  [
                                'disk'      => config('filesystems.default'),
                                'target'    => Storage::putFile($this->kode.'/buku/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('file')),
                            ]
                        ]);
                    }
                    if ($request->hasFile('gambar')) {
                        $data->file()->updateOrCreate(['name'=>'gambar'],[
                            'name'                  => 'gambar',
                            'data'                      =>  [
                                'disk'      => config('filesystems.default'),
                                'target'    => Storage::putFile($this->kode.'/buku/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('gambar')),
                            ]
                        ]);
                    }
                }
                $respon=['status'=>true, 'pesan'=>'Data berhasil diubah'];
            }
            return $response ?? ['status'=>TRUE, 'pesan'=>['msg'=>'Data berhasil diubah']];
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
