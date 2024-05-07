<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\PerwalianModel;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Carbon;

class PerwalianController extends Controller
{
    public function list(){ 
        $test = Auth::user()->id ;
        $data['getRecord'] = User::perwalian($test); 
        $data['header_title'] = "Data Perwalian";
        return view('dosen.perwalian.list', $data);
    }

    public function listadmin(){ 
        $data['getRecord'] = User::getJoinedData(); 
        $data['header_title'] = "Data Perwalian";
        return view('admin.perwalian.list', $data);
    }

    public function adminupdatehadir($id, Request $request){
        $perwalian = PerwalianModel::getSingle($id);
        $perwalian->status = 2;
        $perwalian->save();

        return redirect('admin/perwalian/list')->with('sukses', "Perwalian berhasil diupdate");
    }

    public function adminupdatetidakhadir($id, Request $request){
        $perwalian = PerwalianModel::getSingle($id);
        $perwalian->status = 0;
        $perwalian->save();

        return redirect('admin/perwalian/list')->with('sukses', "Perwalian berhasil diupdate");
    }
    public function seluruh(){
        PerwalianModel::where('status', 1)->update(['status' => 0]);

        return redirect('admin/perwalian/list')->with('sukses', "Perwalian berhasil diupdate");
    }

    public function updatehadir($id, Request $request){
        $perwalian = PerwalianModel::getSingle($id);
        $perwalian->status = 1;
        $perwalian->save();

        return redirect('dosen/perwalian/list')->with('sukses', "Perwalian berhasil diupdate");
    }

    public function formword(){
        $data['header_title'] = "Tambah Data MBKM";
        return view('dosen.perwalian.create', $data);
    }

    public function word(Request $request){
        $test = Auth::user()->id ;
        $data = User::perwalian($test); 
        $phpword = new \PhpOffice\PhpWord\TemplateProcessor('C:\xampp\htdocs\tugas-akhir\storage\app\public\BAP_perwalian.docx');
        $tglskrg = Carbon::now()->timezone('Asia/Jakarta');
        $tahun = $tglskrg->format('Y');
        $bulan = $tglskrg->format('m');
        $hari = $tglskrg->format('d');
        $nama_hari = '';

        $nama_hari = $tglskrg->dayOfWeek;

        if ($nama_hari === Carbon::SUNDAY) {
            $nama_hari = 'Minggu';
        } elseif ($nama_hari === Carbon::MONDAY) {
            $nama_hari = 'Senin';
        } elseif ($nama_hari === Carbon::TUESDAY) {
            $nama_hari = 'Selasa';
        } elseif ($nama_hari === Carbon::WEDNESDAY) {
            $nama_hari = 'Rabu';
        } elseif ($nama_hari === Carbon::THURSDAY) {
            $nama_hari = 'Kamis';
        } elseif ($nama_hari === Carbon::FRIDAY) {
            $nama_hari = 'Jumat';
        } elseif ($nama_hari === Carbon::SATURDAY) {
            $nama_hari = 'Sabtu';
        }
        $namaBulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        $namaBulan = $namaBulan[$bulan];
        if($bulan >= 6){
            $gengap = "GANJIL";
            $ajaran = $tahun . "-" . ($tahun + 1);
        }else{
            $gengap = "GENAP";
            $ajaran = ($tahun - 1). "-" .$tahun;
        }
        $jumlah = $data->where('status' , '!=', 2)->count();
        $hadir = $data->where('status', 1)->count();
        if($hadir == null){
            $hadir = "-";
        }
        $tidakhadir = $data->where('status', 0)->count();
        if($tidakhadir == null){
            $tidakhadir = "-";
        }
        $phpword->setValues([
            'gengap' => $gengap,
            'tahun' => $ajaran,
            'nama' => Auth::user()->name,
            'nip' => Auth::user()->nip,
            'ruang' => $request->ruang,
            'hari' => $nama_hari,
            'tanggal' => "$hari $namaBulan $tahun",
            'waktu' => $request->waktu,
            'jumlah' => $jumlah,
            'hadir' => $hadir,
            'tidakhadir'=> $tidakhadir,
        ]);

        $phpword->saveAs('BAP_Perwalian.docx');
    //    $phpWord = new PhpWord();

    //     // Add content to the document
    //     $section = $phpWord->addSection();
    //     $section->addText('Hello, this is a sample document.');

    //     // Save the document
    //     $filename = 'sample_document.docx';
    //     $path = storage_path('app/public/' . $filename); // Adjust path as needed

    //     $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    //     $objWriter->save($path);
        return response()->download('BAP_Perwalian.docx')->deleteFileAfterSend(true);
        return redirect('dosen/perwalian/list')->with('sukses', "Perwalian berhasil diupdate");
    }

    public function updatetidakhadir($id, Request $request){
        $perwalian = PerwalianModel::getSingle($id);
        $perwalian->status = 0;
        $perwalian->save();

        return redirect('dosen/perwalian/list')->with('sukses', "Perwalian berhasil diupdate");
    }

    
}

