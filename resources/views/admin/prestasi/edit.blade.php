@extends('layouts.app')
 
@section('content') 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Prestasi</h1>
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
                    <label>Nama Lomba</label>
                    <input type="text" class="form-control" value="{{old('nama_lomba', $getRecord->nama_lomba)}}" name="nama_lomba" required placeholder="Masukan Nama Lomba">
                  </div>
                  <div class="form-group">
                    <label>Penyelenggara</label>
                    <input type="text" class="form-control" value="{{old('penyelenggara', $getRecord->penyelenggara)}}" name="penyelenggara" required placeholder="Masukan Penyelenggara">
                  </div>
                  <div class="form-group">
                    <label>Tingkatan Lomba</label>
                    <select class="form-control" name="tingkat" value="{{old('tingkat', $getRecord->tingkat)}}">
                      <option value="0">Nasional</option>
                      <option value="1">Internasional</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Capaian Prestasi</label>
                    <input type="text" class="form-control" value="{{old('capaian', $getRecord->capaian)}}" name="capaian" required placeholder="Masukan Capaian prestasi">
                  </div>
                  <div class="form-group">
                    <label>Tahun Lomba</label>
                    <input type="text" class="form-control" value="{{old('tahun', $getRecord->tahun)}}" name="tahun" required placeholder="Masukan Tahun Lomba">
                  </div>
                  <div class="form-group">
                    <label>Sertifikat</label>
                    <input type="file" class="form-control" name="sertifikat">
                    @if(!empty($getRecord->getSertifikat()))
                      <img src="{{ $getRecord->getSertifikat() }}" style="width:auto; height:50px;">
                    @endif
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