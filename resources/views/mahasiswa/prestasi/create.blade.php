@extends('layouts.app')
 
@section('content') 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Prestasi</h1>
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
                    <label>Nama Lomba</label>
                    <input type="text" class="form-control" name="nama_lomba" value="{{old('nama_lomba')}}" required placeholder="Masukan Nama Lomba">
                  </div>
                  <div class="form-group">
                    <label>Penyelenggara</label>
                    <input type="text" class="form-control" name="penyelenggara" value="{{old('penyelenggara')}}" required placeholder="Masukan Penyelenggara Lomba">
                  </div>
                  <div class="form-group">
                    <label>Tingkatan Lomba</label>
                    <select class="form-control" name="tingkat" value="{{old('tingkat')}}">
                      <option value="0">Nasional</option>
                      <option value="1">Internasional</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Capaian Prestasi</label>
                    <input type="text" class="form-control" name="capaian" value="{{old('capaian')}}" required placeholder="Masukan Capaian Prestasi">
                  </div>
                  <div class="form-group">
                    <label>Tahun Lomba</label>
                    <input type="text" class="form-control" name="tahun" value="{{old('tahun')}}" required placeholder="Masukan Tahun Lomba">
                  </div>
                  <div class="form-group">
                    <label>Dosen</label>
                    <input type="text" class="form-control" name="dosen" value="{{old('dosen')}}" required placeholder="Masukan Nama Dosen">
                  </div>
                  <div>
                  <div class="form-group">
                    <label>Sertifikat</label>
                    <input type="file" class="form-control" required name="sertifikat">
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