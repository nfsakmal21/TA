<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\LombaModel;
use Str;

class LombaController extends Controller
{
    public function list(){
        $data['getRecord'] = LombaModel::getRecord(); 
        $data['header_title'] = "Data Lomba";
        return view('admin.prestasi.list', $data);
    }

    public function exportToCSV()
    {
        $data = LombaModel::getcsvlomba(); 

        $fileName = 'data.csv';
        $filePath = ('upload/' . $fileName);

        $file = fopen($filePath, 'w');

        fputcsv($file, array('id', 'Name', 'NIM', 'Nama Lomba','Penyelenggara Lomba','Tingkatan Lomba','Capaian Prestasi','Tahun Lomba','Dosen')); 

        foreach ($data as $row) {
            fputcsv($file, array($row->id, $row->name, $row->nim,$row->nama_lomba, $row->penyelenggara, $row->tingkat,$row->capaian,$row->tahun,$row->dosen)); 
        }
        fclose($file);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function create(){
        $data['header_title'] = "Tambah Data Prestasi";
        return view('admin.prestasi.create', $data);
    }

    public function tambah(Request $request){
        request()->validate([
            'sertifikat' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);
       
        $lomba = new LombaModel;
        $lomba->name = $request->name;
        $lomba->nim = $request->nim;
        $lomba->nama_lomba = $request->nama_lomba;
        $lomba->penyelenggara = $request->penyelenggara;
        $lomba->tingkat = $request->tingkat;
        $lomba->capaian = $request->capaian;
        $lomba->tahun = $request->tahun;
        $lomba->dosen = $request->dosen;
        if(!empty($request->file('sertifikat'))){
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_prestasi/', $filename);
            $lomba->sertifikat = $filename;
        }
        $lomba->save();

        return redirect('admin/prestasi/list')->with('sukses', "Data Prestasi berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = LombaModel::getSingle ($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Data Prestasi";
            return view('admin.prestasi.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        request()->validate([
            'sertifikat' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);
        $lomba = LombaModel::getSingle($id);
        $lomba->name = $request->name;
        $lomba->nim = $request->nim;
        $lomba->nama_lomba = $request->nama_lomba;
        $lomba->penyelenggara = $request->penyelenggara;
        $lomba->tingkat = $request->tingkat;
        $lomba->capaian = $request->capaian;
        $lomba->tahun = $request->tahun;
        $lomba->dosen = $request->dosen;
        if(!empty($request->file('sertifikat'))){
            if(!empty($lomba->getSertifikat())){
                unlink('upload/sertifikat_prestasi/'. $lomba->sertifikat);
            }
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_prestasi/', $filename);
            $lomba->sertifikat = $filename;
        }
        $lomba->save();

        return redirect('admin/prestasi/list')->with('sukses', "Data Prestasi berhasil diupdate");
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
            
            return redirect('admin/prestasi/list') -> with('sukses', 'Data Prestasi berhasil dihapus');
        }
        else{
            return redirect('admin/prestasi/list') -> with('error', 'Data Prestasi tidak ditemukan');
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
