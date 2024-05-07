<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\PkmModel;
use Str;

class PkmDosenController extends Controller
{
    public function list(){
        $data['getRecord'] = PkmModel::getRecord(); 
        $data['header_title'] = "Data PKM";
        return view('dosen.pkm.list', $data);
    }

    public function create(){
        $data['header_title'] = "Tambah Data PKM";
        return view('dosen.pkm.create', $data);
    }

    public function tambah(Request $request){
       
        $pkm = new PkmModel;
        $pkm->name = $request->name;
        $pkm->nim = $request->nim;
        $pkm->program = $request->program;
        $pkm->tahun = $request->tahun;
        if(!empty($request->file('sertifikat'))){
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_pkm/', $filename);
            $pkm->sertifikat = $filename;
        }
        $pkm->save();

        return redirect('dosen/pkm/list')->with('sukses', "Data PKM berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = PkmModel::getSingle ($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Data PKM";
            return view('dosen.pkm.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        $pkm = PkmModel::getSingle($id);
        $pkm->name = $request->name;
        $pkm->nim = $request->nim;
        $pkm->program = $request->program;
        $pkm->tahun = $request->tahun;
        if(!empty($request->file('sertifikat'))){
            if(!empty($pkm->getSertifikat())){
                unlink('upload/sertifikat_pkm/'. $pkm->sertifikat);
            }
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_pkm/', $filename);
            $pkm->sertifikat = $filename;
        }
        $pkm->save();

        return redirect('dosen/pkm/list')->with('sukses', "Data PKM berhasil ditambah");
    }

    public function delete($id){
        $pkm = PkmModel::getSingle($id);
        if($pkm){
            if(!empty($pkm->getSertifikat())){
                unlink('upload/sertifikat_pkm/'. $pkm->sertifikat);
                $pkm->delete();
            }
            else{
                $pkm->delete();
            }
            
            return redirect('dosen/pkm/list') -> with('sukses', 'Data PKM berhasil dihapus');
        }
        else{
            return redirect('dosen/pkm/list') -> with('error', 'Data PKM tidak ditemukan');
        }
    }

    public function download($id){
        $pkm = PkmModel::getSingle($id);
        if (!empty($pkm->getSertifikat())){
            return response()->download('upload/sertifikat_pkm/'. $pkm->sertifikat);
        }
        else{
            return response()->json(['message' => 'File not found.'], 404);
        }

    }
}