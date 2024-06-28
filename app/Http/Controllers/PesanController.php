<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesanModel;
use App\Models\PerwalianModel;
use Illuminate\Support\Facades\Storage;

use Hash;
use Auth;
use Str;

class PesanController extends Controller
{
    public function list(){
        $test = Auth::user()->id;
        $data['getRecord'] = PesanModel::getRecord($test);
        $data['header_title'] = "Daftar Pesan";
        return view('dosen.pesan.list', $data);
    }

    public function create(){
        $data['header_title'] = "Tambah Pesan";
        return view('dosen.pesan.create', $data);
    }

    public function tambah(Request $request){
        $pesan = new PesanModel;
        $test = Auth::user()->id ;
        $pesan->dosen_id = $test;
        $pesan->pesan = trim($request->pesan);
        $pesan->save();


        return redirect('dosen/pesan/list')->with('sukses', "Pesan berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = PesanModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['getPerwalian'] = PerwalianModel::getPerwalian();
            $data['header_title'] = "Edit Pesan";
            return view('dosen.pesan.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        $pesan =  PesanModel::getSingle($id);
        $test = Auth::user()->id ;
        $pesan->dosen_id = $test;
        $pesan->pesan = trim($request->pesan);
        $pesan->save();


        return redirect('dosen/pesan/list')->with('sukses', "Pesan berhasil diupdate");
    }

    public function delete($id){
        $mahasiswa = PesanModel::getSingle($id);
        if($mahasiswa){
                $mahasiswa->delete();
            
            return redirect('dosen/pesan/list') -> with('sukses', 'Pesan berhasil dihapus');
        }
        else{
            return redirect('dosen/pesan/list') -> with('error', 'Pesan tidak ditemukan');
        }
    }
}
