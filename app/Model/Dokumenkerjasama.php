<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumenkerjasama extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts=[
        'id'=>'string',
    ];
    protected $fillable=[
        'id', 'nama', 'status', 'mitrakerjasama_id'
    ];

    public function mitrakerjasama()
	{
        return $this->belongsTo('App\Model\Mitrakerjasama');
	}
    
    public function file()
    {
        return $this->morphOne(File::class, 'morph');
    }
}
