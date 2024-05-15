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
                    if(!empty(Request::get('pem1'))){
                        $return = $return->where('pem1', 'like', '%'.Request::get('pem1').'%');
                    }
                    if(!empty(Request::get('pem2'))){
                        $return = $return->where('pem2', 'like', '%'.Request::get('pem2').'%');
                    }
                    if(!empty(Request::get('peng1'))){
                        $return = $return->where('peng1', 'like', '%'.Request::get('peng1').'%');
                    }
                    if(!empty(Request::get('peng2'))){
                        $return = $return->where('peng2', 'like', '%'.Request::get('peng2').'%');
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
                    if(!empty(Request::get('pem1'))){
                        $return = $return->where('pem1', 'like', '%'.Request::get('pem1').'%');
                    }
                    if(!empty(Request::get('pem2'))){
                        $return = $return->where('pem2', 'like', '%'.Request::get('pem2').'%');
                    }
                    if(!empty(Request::get('peng1'))){
                        $return = $return->where('peng1', 'like', '%'.Request::get('peng1').'%');
                    }
                    if(!empty(Request::get('peng2'))){
                        $return = $return->where('peng2', 'like', '%'.Request::get('peng2').'%');
                    }
        $return = $return->orderBy('ta.id', 'desc') -> paginate(7);
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
            static public function tadosen($name)
{
    $return = TaModel::select('ta.*')
                ->where(function($query) use ($name) {
                    $query->where('ta.pem1', $name)
                          ->orWhere('ta.pem2', $name)
                          ->orWhere('ta.peng1', $name)
                          ->orWhere('ta.peng2', $name);
                });

                    if(!empty(Request::get('name'))){
                        $return = $return->where('ta.name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('ta.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('judul'))){
                        $return = $return->where('ta.judul', 'like', '%'.Request::get('judul').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('ta.status', 'like', '%'.Request::get('status').'%');
                    }
                    if(!empty(Request::get('pem1'))){
                        $return = $return->where('ta.pem1', 'like', '%'.Request::get('pem1').'%');
                    }
                    if(!empty(Request::get('pem2'))){
                        $return = $return->where('ta.pem2', 'like', '%'.Request::get('pem2').'%');
                    }
                    if(!empty(Request::get('peng1'))){
                        $return = $return->where('ta.peng1', 'like', '%'.Request::get('peng1').'%');
                    }
                    if(!empty(Request::get('peng2'))){
                        $return = $return->where('ta.peng2', 'like', '%'.Request::get('peng2').'%');
                    }
        $return = $return->orderBy('ta.id', 'desc') -> paginate(10);

    return $return;
}
}
