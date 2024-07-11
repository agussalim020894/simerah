<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Elemenkerjasama extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts=[
        'id'=>'string',
    ];
    protected $fillable=[
        'id','nama','satuan','noperjanjian','jangkawaktu','urusan','keterangan','manfaat','status','parent_id','mitrakerjasama_id','wilayahkerjasama_id'
    ];

    public function data()
    {
        return $this->hasMany(Data::class);
    }

    public function parent()
    {
        return $this->belongsTo('App\Model\Elemenkerjasama','parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Model\Elemenkerjasama','parent_id','id');
    }

    public function mitrakerjasama()
	{
        return $this->belongsTo('App\Model\Mitrakerjasama');
	}

    public function wilayahkerjasama()
	{
        return $this->belongsTo('App\Model\Wilayahkerjasama');
	}

    public function file()
    {
        return $this->morphOne(File::class, 'morph');
    }

    public function getParentNama($nama,$id)
    {
        $qr = $this->find($id);
        $namanew = '<a href="'.url('elemenkerjasama/'.$qr->id).'" class="text-dark">'.\Help::shortDescription($qr->nama,3).'</a>'.' / '.$nama;
        // dd($qr->parent->id);
        if($qr->parent){
            return $this->getParentNama($namanew,$qr->parent->id);
        }
        return $namanew;
    }
    public function getParentNamaFront($nama,$id)
    {
        $qr = $this->find($id);
        $namanew = '<a href="'.url('caridetail/'.$qr->id.'#cari').'" class="text-dark">'.$qr->nama.'</a>'.' <br> '.$nama;
        // dd($qr->parent->id);
        if($qr->parent){
            return $this->getParentNamaFront($namanew,$qr->parent->id);
        }
        return $namanew;
    }
    public function getFileName($id,$name){
        return $this->where('morph_id',$id)->where('name', $name)->first();
    }
}