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
        $data['getRecord'] = User::getDosen(); 
        $data['header_title'] = "Daftar Dosen";
        return view('admin.dosen.list', $data);
    }

    public function create(){
        $data['header_title'] = "Tambah Dosen";
        return view('admin.dosen.create', $data);
    }

    public function tambah(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users',
            'nip' => 'required|unique:users'
        ]);
        
        $dosen = new User;
        $dosen->name = trim($request->name);
        $dosen->nip = trim($request->nip);
        $dosen->email = trim($request->email);
        $dosen->password = Hash::make($request->password);
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
            'email' => 'required|email|unique:users,email,'.$id,
            'nip' => 'required|unique:users,nip,'.$id
        ]);

        $dosen = User::getSingle($id);
        $dosen->name = trim($request->name);
        $dosen->nip = trim($request->nip);
        $dosen->email = trim($request->email);
        if(!empty($request->password)){

            $dosen->password = Hash::make($request->password);
        }

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
