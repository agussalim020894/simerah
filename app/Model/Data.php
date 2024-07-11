<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts=[
        'id'=>'string',
    ];
    protected $fillable=[
        'id', 'tahun','elemenkerjasama_id'
    ];
    
    public function file()
    {
        return $this->morphOne(File::class, 'morph');
    }

    public function elemenkerjasama()
	{
        return $this->belongsTo('App\Model\Elemenkerjasama');
	}
}