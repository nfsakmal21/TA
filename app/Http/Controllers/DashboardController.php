<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\KknModel;
use App\Models\KpModel;
use App\Models\TaModel;
use App\Models\LombaModel;
use App\Models\MbkmModel;
use App\Models\PkmModel;
use App\Models\PesanModel;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    public function dashboard(){
        $data['header_title'] = 'Dashboard';
        if(Auth::user()->user_type == 1){
            $data['TotalAdmin'] = User::getTotalUser(1);
            $data['TotalDosen'] = User::getTotalUser(2);
            $data['TotalMahasiswa'] = User::getTotalUser(3);
            
            $data['TotalKkn']=KknModel::getTotalKkn();
            $data['TotalKp']=KpModel::getTotalKp();
            $data['TotalTa']=TaModel::getTotalTa();
            $data['TotalLomba']=LombaModel::getTotalLomba();
            $data['TotalMbkm']=MbkmModel::getTotalMbkm();
            $data['TotalPkm']=PkmModel::getTotalPkm();
            return view('admin.dashboard', $data);
        }
    
        else if(Auth::user()->user_type == 2){
            $data['TotalKkn']=KknModel::getTotalKkn();
            $data['TotalKp']=KpModel::getTotalKp();
            $data['TotalTa']=TaModel::getTotalTa();
            $data['TotalLomba']=LombaModel::getTotalLomba();
            $data['TotalMbkm']=MbkmModel::getTotalMbkm();
            $data['TotalPkm']=PkmModel::getTotalPkm();
            return view('dosen.dashboard', $data);
        }
    
        else if(Auth::user()->user_type == 3){
            $test = Auth::user()->perwalian;
            $data['getRecord'] = PesanModel::getRecord($test);
            return view('mahasiswa.dashboard', $data);
        }  
    }
}
