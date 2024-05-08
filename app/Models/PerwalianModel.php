<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PerwalianModel extends Model
{
    use HasFactory;

    protected $table = 'perwalian';

    static public function getRecord(){
        $return = PerwalianModel::select('perwalian.*');
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
        $return = $return->orderBy('perwalian.id', 'desc') -> paginate(7);
        return $return;
    }

    static public function getSingle($id){
        return self::find($id);
    }


    
    static public function getPerwalian(){
        $return = PerwalianModel::select('perwalian.*')
                        ->where('perwalian.status', '=', 0)
                        ->orderBy('perwalian.name', 'asc')
                        ->get();
        return $return;
    }
}
