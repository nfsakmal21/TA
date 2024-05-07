<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PkmModel extends Model
{
    use HasFactory;

    protected $table = 'pkm';

    static public function getRecord(){
        $return = PkmModel::select('pkm.*');
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('program'))){
                        $return = $return->where('program', 'like', '%'.Request::get('program').'%');
                    }
                    if(!empty(Request::get('tahun'))){
                        $return = $return->where('tahun', 'like', '%'.Request::get('tahun').'%');
                    }
        $return = $return->orderBy('pkm.id', 'desc') -> paginate(10);
        return $return;
    }
    static public function getRecords($nim){
        $return = PkmModel::select('pkm.*')->where('nim',$nim);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('program'))){
                        $return = $return->where('program', 'like', '%'.Request::get('program').'%');
                    }
                    if(!empty(Request::get('tahun'))){
                        $return = $return->where('tahun', 'like', '%'.Request::get('tahun').'%');
                    }
        $return = $return->orderBy('pkm.id', 'desc') -> paginate(10);
        return $return;
    }

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getPkm(){
        $return = MbkmModel::select('pkm.*')
                        ->orderBy('pkm.name', 'desc')
                        ->get();
        return $return;
    }

    public function getSertifikat(){
        if(!empty($this->sertifikat) && file_exists('upload/sertifikat_pkm/'. $this->sertifikat)){
            return url('upload/sertifikat_pkm/'.$this->sertifikat);
        }
        else{
            return "";
        }
    }

    static public function getTotalPkm(){
        return self::select('pkm.id')
                        ->count();
    }
}
