<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mitrakerjasama extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts=[
        'id'=>'string',
    ];
    protected $fillable=[
        'id', 'nama', 'singkatan','tingkatan','alamat'
    ];
    public function file()
    {
        return $this->morphOne(File::class, 'morph');
    }
    public function elemenkerjasama()
    {
        return $this->hasMany('App\Model\Elemenkerjasama');
    }
    public function user()
    {
        return $this->hasMany('App\Model\User');
    }
    public function dokumenkerjasama()
    {
        return $this->hasMany('App\Model\Dokumenkerjasama');
    }
}