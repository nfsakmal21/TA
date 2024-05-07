<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\user;
use Auth;
use Hash;
use Str;

class AdminController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getAdmin(); 
        $data['header_title'] = "Daftar Admin";
        return view('admin.admin.list', $data);
    }

    public function create(){
        $data['header_title'] = "Tambah Admin";
        return view('admin.admin.create', $data);
    }

    public function tambah(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users',
            'nip' => 'required|unique:users'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->nip = trim($request->nip);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list')->with('sukses', "Admin berhasil ditambah");
    }

    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Admin";
            return view('admin.admin.edit', $data);
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
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->nip = trim($request->nip);
        $user->email = trim($request->email);
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('admin/admin/list')->with('sukses', "Admin berhasil diupdate");
    }

    public function delete($id){
        $user = User::getSingle($id);
        if($user){
           
                $user->delete();
            
            return redirect('admin/admin/list') -> with('sukses', 'User berhasil dihapus');
        }
        else{
            return redirect('admin/admin/list') -> with('error', 'Admin tidak ditemukan');
        }
    }
}
