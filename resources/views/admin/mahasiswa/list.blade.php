@extends('layouts.app')
 
@section('content') 

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Mahasiswa (Total : {{$getRecord->total()}})</h1>
            <p>Mahasiswa Aktif : {{$TotalMahasiswaaktif}},
            Mahasiswa Lulus : {{$TotalMahasiswalulus}},
            Mahasiswa Drop Out : {{$TotalMahasiswado}},
            </p><p>Mahasiswa Undur Diri : {{$TotalMahasiswaud}},
            Mahasiswa Meninggal : {{$TotalMahasiswaalm}}</p>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{url('admin/mahasiswa/create')}}" class="btn btn-primary">Tambah Mahasiswa</a>        
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
                <h3 class="card-title">Cari mahasiswa</h3>
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
                      <label>Username</label>
                      <input type="text" class="form-control" value="{{ Request::get('username')}}" name="username" placeholder="Masukan Username">
                    </div>
                    <div class="form-group col-md-3">
                      <label>NIM</label>
                      <input type="text" class="form-control" value="{{ Request::get('nim')}}" name="nim" placeholder="Masukan NIM">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Perwalian</label>
                      <input type="text" class="form-control" value="{{ Request::get('perwal')}}" name="perwal" placeholder="Masukan Perwalian">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Status</label>
                      <input type="text" class="form-control" value="{{ Request::get('status')}}" name="status" placeholder="Masukan Status">
                    </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Cari</button>
                      <a href="{{url('admin/mahasiswa/list')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
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
                      <th>Name</th>  
                      <th>Username</th>
                      <th>NIM</th>
                      <th>Perwalian</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->username}}</td>
                        <td>{{$value->nim}}</td>
                        <td>{{$value->perwalian_name}}</td>
                        <td>{{$value->status}}</td>
                        <td>
                          <a href="{{url('admin/mahasiswa/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                          <!-- <a href="{{url('admin/mahasiswa/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a> -->
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