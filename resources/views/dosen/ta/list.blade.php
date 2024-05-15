@extends('layouts.app')
 
@section('content') 

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Tugas Akhir (Total : {{$getRecord->total()}})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{url('dosen/ta/create')}}" class="btn btn-primary">Tambah Data</a>        
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
                      <label>Judul</label>
                      <input type="text" class="form-control" value="{{ Request::get('judul')}}" name="judul" placeholder="Masukan Judul">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Status</label>
                      <!-- <input type="text" class="form-control" value="{{ Request::get('status')}}" name="status" placeholder="Masukan Status"> -->
                      <select class="form-control" name="status" value="{{ Request::get('status')}}">
                      <option value="0">Seminar Proposal</option>
                      <option value="1">Sidang Akhir</option>
                      <option value="2">Selesai</option>
                    </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Pembimbing 1</label>
                      <input type="text" class="form-control" value="{{ Request::get('pem1')}}" name="pem1" placeholder="Masukan Pembimbing 1">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Pembimbing 2</label>
                      <input type="text" class="form-control" value="{{ Request::get('pem2')}}" name="pem2" placeholder="Masukan Pembimbing 2">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Penguji 1</label>
                      <input type="text" class="form-control" value="{{ Request::get('peng1')}}" name="peng1" placeholder="Masukan Penguji 1">
                    </div>
                      <div class="form-group col-md-3">
                      <label>Penguji 2</label>
                      <input type="text" class="form-control" value="{{ Request::get('peng2')}}" name="peng2" placeholder="Masukan Penguji 2">
                    </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Cari</button>
                      <a href="{{url('dosen/ta/list')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
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
                      <th>Judul</th>
                      <th>Status</th>
                      <th>Pembimbing 1</th>
                      <th>Pembimbing 2</th>
                      <th>Pengujian 1</th>
                      <th>Pengujian 2</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->nim}}</td>
                        <td>{{$value->judul}}</td>
                        <td>
                          @if($value->status == 0)
                            Seminar Proposal
                          @elseif($value->status == 1)
                            Sidang Akhir
                          @else
                            Selesai
                          @endif
                        </td>
                        <td>{{$value->pem1}}</td>
                        <td>{{$value->pem2}}</td>
                        <td>{{$value->peng1}}</td>
                        <td>{{$value->peng2}}</td>
                        <td>
                          <a href="{{url('dosen/ta/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                          <!-- <a href="{{url('dosen/ta/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a> -->
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