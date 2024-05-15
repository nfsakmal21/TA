@extends('layouts.app')
 
@section('content') 

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Pesan</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <!-- <form id="form-hadir" action="{{ url('dosen/pesan/word/') }}" method="POST" style="display: inline;">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-primary">Cetak BAP</button>
        </form>         -->
        
        <a href="{{url('dosen/pesan/create')}}" class="btn btn-primary">Tambah Pesan</a>
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
                      <th>Pesan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->pesan}}</td>
                        <td>
                          <a href="{{url('dosen/pesan/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                          <a href="{{url('dosen/pesan/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                          <!-- <a href="{{url('dosen/prestasi/download/'.$value->id)}}" class="btn btn-success" onclick="return confirm('Apakah anda yakin ingin mengunduh data ini?')">Download Sertifikat</a> -->
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