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
        $data['TotalMahasiswaaktif'] = User::getTotalUseraktif(3);
            $data['TotalMahasiswalulus'] = User::getTotalUserlulus(3);
            $data['TotalMahasiswado'] = User::getTotalUserdo(3);
            $data['TotalMahasiswaud'] = User::getTotalUserud(3);
            $data['TotalMahasiswaalm'] = User::getTotalUseralm(3);
        $data['header_title'] = "Daftar Mahasiswa";
        return view('admin.mahasiswa.list', $data);
    }

    public function exportToCSV()
    {
        $data = User::getcsvmahasiswa(); 

        $fileName = 'data.csv';
        $filePath = ('upload/' . $fileName);

        $file = fopen($filePath, 'w');

        fputcsv($file, array('id', 'Name', 'Username', 'NIM','Perwalian','Status')); 

        foreach ($data as $row) {
            fputcsv($file, array($row->id, $row->name, $row->username,$row->nim, $row->perwalian_name, $row->status)); 
        }
        fclose($file);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function create(){
        $data['header_title'] = "Tambah Mahasiswa";
        $data['getRecord'] = User::getDosen(); 
        return view('admin.mahasiswa.create', $data);
    }

    public function tambah(Request $request){
        request()->validate([
            // 'email' => 'required|email|unique:users',
            'nim' => 'required|unique:users'
        ]);
        
        $mahasiswa = new User;
        $mahasiswa->name = trim($request->name);
        $mahasiswa->nim = trim($request->nim);
        $mahasiswa->perwalian = trim($request->perwalian);
        $mahasiswa->username = strtok($mahasiswa->name, ' ').".".$mahasiswa->nim;
        $mahasiswa->password = Hash::make($mahasiswa->nim);
        $mahasiswa->user_type = 3;
        $mahasiswa->status = "Aktif";
        $mahasiswa->save();

        $perwalian = new PerwalianModel;
        $perwalian->name = trim($request->name);
        $perwalian->nim = trim($request->nim);
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
            // 'email' => 'required|email|unique:users,email,'.$id,
            'nim' => 'required|unique:users,nim,'.$id
        ]);

        $mahasiswa = User::getSingle($id);
        $perwalian = PerwalianModel::where('name','=',$mahasiswa->name)->update(['name' => trim($request->name)]);
        $perwalian = PerwalianModel::where('name','=',$mahasiswa->name)->update(['nim' => trim($request->nim)]);
        $mahasiswa->name = trim($request->name);
        $mahasiswa->nim = trim($request->nim);
        $mahasiswa->username = strtok($mahasiswa->name, ' ').".".$mahasiswa->nim;
        $mahasiswa->password = Hash::make($mahasiswa->nim);
        $mahasiswa->perwalian = trim($request->perwalian);
        $mahasiswa->status = trim($request->status);
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
