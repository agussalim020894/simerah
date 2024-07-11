<?php
namespace App\Exports;

use App\Model\Elemenkerjasama;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PencarianExport implements FromView
{
    protected $id;

    function __construct($id) {
            $this->id = $id;
    }
    public function view(): View
    {
        $qr = Elemenkerjasama::find($this->id);
        if($qr->mitrakerjasama_id==null){
            $elemenkerjasama=$qr;
        }else{
            $elemenkerjasama = Elemenkerjasama::whereId($qr->mitrakerjasama_id)->first();
        }

        $data = [
            'data'=> $elemenkerjasama,
            'tahuns' => array(date("Y"),date("Y")+1,date("Y")+2,date("Y")+3,date("Y")+4,date("Y")+5),
            'elemen' => new Elemenkerjasama
        ];
        return view('backend.laporankerjasama.export', $data);
    }
}