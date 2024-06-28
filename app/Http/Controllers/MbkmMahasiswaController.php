<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\MbkmModel;
use Str;

class MbkmMahasiswaController extends Controller
{
    public function list(){
        $test = Auth::user()->nim;
        $data['getRecord'] = MbkmModel::getRecords($test); 
        $data['header_title'] = "Data MBKM";
        return view('mahasiswa.mbkm.list', $data);
    }

    public function create(){
        $data['header_title'] = "Tambah Data MBKM";
        return view('mahasiswa.mbkm.create', $data);
    }

    public function tambah(Request $request){
       request()->validate([
            'sertifikat' => 'required|image|mimes:jpeg,png|max:2048',
        ]);
        $mbkm = new MbkmModel;
        $mbkm->name = $request->name;
        $mbkm->nim = $request->nim;
        $mbkm->program = $request->program;
        $mbkm->tahun = $request->tahun;
        $mbkm->dosen = $request->dosen;
        if(!empty($request->file('sertifikat'))){
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_mbkm/', $filename);
            $mbkm->sertifikat = $filename;
        }
        $mbkm->save();

        return redirect('mahasiswa/mbkm/list')->with('sukses', "Data MBKM berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = MbkmModel::getSingle ($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Data MBKM";
            return view('mahasiswa.mbkm.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        request()->validate([
            'sertifikat' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);
        $mbkm = MbkmModel::getSingle($id);
        $mbkm->name = $request->name;
        $mbkm->nim = $request->nim;
        $mbkm->program = $request->program;
        $mbkm->tahun = $request->tahun;
        $mbkm->dosen = $request->dosen;
        if(!empty($request->file('sertifikat'))){
            if(!empty($mbkm->getSertifikat())){
                unlink('upload/sertifikat_mbkm/'. $mbkm->sertifikat);
            }
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_mbkm/', $filename);
            $mbkm->sertifikat = $filename;
        }
        $mbkm->save();

        return redirect('mahasiswa/mbkm/list')->with('sukses', "Data MBKM berhasil diupdate");
    }

    public function delete($id){
        $mbkm = MbkmModel::getSingle($id);
        if($mbkm){
            if(!empty($mbkm->getSertifikat())){
                unlink('upload/sertifikat_mbkm/'. $mbkm->sertifikat);
                $mbkm->delete();
            }
            else{
                $mbkm->delete();
            }
            
            return redirect('mahasiswa/mbkm/list') -> with('sukses', 'Data MBKM berhasil dihapus');
        }
        else{
            return redirect('mahasiswa/mbkm/list') -> with('error', 'Data MBKM tidak ditemukan');
        }
    }

    public function download($id){
        $mbkm = MbkmModel::getSingle($id);
        if (!empty($mbkm->getSertifikat())){
            return response()->download('upload/sertifikat_mbkm/'. $mbkm->sertifikat);
        }
        else{
            return response()->json(['message' => 'File not found.'], 404);
        }

    }
}
