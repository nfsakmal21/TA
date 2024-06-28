<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\PkmModel;
use Str;

class PkmController extends Controller
{
    public function list(){
        $data['getRecord'] = PkmModel::getRecord(); 
        $data['header_title'] = "Data PKM";
        return view('admin.pkm.list', $data);
    }

    public function exportToCSV()
    {
        $data = PkmModel::getcsvpkm(); 

        $fileName = 'data.csv';
        $filePath = ('upload/' . $fileName);

        $file = fopen($filePath, 'w');

        fputcsv($file, array('id', 'Name', 'NIM', 'Program','Tahun','Dosen')); 

        foreach ($data as $row) {
           fputcsv($file, array($row->id, $row->name, $row->nim,$row->program, $row->tahun, $row->dosen)); 
        }
        fclose($file);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function create(){
        $data['header_title'] = "Tambah Data PKM";
        return view('admin.pkm.create', $data);
    }

    public function tambah(Request $request){
       request()->validate([
            'sertifikat' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);
        $pkm = new PkmModel;
        $pkm->name = $request->name;
        $pkm->nim = $request->nim;
        $pkm->program = $request->program;
        $pkm->tahun = $request->tahun;
        $pkm->dosen = $request->dosen;
        if(!empty($request->file('sertifikat'))){
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_pkm/', $filename);
            $pkm->sertifikat = $filename;
        }
        $pkm->save();

        return redirect('admin/pkm/list')->with('sukses', "Data PKM berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = PkmModel::getSingle ($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Data PKM";
            return view('admin.pkm.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        request()->validate([
            'sertifikat' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);
        $pkm = PkmModel::getSingle($id);
        $pkm->name = $request->name;
        $pkm->nim = $request->nim;
        $pkm->program = $request->program;
        $pkm->tahun = $request->tahun;
        $pkm->dosen = $request->dosen;
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

        return redirect('admin/pkm/list')->with('sukses', "Data PKM berhasil ditambah");
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
            
            return redirect('admin/pkm/list') -> with('sukses', 'Data PKM berhasil dihapus');
        }
        else{
            return redirect('admin/pkm/list') -> with('error', 'Data PKM tidak ditemukan');
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
