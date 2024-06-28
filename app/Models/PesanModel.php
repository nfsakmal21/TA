<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PesanModel extends Model
{
    use HasFactory;

    protected $table = 'pesan';

    static public function getRecord($id){
        $return = PesanModel::select('pesan.*')->where('pesan.dosen_id' ,'=', $id);;
        $return = $return->orderBy('pesan.id', 'desc') -> paginate(10);
        return $return;
    }

    static public function getSingle($id){
        return self::find($id);
    }
    
}
