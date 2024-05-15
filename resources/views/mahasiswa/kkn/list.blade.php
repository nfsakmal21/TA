@extends('layouts.app')
 
@section('content') 

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kuliah Kerja Nyata (Total : {{$getRecord->total()}})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{url('mahasiswa/kkn/create')}}" class="btn btn-primary">Tambah Data</a>        
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
                      <th>Lokasi</th>
                      <th>Tahun Pelaksanaan</th>
                      <th>Semester Pelaksanaan</th>
                      <th>Dosen</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->nim}}</td>
                        <td>{{$value->lokasi}}</td>
                        <td>{{$value->tahun}}</td>
                        <td>
                          @if($value->semester == 0)
                            Gasal
                          @else
                            Genap
                          @endif
                        </td>
                        <td>{{$value->dosen}}</td>
                        <td>
                          @if($value->status == 0)
                            Selesai
                          @else
                            Belum Selesai
                          @endif                          
                        </td>
                        <td>
                          <a href="{{url('mahasiswa/kkn/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                          <!-- <a href="{{url('mahasiswa/kkn/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a> -->
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