<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class TaModel extends Model
{
    use HasFactory;

    protected $table = 'ta';

    static public function getRecord(){
        $return = TaModel::select('ta.*');
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('judul'))){
                        $return = $return->where('judul', 'like', '%'.Request::get('judul').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('status', 'like', '%'.Request::get('status').'%');
                    }
        $return = $return->orderBy('ta.id', 'desc') -> paginate(10);
        return $return;
    }
    static public function getRecords($nim){
        $return = TaModel::select('ta.*')->where('nim',$nim);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('judul'))){
                        $return = $return->where('judul', 'like', '%'.Request::get('judul').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('status', 'like', '%'.Request::get('status').'%');
                    }
        $return = $return->orderBy('ta.id', 'desc') -> paginate(10);
        return $return;
    }

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getTa(){
        $return = KknModel::select('ta.*')
                        ->orderBy('ta.name', 'desc')
                        ->get();
        return $return;
    }

    static public function getTotalTa(){
        return self::select('ta.id')
                        ->count();
    }
}
