<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\KknModel;

class KknDosenController extends Controller
{
    public function list(){
        $test = Auth::user()->id ;
        $data['getRecord'] = KknModel::kkndosen($test); 
        $data['header_title'] = "Data Kkn";
        return view('dosen.kkn.list', $data);
    }

    public function exportToCSV()
    {
        $test = Auth::user()->id ;
        $data = KknModel::kkndosen($test); 

        $fileName = 'data.csv';
        $filePath = ('upload/' . $fileName);

        $file = fopen($filePath, 'w');

        fputcsv($file, array('id', 'Name', 'NIM', 'Lokasi','Tahun Pelaksanaan','Semester Pelaksanaan','Dosen','Status')); 

        foreach ($data as $row) {
            fputcsv($file, array($row->id, $row->name,$row->nim, $row->lokasi, $row->tahun, $row->semester, $row->dosen, $row->status)); 
        }
        fclose($file);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function create(){
        $data['header_title'] = "Tambah Data KKN";
        return view('dosen.kkn.create', $data);
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
        $kkn->dosen = $request->dosen;
        $kkn->save();

        return redirect('dosen/kkn/list')->with('sukses', "Data KKN berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = KknModel::getSingle ($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Data KKN";
            return view('dosen.kkn.edit', $data);
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
        $kkn->dosen = $request->dosen;
        $kkn->save();

        return redirect('dosen/kkn/list')->with('sukses', "Data KKN berhasil diupdate");
    }

    public function delete($id){
        $kkn = KknModel::getSingle($id);
        if($kkn){
                $kkn->delete();
            
            return redirect('dosen/kkn/list') -> with('sukses', 'Data KKN berhasil dihapus');
        }
        else{
            return redirect('dosen/kkn/list') -> with('error', 'Data KKN tidak ditemukan');
        }
    }
}
