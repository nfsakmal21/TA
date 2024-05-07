<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\KknModel;

class KknController extends Controller
{
    public function list(){
        $data['getRecord'] = KknModel::getRecord(); 
        $data['header_title'] = "Data Kkn";
        return view('admin.kkn.list', $data);
    }

    public function create(){
        $data['header_title'] = "Tambah Data KKN";
        return view('admin.kkn.create', $data);
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

        return redirect('admin/kkn/list')->with('sukses', "Data KKN berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = KknModel::getSingle ($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Data KKN";
            return view('admin.kkn.edit', $data);
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

        return redirect('admin/kkn/list')->with('sukses', "Data KKN berhasil diupdate");
    }

    public function delete($id){
        $kkn = KknModel::getSingle($id);
        if($kkn){
                $kkn->delete();
            
            return redirect('admin/kkn/list') -> with('sukses', 'Data KKN berhasil dihapus');
        }
        else{
            return redirect('admin/kkn/list') -> with('error', 'Data KKN tidak ditemukan');
        }
    }
}
