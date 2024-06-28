<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\KpModel;
use Str;

class KpController extends Controller
{
    public function list(){
        $data['getRecord'] = KpModel::kpadmin(); 
        $data['header_title'] = "Data Kkn";
        return view('admin.kp.list', $data);
    }

    public function exportToCSV()
    {
        $data = KpModel::getcsvkpadmin();  

        $fileName = 'data.csv';
        $filePath = ('upload/' . $fileName);

        $file = fopen($filePath, 'w');

        fputcsv($file, array('id', 'Name', 'NIM', 'Nama Perusahaan','Tahun Pelaksanaan','Semester Pelaksanaan','Dosen Pembimbing','Status')); 

        foreach ($data as $row) {
            fputcsv($file, array($row->id, $row->name, $row->nim,$row->lokasi, $row->tahun, $row->semester,$row->perwalian_name,$row->status)); 
        }
        fclose($file);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function create(){
        $data['header_title'] = "Tambah Data KP";
        $data['getRecord'] = User::getDosen(); 
        return view('admin.kp.create', $data);
    }

    public function tambah(Request $request){
        request()->validate([
            'nim' => 'required|unique:kp',
            'sertifikat' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        $kp = new KpModel;
        $kp->name = $request->name;
        $kp->nim = $request->nim;
        $kp->lokasi = $request->lokasi;
        $kp->tahun = $request->tahun;
        $kp->semester = $request->semester;
        $kp->status = $request->status;
        $kp->dosen = $request->dosen;
        if(!empty($request->file('sertifikat'))){
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_kp/', $filename);
            $kp->sertifikat = $filename;
        }
        $kp->save();

        return redirect('admin/kp/list')->with('sukses', "Data KP berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = KpModel::getSingle ($id);
        $data['getRecords'] = User::getDosen(); 
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Data KP";
            return view('admin.kp.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        request()->validate([
            'nim' => 'required|unique:kp,nim,'.$id,
            'sertifikat' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        $kp = KpModel::getSingle($id);
        $kp->name = $request->name;
        $kp->nim = $request->nim;
        $kp->lokasi = $request->lokasi;
        $kp->tahun = $request->tahun;
        $kp->semester = $request->semester;
        $kp->status = $request->status;
        $kp->dosen = $request->dosen;
        if(!empty($request->file('sertifikat'))){
            if(!empty($kp->getSertifikat())){
                unlink('upload/sertifikat_kp/'. $kp->sertifikat);
            }
            $ext = $request->file('sertifikat') -> getClientOriginalExtension();
            $file = $request->file('sertifikat');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/sertifikat_kp/', $filename);
            $kp->sertifikat = $filename;
        }
        $kp->save();

        return redirect('admin/kp/list')->with('sukses', "Data Kp berhasil diupdate");
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
            
            return redirect('admin/kp/list') -> with('sukses', 'Data KP berhasil dihapus');
        }
        else{
            return redirect('admin/kp/list') -> with('error', 'Data KP tidak ditemukan');
        }
    }

    public function download($id){
        $kp = KpModel::getSingle($id);
        if (!empty($kp->getSertifikat())){
            $path = public_path('upload/sertifikat_kp/' . $kp->sertifikat);
    $response = response()->file($path);
    $response->headers->set('Content-Type', 'application/pdf');
    return $response;
        }
        else{
            return response()->json(['message' => 'File not found.'], 404);
        }

    }

    
}
