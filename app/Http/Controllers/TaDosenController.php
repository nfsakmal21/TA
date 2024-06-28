<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\TaModel;
use App\Models\User;

class TaDosenController extends Controller
{
    public function list(){
        $test = Auth::user()->name;
        $data['getRecord'] = TaModel::tadosen($test); 
        $data['header_title'] = "Data TA";
        return view('dosen.ta.list', $data);
    }

    public function exportToCSV()
    {
        $test = Auth::user()->name;
        $data = TaModel::getcsvtadosen($test);  

        $fileName = 'data.csv';
        $filePath = ('upload/' . $fileName);

        $file = fopen($filePath, 'w');

        fputcsv($file, array('id', 'Name', 'NIM', 'Judul','Status','Pembimbing 1','Pembimbing 2','Pengujian 1','Pengujian 2')); 

        foreach ($data as $row) {
            fputcsv($file, array($row->id, $row->name, $row->nim,$row->judul, $row->status, $row->pem1,$row->pem2,$row->peng1,$row->peng2)); 
        }
        fclose($file);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function create(){
        $data['header_title'] = "Tambah Data TA";
        $data['getRecord'] = User::getDosen(); 
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
        if($request->pembimbing1 == "other"){
            $ta->pem1 = $request->pembimbing1_other;
        }else{
            $ta->pem1 = $request->pembimbing1;
        }
        if($request->pembimbing2 == "other"){
            $ta->pem2 = $request->pembimbing2_other;
        }else{
            $ta->pem2 = $request->pembimbing2;
        }
        if($request->penguji1 == "other"){
            $ta->peng1 = $request->penguji1_other;
        }else{
            $ta->peng1 = $request->penguji1;
        }
        if($request->penguji2 == "other"){
            $ta->peng2 = $request->penguji2_other;
        }else{
            $ta->peng2 = $request->penguji2;
        }
        $ta->save();

        return redirect('dosen/ta/list')->with('sukses', "Data TA berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = TaModel::getSingle ($id);
        $data['getRecords'] = User::getDosen(); 
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
        if($request->pembimbing1 == "other"){
            $ta->pem1 = $request->pembimbing1_other;
        }else{
            $ta->pem1 = $request->pembimbing1;
        }
        if($request->pembimbing2 == "other"){
            $ta->pem2 = $request->pembimbing2_other;
        }else{
            $ta->pem2 = $request->pembimbing2;
        }
        if($request->penguji1 == "other"){
            $ta->peng1 = $request->penguji1_other;
        }else{
            $ta->peng1 = $request->penguji1;
        }
        if($request->penguji2 == "other"){
            $ta->peng2 = $request->penguji2_other;
        }else{
            $ta->peng2 = $request->penguji2;
        }
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
