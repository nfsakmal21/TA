<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\TaModel;

class TaDosenController extends Controller
{
    public function list(){
        $data['getRecord'] = TaModel::getRecord(); 
        $data['header_title'] = "Data TA";
        return view('dosen.ta.list', $data);
    }

    public function create(){
        $data['header_title'] = "Tambah Data TA";
        return view('dosen.ta.create', $data);
    }

    public function tambah(Request $request){
        request()->validate([
            'nim' => 'required|unique:ta'
        ]);

        $ta = new TaModel;
        $ta->name = $request->name;
        $ta->nim = $request->nim;
        $ta->judul = $request->judul;
        $ta->status = $request->status;
        $ta->save();

        return redirect('dosen/ta/list')->with('sukses', "Data TA berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = TaModel::getSingle ($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Data TA";
            return view('dosen.ta.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        request()->validate([
            'nim' => 'required|unique:ta,nim,'.$id,
        ]);

        $ta = TaModel::getSingle($id);
        $ta->name = $request->name;
        $ta->nim = $request->nim;
        $ta->judul = $request->judul;
        $ta->status = $request->status;
        $ta->save();

        return redirect('dosen/ta/list')->with('sukses', "Data TA berhasil diupdate");
    }

    public function delete($id){
        $ta = TaModel::getSingle($id);
        if($ta){
                $ta->delete();
            
            return redirect('dosen/ta/list') -> with('sukses', 'Data TA berhasil dihapus');
        }
        else{
            return redirect('dosen/ta/list') -> with('error', 'Data KKN tidak ditemukan');
        }
    }
}
