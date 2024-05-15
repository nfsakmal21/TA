@extends('layouts.app')
 
@section('content') 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Mahasiswa</h1>
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
                  </div>
                  <!-- <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" value="{{old('email', $getRecord->email)}}" name="email" required placeholder="Masukan Email">
                    <div style="color:red">{{ $errors->first('email') }}</div>
                  </div> -->
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="Aktif" {{ $getRecord->status == "Aktif" ? 'selected' : '' }}>Aktif</option>
                      <option value="Lulus" {{ $getRecord->status == "Lulus" ? 'selected' : '' }}>Lulus</option>
                      <option value="Drop Out" {{ $getRecord->status == "Drop Out" ? 'selected' : '' }}>Drop Out</option>
                      <option value="Undur Diri" {{ $getRecord->status == "Undur Diri" ? 'selected' : '' }}>Undur Diri</option>
                      <option value="Meninggal" {{ $getRecord->status == "Meninggal" ? 'selected' : '' }}>Meninggal</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Perwalian</label>
                    <select class="form-control" name="perwalian" value="{{old('perwalian')}}">
                      @foreach($getRecords as $value)
                        <option value="{{$value->id}}" {{ $getRecord->perwalian == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password"  placeholder="Masukan Password">
                    <p>Jika anda ingin mengganti password tolong isi, jika tidak abaikan</p>
                  </div> -->
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