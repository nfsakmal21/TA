<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class KknModel extends Model
{
    use HasFactory;

    protected $table = 'kkn';

    static public function getRecord(){
        $return = KknModel::select('kkn.*');
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
        $return = $return->orderBy('kkn.id', 'desc') -> paginate(10);
        return $return;
    }

    static public function getRecords($nim){
        $return = KknModel::select('kkn.*')->where('nim',$nim);
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
        $return = $return->orderBy('kkn.id', 'desc') -> paginate(10);
        return $return;
    }

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getKkn(){
        $return = KknModel::select('kkn.*')
                        ->orderBy('kkn.name', 'desc')
                        ->get();
        return $return;
    }

    static public function getTotalKkn(){
        return self::select('kkn.id')
                        ->count();
    }
}

