<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class LombaModel extends Model
{
    use HasFactory;

    protected $table = 'lomba';

    static public function getRecord(){
        $return = LombaModel::select('lomba.*');
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('nama_lomba'))){
                        $return = $return->where('nama_lomba', 'like', '%'.Request::get('nama_lomba').'%');
                    }
                    if(!empty(Request::get('penyelenggara'))){
                        $return = $return->where('penyelenggara', 'like', '%'.Request::get('penyelenggara').'%');
                    }
                    if(!empty(Request::get('tingkat'))){
                        $return = $return->where('tingkat', 'like', '%'.Request::get('tingkat').'%');
                    }
                    if(!empty(Request::get('capaian'))){
                        $return = $return->where('capaian', 'like', '%'.Request::get('capaian').'%');
                    }
                    if(!empty(Request::get('tahun'))){
                        $return = $return->where('tahun', 'like', '%'.Request::get('tahun').'%');
                    }
                    if(!empty(Request::get('dosen'))){
                        $return = $return->where('dosen', 'like', '%'.Request::get('dosen').'%');
                    }
        $return = $return->orderBy('lomba.id', 'desc') -> paginate(7);
        return $return;
    }

    static public function getRecords($nim){
        $return = LombaModel::select('lomba.*')->where('nim',$nim);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('nama_lomba'))){
                        $return = $return->where('nama_lomba', 'like', '%'.Request::get('nama_lomba').'%');
                    }
                    if(!empty(Request::get('penyelenggara'))){
                        $return = $return->where('penyelenggara', 'like', '%'.Request::get('penyelenggara').'%');
                    }
                    if(!empty(Request::get('tingkat'))){
                        $return = $return->where('tingkat', 'like', '%'.Request::get('tingkat').'%');
                    }
                    if(!empty(Request::get('capaian'))){
                        $return = $return->where('capaian', 'like', '%'.Request::get('capaian').'%');
                    }
                    if(!empty(Request::get('tahun'))){
                        $return = $return->where('tahun', 'like', '%'.Request::get('tahun').'%');
                    }
                    if(!empty(Request::get('dosen'))){
                        $return = $return->where('dosen', 'like', '%'.Request::get('dosen').'%');
                    }
        $return = $return->orderBy('lomba.id', 'desc') -> paginate(7);
        return $return;
    }

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getLomba(){
        $return = LombaModel::select('lomba.*')
                        ->orderBy('lomba.name', 'desc')
                        ->get();
        return $return;
    }

    public function getSertifikat(){
        if(!empty($this->sertifikat) && file_exists('upload/sertifikat_prestasi/'. $this->sertifikat)){
            return url('upload/sertifikat_prestasi/'.$this->sertifikat);
        }
        else{
            return "";
        }
    }

    static public function getTotalLomba(){
        return self::select('lomba.id')
                        ->count();
    }
    static public function lombadosen($id)
{
    $return = LombaModel::join('users', 'users.nim', '=', 'lomba.nim') // Anda mungkin perlu mengganti 'users.name' dengan 'users.id' jika 'lomba' adalah ID pengguna
                ->select('lomba.*')
                ->where('users.user_type', '=', 3);

     if(!empty(Request::get('name'))){
                        $return = $return->where('lomba.name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('lomba.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('nama_lomba'))){
                        $return = $return->where('lomba.nama_lomba', 'like', '%'.Request::get('nama_lomba').'%');
                    }
                    if(!empty(Request::get('penyelenggara'))){
                        $return = $return->where('lomba.penyelenggara', 'like', '%'.Request::get('penyelenggara').'%');
                    }
                    if(!empty(Request::get('tingkat'))){
                        $return = $return->where('lomba.tingkat', 'like', '%'.Request::get('tingkat').'%');
                    }
                    if(!empty(Request::get('capaian'))){
                        $return = $return->where('lomba.capaian', 'like', '%'.Request::get('capaian').'%');
                    }
                    if(!empty(Request::get('tahun'))){
                        $return = $return->where('lomba.tahun', 'like', '%'.Request::get('tahun').'%');
                    }
                    if(!empty(Request::get('dosen'))){
                        $return = $return->where('lomba.dosen', 'like', '%'.Request::get('dosen').'%');
                    }
        $return = $return->orderBy('lomba.id', 'desc') -> paginate(7);

    return $return;
}
}
