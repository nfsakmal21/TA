<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Str;

class DosenController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getDosens(); 
        $data['header_title'] = "Daftar Dosen";
        return view('admin.dosen.list', $data);
    }

    public function exportToCSV()
    {
        $data = User::getcsvDosens(); 

        $fileName = 'data.csv';
        $filePath = ('upload/' . $fileName);

        $file = fopen($filePath, 'w');

        fputcsv($file, array('id', 'nama', 'username', 'nip','status')); 

        foreach ($data as $row) {
            fputcsv($file, array($row->id, $row->name, $row->username,$row->nip, $row->status)); 
        }
        fclose($file);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function create(){
        $data['header_title'] = "Tambah Dosen";
        return view('admin.dosen.create', $data);
    }

    public function tambah(Request $request){
        request()->validate([
            // 'email' => 'required|email|unique:users',
            'nip' => 'required|unique:users'
        ]);
        
        $dosen = new User;
        $dosen->name = trim($request->name);
        $dosen->nip = trim($request->nip);
        $dosen->username = strtok($dosen->name, ' ');
        $dosen->password = Hash::make(strtok($dosen->name, ' '));
        $dosen->status = "Aktif";
        $dosen->user_type = 2;
        $dosen->save();

        return redirect('admin/dosen/list')->with('sukses', "Dosen berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Dosen";
            return view('admin.dosen.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        request()->validate([
            // 'email' => 'required|email|unique:users,email,'.$id,
            'nip' => 'required|unique:users,nip,'.$id
        ]);

        $dosen = User::getSingle($id);
        $dosen->name = trim($request->name);
        $dosen->nip = trim($request->nip);
        $dosen->username = strtok($dosen->name, ' ');
        $dosen->password = Hash::make(strtok($dosen->name, ' '));
        $dosen->status = trim($request->status);
        $dosen->save();

        return redirect('admin/dosen/list')->with('sukses', "Dosen berhasil diupdate");
    }

    public function delete($id){
        $dosen = User::getSingle($id);
        if($dosen){
                $dosen->delete();
            
            return redirect('admin/dosen/list') -> with('sukses', 'User berhasil dihapus');
        }
        else{
            return redirect('admin/dosen/list') -> with('error', 'Admin tidak ditemukan');
        }
    }
}
