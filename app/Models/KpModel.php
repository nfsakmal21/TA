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
}
