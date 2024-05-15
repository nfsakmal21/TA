<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class KpModel extends Model
{
    use HasFactory;
    protected $table = 'kp';

    static public function getRecord(){
        $return = KpModel::select('kp.*');
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('tahun'))){
                        $return = $return->where('tahun', 'like', '%'.Request::get('tahun').'%');
                    }
                    if(!empty(Request::get('semester'))){
                        $return = $return->where('semester', 'like', '%'.Request::get('semester').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('status', 'like', '%'.Request::get('status').'%');
                    }
        $return = $return->orderBy('kp.id', 'desc') -> paginate(7);
        return $return;
    }

    static public function getRecords($nim){
        $return = KpModel::select('kp.*')->where('nim',$nim);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('tahun'))){
                        $return = $return->where('tahun', 'like', '%'.Request::get('tahun').'%');
                    }
                    if(!empty(Request::get('semester'))){
                        $return = $return->where('semester', 'like', '%'.Request::get('semester').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('status', 'like', '%'.Request::get('status').'%');
                    }
        $return = $return->orderBy('kp.id', 'desc') -> paginate(7);
        return $return;
    }

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getKp(){
        $return = KknModel::select('kp.*')
                        ->orderBy('kp.name', 'desc')
                        ->get();
        return $return;
    }

   
    static public function kpadmin()
    {
        $return = KpModel::join('users', 'users.id', '=', 'kp.dosen')
                    ->select('kp.*', 'users.name as perwalian_name');
                    if(!empty(Request::get('name'))){
                        $return = $return->where('kp.name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('kp.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('tahun'))){
                        $return = $return->where('kp.tahun', 'like', '%'.Request::get('tahun').'%');
                    }
                    if(!empty(Request::get('semester'))){
                        $return = $return->where('kp.semester', 'like', '%'.Request::get('semester').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('kp.status', 'like', '%'.Request::get('status').'%');
                    }
                    if(!empty(Request::get('dosen'))){
                        $return = $return->where('users.name', 'like', '%'.Request::get('dosen').'%');
                    }
                    $return = $return->orderBy('kp.id', 'desc') // Menggunakan 'perwalian.id' untuk mengurutkan hasil
                    ->paginate(10);
                

        return $return;
    }

     public function getSertifikat(){
        if(!empty($this->sertifikat) && file_exists('upload/sertifikat_kp/'. $this->sertifikat)){
            return url('upload/sertifikat_kp/'.$this->sertifikat);
        }
        else{
            return "";
        }
    }


    static public function getTotalKp(){
        return self::select('kp.id')
                        ->count();
    }
            static public function kpdosen($id)
{
    $return = KpModel::join('users', 'users.id', '=', 'kp.dosen')
                    ->select('kp.*', 'users.name as perwalian_name')
                    ->where('kp.dosen' ,'=', $id);
    if(!empty(Request::get('name'))){
                        $return = $return->where('kp.name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('kp.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('tahun'))){
                        $return = $return->where('kp.tahun', 'like', '%'.Request::get('tahun').'%');
                    }
                    if(!empty(Request::get('semester'))){
                        $return = $return->where('kp.semester', 'like', '%'.Request::get('semester').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('kp.status', 'like', '%'.Request::get('status').'%');
                    }
        $return = $return->orderBy('kp.id', 'desc') -> paginate(7);
    return $return;
}
}
