@extends('layouts.app')
 
@section('content') 

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pekan Kreativitas Mahasiswa (Total : {{$getRecord->total()}})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
          <form id="form-hadir" action="{{ url('dosen/pkm/csv/') }}" method="POST" style="display: inline;">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-primary">Cetak CSV</button>
        </form>  
            <a href="{{url('dosen/pkm/create')}}" class="btn btn-primary">Tambah Data</a>        
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cari Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Nama</label>
                      <input type="text" class="form-control" value="{{ Request::get('name')}}" name="name" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group col-md-3">
                      <label>NIM</label>
                      <input type="text" class="form-control" value="{{ Request::get('nim')}}" name="nim" placeholder="Masukan NIM">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Program</label>
                      <input type="text" class="form-control" value="{{ Request::get('program')}}" name="program" placeholder="Masukan Nama Program">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Tahun</label>
                      <input type="text" class="form-control" value="{{ Request::get('tahun')}}" name="tahun" placeholder="Masukan Tahun">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Nama Dosen</label>
                      <input type="text" class="form-control" value="{{ Request::get('dosen')}}" name="dosen" placeholder="Masukan Nama Dosen">
                    </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Cari</button>
                      <a href="{{url('dosen/pkm/list')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

              </form>
            </div>


            @include('_message')
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>NIM</th>
                      <th>Program</th>
                      <th>Tahun</th>
                      <th>Dosen</th>
                      <th>Sertifikat</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->nim}}</td>
                        <td>{{$value->program}}</td>
                        <td>{{$value->tahun}}</td>
                        <td>{{$value->dosen}}</td>
                        <td>
                          <a href="{{ asset('upload/sertifikat_pkm/' . $value->sertifikat) }}" target="_blank">Buka Sertifikat</a>
                        </td>

                        <td>
                          <a href="{{url('dosen/pkm/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                          <!-- <a href="{{url('dosen/pkm/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a> -->
                          <!-- <a href="{{url('dosen/pkm/download/'.$value->id)}}" class="btn btn-success" onclick="return confirm('Apakah anda yakin ingin mengunduh data ini?')">Download Sertifikat</a> -->
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding:10px; float:right;">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection