<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\KpModel;
use Str;

class KpMahasiswaController extends Controller
{
    public function list(){
        $test = Auth::user()->nim;
        $data['getRecord'] = KpModel::getRecords($test); 
        $data['header_title'] = "Data Kkn";
        return view('mahasiswa.kp.list', $data);
    }

    public function create(){
        $data['header_title'] = "Tambah Data KP";
        return view('mahasiswa.kp.create', $data);
    }

    public function tambah(Request $request){
        request()->validate([
            'nim' => 'required|unique:kp'
        ]);

        $kp = new KpModel;
        $kp->name = $request->name;
        $kp->nim = $request->nim;
        $kp->lokasi = $request->lokasi;
        $kp->tahun = $request->tahun;
        $kp->semester = $request->semester;
        $kp->status = $request->status;
        if(!empty($request->file('sertifikat'))){
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_kp/', $filename);
            $kp->sertifikat = $filename;
        }
        $kp->save();

        return redirect('mahasiswa/kp/list')->with('sukses', "Data KP berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = KpModel::getSingle ($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Data KP";
            return view('mahasiswa.kp.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        request()->validate([
            'nim' => 'required|unique:kp,nim,'.$id,
        ]);

        $kp = KpModel::getSingle($id);
        $kp->name = $request->name;
        $kp->nim = $request->nim;
        $kp->lokasi = $request->lokasi;
        $kp->tahun = $request->tahun;
        $kp->semester = $request->semester;
        $kp->status = $request->status;
        if(!empty($request->file('sertifikat'))){
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_kp/', $filename);
            $kp->sertifikat = $filename;
        }
        $kp->save();

        return redirect('mahasiswa/kp/list')->with('sukses', "Data Kp berhasil diupdate");
    }

    public function delete($id){
        $kp = KpModel::getSingle($id);
        if($kp){
            if(!empty($kp->getSertifikat())){
                unlink('upload/sertifikat_kp/'. $kp->sertifikat);
                $kp->delete();
            }
            else{
                $kp->delete();
            }
            
            return redirect('mahasiswa/kp/list') -> with('sukses', 'Data KP berhasil dihapus');
        }
        else{
            return redirect('mahasiswa/kp/list') -> with('error', 'Data KP tidak ditemukan');
        }
    }

    public function download($id){
        $kp = KpModel::getSingle($id);
        if (!empty($kp->getSertifikat())){
            return response()->download('upload/sertifikat_kp/'. $kp->sertifikat);
        }
        else{
            return response()->json(['message' => 'File not found.'], 404);
        }

    }
}
