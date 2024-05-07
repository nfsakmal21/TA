<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\KknModel;

class KknMahasiswaController extends Controller
{
    public function list(){
        $test = Auth::user()->nim;
        $data['getRecord'] = KknModel::getRecords($test); 
        $data['header_title'] = "Data Kkn";
        return view('mahasiswa.kkn.list', $data);
    }

    public function create(){
        $data['header_title'] = "Tambah Data KKN";
        return view('mahasiswa.kkn.create', $data);
    }

    public function tambah(Request $request){
        request()->validate([
            'nim' => 'required|unique:kkn'
        ]);

        $kkn = new KknModel;
        $kkn->name = $request->name;
        $kkn->nim = $request->nim;
        $kkn->lokasi = $request->lokasi;
        $kkn->tahun = $request->tahun;
        $kkn->semester = $request->semester;
        $kkn->status = $request->status;
        $kkn->save();

        return redirect('mahasiswa/kkn/list')->with('sukses', "Data KKN berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = KknModel::getSingle ($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Data KKN";
            return view('mahasiswa.kkn.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        request()->validate([
            'nim' => 'required|unique:kkn,nim,'.$id,
        ]);

        $kkn = KknModel::getSingle($id);
        $kkn->name = $request->name;
        $kkn->nim = $request->nim;
        $kkn->lokasi = $request->lokasi;
        $kkn->tahun = $request->tahun;
        $kkn->semester = $request->semester;
        $kkn->status = $request->status;
        $kkn->save();

        return redirect('mahasiswa/kkn/list')->with('sukses', "Data KKN berhasil diupdate");
    }

    public function delete($id){
        $kkn = KknModel::getSingle($id);
        if($kkn){
                $kkn->delete();
            
            return redirect('mahasiswa/kkn/list') -> with('sukses', 'Data KKN berhasil dihapus');
        }
        else{
            return redirect('mahasiswa/kkn/list') -> with('error', 'Data KKN tidak ditemukan');
        }
    }
}
