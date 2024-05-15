@extends('layouts.app')
 
@section('content') 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data KKN</h1>
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
                    <input type="text" class="form-control" value="{{old('name', $getRecord->name)}}" name="name" required placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                    <label>NIM</label>
                    <input type="text" class="form-control" value="{{old('nim', $getRecord->nim)}}" name="nim" required placeholder="Masukan NIM">
                    <div style="color:red">{{ $errors->first('nim') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" class="form-control" value="{{old('lokasi', $getRecord->lokasi)}}" name="lokasi" required placeholder="Masukan Lokasi">
                  </div>
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" class="form-control" value="{{old('tahun', $getRecord->tahun)}}" name="tahun" required placeholder="Masukan Tahun">
                  </div>
                  <div class="form-group">
                    <label>Semester</label>
                    <select class="form-control" name="semester" value="{{old('semester', $getRecord->semester)}}">
                      <option value="0">Gasal</option>
                      <option value="1">Genap</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Dosen</label>
                    <input type="text" class="form-control" value="{{old('dosen', $getRecord->dosen)}}" name="dosen" required placeholder="Masukan Nama Dosen">
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" value="{{old('status', $getRecord->status)}}">
                      <option value="0">Selesai</option>
                      <option value="1">Belum Selesai</option>
                    </select>
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