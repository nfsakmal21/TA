@extends('layouts.app')
 
@section('content') 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Kerja Praktik</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" required placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                    <label>NIM</label>
                    <input type="text" class="form-control" name="nim" value="{{old('nim')}}" required placeholder="Masukan NIM">
                    <div style="color:red">{{ $errors->first('nim') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" class="form-control" name="lokasi" value="{{old('lokasi')}}" required placeholder="Masukan Nama Perusahaan">
                  </div>
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" class="form-control" name="tahun" value="{{old('tahun')}}" required placeholder="Masukan Tahun Pelaksanaan">
                  </div>
                  <div class="form-group">
                    <label>Semester</label>
                    <select class="form-control" name="semester" value="{{old('semester')}}">
                      <option value="Gasal">Gasal</option>
                      <option value="Genap">Genap</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Dosen Pembimbing</label>
                    <select class="form-control" name="dosen" value="{{old('dosen')}}">
                      @foreach($getRecord as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" value="{{old('status')}}">
                      <option value="Selesai">Selesai</option>
                      <option value="Belum Selesai">Belum Selesai</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Sertifikat</label>
                    <input type="file" class="form-control" name="sertifikat" required>
                    <a>Dapat berupa sertifikat atau bukti lainnya dalam format jpg/png</a>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            <!-- /.card -->

            <!-- Input addon -->
            <!-- /.card -->
            <!-- Horizontal Form -->
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection