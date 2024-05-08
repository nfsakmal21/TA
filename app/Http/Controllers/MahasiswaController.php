<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PerwalianModel;
use Illuminate\Support\Facades\Storage;

use Hash;
use Auth;
use Str;

class MahasiswaController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getJoinedDatas();
        $data['header_title'] = "Daftar Mahasiswa";
        return view('admin.mahasiswa.list', $data);
    }

    public function create(){
        $data['header_title'] = "Tambah Mahasiswa";
        $data['getRecord'] = User::getDosen(); 
        return view('admin.mahasiswa.create', $data);
    }

    public function tambah(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users',
            'nim' => 'required|unique:users'
        ]);
        
        $mahasiswa = new User;
        $mahasiswa->name = trim($request->name);
        $mahasiswa->nim = trim($request->nim);
        $mahasiswa->email = trim($request->email);
        $mahasiswa->perwalian = trim($request->perwalian);
        $mahasiswa->password = Hash::make($request->password);
        $mahasiswa->user_type = 3;
        $mahasiswa->save();

        $perwalian = new PerwalianModel;
        $perwalian->name = trim($request->name);
        $perwalian->status = 0;
        $perwalian->save();

        return redirect('admin/mahasiswa/list')->with('sukses', "Mahasiswa berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        $data['getRecords'] = User::getDosen(); 
        if(!empty($data['getRecord'])){
            $data['getPerwalian'] = PerwalianModel::getPerwalian();
            $data['header_title'] = "Edit Mahasiswa";
            return view('admin.mahasiswa.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'nim' => 'required|unique:users,nim,'.$id
        ]);

        $mahasiswa = User::getSingle($id);
        $mahasiswa->name = trim($request->name);
        $mahasiswa->nim = trim($request->nim);
        $mahasiswa->email = trim($request->email);
        if(!empty($request->password)){

            $mahasiswa->password = Hash::make($request->password);
        }

        $mahasiswa->save();

        return redirect('admin/mahasiswa/list')->with('sukses', "Mahasiswa berhasil diupdate");
    }

    public function delete($id){
        $mahasiswa = User::getSingle($id);
        if($mahasiswa){
                $mahasiswa->delete();
            
            return redirect('admin/mahasiswa/list') -> with('sukses', 'User berhasil dihapus');
        }
        else{
            return redirect('admin/mahasiswa/list') -> with('error', 'Admin tidak ditemukan');
        }
    }
}
