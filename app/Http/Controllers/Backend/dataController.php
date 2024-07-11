<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Model\Wilayahkerjasama;
use App\Model\Elemenkerjasama;
use App\Model\File;

class dataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $elemenkerjasama=Elemenkerjasama::find($id);
        $data=[
            'id'=>$id,
            'elemenkerjasama'=>$elemenkerjasama
        ];
        return view('backend.'.$this->kode.'.index',$data);
    }

    public function data(Request $request, $id=NULL)
    {
        if ($request->ajax()) {
            $data= $this->model::whereElemenkerjasamaId($id)->latest()->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('file', function($q){
                    $file = $q->file && $q->file->getFileName($q->id,'fileinstansi')?'<div style="text-align: center;"><a href="'.url($q->file->getFileName($q->id,'fileinstansi')->extension==='pdf'?$q->file->getFileName($q->id,'fileinstansi')->url_stream : $q->file->getFileName($q->id,'fileinstansi')->url_download).'?t='.time().'" target="_blank" class="text-info"><i class="fa fa-file-pdf-o text-info"></i></a></div>':null;
                    return $file ?? NULL;
                })
                ->addColumn('action', '<div style="text-align: center;">
               <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" '.$this->kode.'-id="{{ $id }}" href="#edit-{{ $id }}">
                   <i class="fa fa-edit text-warning"></i>
               </a>&nbsp; &nbsp;
               <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" href="#hapus-{{ $id }}" '.$this->kode.'-id="{{ $id }}">
                   <i class="fa fa-trash text-danger"></i>
               </a>
           </div>')->rawColumns(['file','action'])->make(TRUE);
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
    public function create($id)
    {
        return view('backend.'.$this->kode.'.tambah',['id'=>$id]);
    }

    public function kelengkapan($id)
    {
        $data=[
            'data'    => Elemenkerjasama::find($id),
            'wilayahkerjasama' => Wilayahkerjasama::pluck('nama', 'id')
        ];
        return view('backend.'.$this->kode.'.kelengkapan', $data);
    }

    public function store_kelengkapan(Request $request)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
                'satuan'                => 'required',
                'wilayahkerjasama_id'   => 'required'
                ]);
            if ($validator->fails()) {
                $respon=['status'=>false, 'pesan'=>$validator->messages()];
            }
            else {
                Elemenkerjasama::whereId($request->id)->first()->update($request->all());
                $respon=['status'=>true, 'pesan'=>'Data berhasil disimpan'];
            }
            return $respon;
        }
        else {
            exit('Ops, an Ajax request');
        }
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
                    'file'        => 'required|mimes:pdf',
                    'tahun'       => 'required|'.config('master.regex.json')
                    ]);
                if ($validator->fails()) {
                    $respon=['status'=>false, 'pesan'=>$validator->messages()];
                }
                else {
                    $request->request->add(['status'=>config('master.status_dokumen.fileinstansi')]);
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
                    //$this->model::create($request->all());
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
                'file'             => $request->hasFile('file') ? 'required|mimes:pdf' : '',
                'tahun'            => 'required|'.config('master.regex.json'),
            ]);
            if ($validator->fails()) {
                $response=['status'=>FALSE, 'pesan'=>$validator->messages()];
            }
            else {
                if($data = $this->model::find($id)){
                    $data->update($request->all());
                    if ($request->hasFile('file')) {
                        $data->file()->updateOrCreate(['name'=>'fileinstansi'],[
                            'name'      => 'fileinstansi',
                            'data'      =>  [
                            'disk'      => config('filesystems.default'),
                            'target'    => Storage::putFile($this->kode.'/fileinstansi/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('file')),
                            ]
                        ]);
                    }
                }
                $this->model::find($id)->update($request->all());
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
