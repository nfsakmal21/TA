<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class MbkmModel extends Model
{
    use HasFactory;

    protected $table = 'mbkm';

    static public function getRecord(){
        $return = MbkmModel::select('mbkm.*');
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
                    if(!empty(Request::get('dosen'))){
                        $return = $return->where('dosen', 'like', '%'.Request::get('dosen').'%');
                    }
        $return = $return->orderBy('mbkm.id', 'desc') -> paginate(7);
        return $return;
    }
    static public function getRecords($nim){
        $return = MbkmModel::select('mbkm.*')->where('nim',$nim);
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
                    if(!empty(Request::get('dosen'))){
                        $return = $return->where('dosen', 'like', '%'.Request::get('dosen').'%');
                    }
        $return = $return->orderBy('mbkm.id', 'desc') -> paginate(7);
        return $return;
    }

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getMbkm(){
        $return = MbkmModel::select('mbkm.*')
                        ->orderBy('mbkm.name', 'desc')
                        ->get();
        return $return;
    }

    public function getSertifikat(){
        if(!empty($this->sertifikat) && file_exists('upload/sertifikat_mbkm/'. $this->sertifikat)){
            return url('upload/sertifikat_mbkm/'.$this->sertifikat);
        }
        else{
            return "";
        }
    }

    static public function getTotalMbkm(){
        return self::select('mbkm.id')
                        ->count();
    }
    static public function mbkmdosen($id)
{
    $return = MbkmModel::join('users', 'users.nim', '=', 'mbkm.nim') // Anda mungkin perlu mengganti 'users.name' dengan 'users.id' jika 'mbkm' adalah ID pengguna
                ->select('mbkm.*')
                ->where('users.user_type', '=', 3)
                ->where('users.perwalian', '=', $id);

                if(!empty(Request::get('name'))){
                        $return = $return->where('mbkm.name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('mbkm.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('program'))){
                        $return = $return->where('mbkm.program', 'like', '%'.Request::get('program').'%');
                    }
                    if(!empty(Request::get('tahun'))){
                        $return = $return->where('mbkm.tahun', 'like', '%'.Request::get('tahun').'%');
                    }
                    if(!empty(Request::get('dosen'))){
                        $return = $return->where('mbkm.dosen', 'like', '%'.Request::get('dosen').'%');
                    }
        $return = $return->orderBy('mbkm.id', 'desc') -> paginate(7);

    return $return;
}
}
