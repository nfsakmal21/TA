<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\LombaModel;
use Str;

class LombaMahasiswaController extends Controller
{
    public function list(){
        $test = Auth::user()->nim;
        $data['getRecord'] = LombaModel::getRecords($test); 
        $data['header_title'] = "Data Lomba";
        return view('mahasiswa.prestasi.list', $data);
    }

    public function create(){
        $data['header_title'] = "Tambah Data Prestasi";
        return view('mahasiswa.prestasi.create', $data);
    }

    public function tambah(Request $request){
       
        $lomba = new LombaModel;
        $lomba->name = $request->name;
        $lomba->nim = $request->nim;
        $lomba->nama_lomba = $request->nama_lomba;
        $lomba->penyelenggara = $request->penyelenggara;
        $lomba->tingkat = $request->tingkat;
        $lomba->capaian = $request->capaian;
        $lomba->tahun = $request->tahun;
        if(!empty($request->file('sertifikat'))){
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_prestasi/', $filename);
            $lomba->sertifikat = $filename;
        }
        $lomba->save();

        return redirect('mahasiswa/prestasi/list')->with('sukses', "Data Prestasi berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = LombaModel::getSingle ($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Data Prestasi";
            return view('mahasiswa.prestasi.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        $lomba = LombaModel::getSingle($id);
        $lomba->name = $request->name;
        $lomba->nim = $request->nim;
        $lomba->nama_lomba = $request->nama_lomba;
        $lomba->penyelenggara = $request->penyelenggara;
        $lomba->tingkat = $request->tingkat;
        $lomba->capaian = $request->capaian;
        $lomba->tahun = $request->tahun;
        if(!empty($request->file('sertifikat'))){
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_prestasi/', $filename);
            $lomba->sertifikat = $filename;
        }
        $lomba->save();

        return redirect('mahasiswa/prestasi/list')->with('sukses', "Data Prestasi berhasil diupdate");
    }

    public function delete($id){
        $lomba = LombaModel::getSingle($id);
        if($lomba){
            if(!empty($lomba->getSertifikat())){
                unlink('upload/sertifikat_prestasi/'. $lomba->sertifikat);
                $lomba->delete();
            }
            else{
                $lomba->delete();
            }
            
            return redirect('mahasiswan/prestasi/list') -> with('sukses', 'Data Prestasi berhasil dihapus');
        }
        else{
            return redirect('mahasiswa/prestasi/list') -> with('error', 'Data Prestasi tidak ditemukan');
        }
    }

    public function download($id){
        $lomba = LombaModel::getSingle($id);
        if (!empty($lomba->getSertifikat())){
            return response()->download('upload/sertifikat_prestasi/'. $lomba->sertifikat);
        }
        else{
            return response()->json(['message' => 'File not found.'], 404);
        }

    }
}