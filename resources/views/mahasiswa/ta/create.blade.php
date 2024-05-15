@extends('layouts.app')
 
@section('content') 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Tugas Akhir</h1>
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
              <form method="post" action="">
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
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul" value="{{old('judul')}}" required placeholder="Masukan Judul">
                  </div>
                  <div class="form-group">
    <label>Pembimbing 1</label>
    <select class="form-control" name="pembimbing1" id="pembimbing1-select">
        @foreach($getRecord as $value)
            <option value="{{ $value->name }}" @selected(old('pembimbing1') == $value->name)>
                {{ $value->name }}
            </option>
        @endforeach
        <option value="other" @selected(old('pembimbing1') == 'other')>Lainnya</option>
    </select>
</div>
<div class="form-group" id="pembimbing1-other-group" style="display: none;">
    <label>Masukkan Pembimbing 1</label>
    <input type="text" class="form-control" name="pembimbing1_other" value="{{ old('pembimbing1_other') }}" id="pembimbing1-other">
</div>

<div class="form-group">
    <label>Pembimbing 2</label>
    <select class="form-control" name="pembimbing2" id="pembimbing2-select">
        @foreach($getRecord as $value)
            <option value="{{ $value->name }}" @selected(old('pembimbing2') == $value->name)>
                {{ $value->name }}
            </option>
        @endforeach
        <option value="other" @selected(old('pembimbing2') == 'other')>Lainnya</option>
    </select>
</div>
<div class="form-group" id="pembimbing2-other-group" style="display: none;">
    <label>Masukkan Pembimbing 2</label>
    <input type="text" class="form-control" name="pembimbing2_other" value="{{ old('pembimbing2_other') }}" id="pembimbing2-other">
</div>

<div class="form-group">
    <label>Penguji 1</label>
    <select class="form-control" name="penguji1" id="penguji1-select">
        @foreach($getRecord as $value)
            <option value="{{ $value->name }}" @selected(old('penguji1') == $value->name)>
                {{ $value->name }}
            </option>
        @endforeach
        <option value="other" @selected(old('penguji1') == 'other')>Lainnya</option>
    </select>
</div>
<div class="form-group" id="penguji1-other-group" style="display: none;">
    <label>Masukkan Penguji 1</label>
    <input type="text" class="form-control" name="penguji1_other" value="{{ old('penguji1_other') }}" id="penguji1-other">
</div>

<div class="form-group">
    <label>Penguji 2</label>
    <select class="form-control" name="penguji2" id="penguji2-select">
        @foreach($getRecord as $value)
            <option value="{{ $value->name }}" @selected(old('penguji2') == $value->name)>
                {{ $value->name }}
            </option>
        @endforeach
        <option value="other" @selected(old('penguji2') == 'other')>Lainnya</option>
    </select>
</div>
<div class="form-group" id="penguji2-other-group" style="display: none;">
    <label>Masukkan Penguji 2</label>
    <input type="text" class="form-control" name="penguji2_other" value="{{ old('penguji2_other') }}" id="penguji2-other">
</div>

<script>
    function toggleOtherInput(selectId, inputGroupId, inputId) {
        var select = document.getElementById(selectId);
        var otherInputGroup = document.getElementById(inputGroupId);
        if (select.value === 'other') {
            otherInputGroup.style.display = 'block';
        } else {
            otherInputGroup.style.display = 'none';
            document.getElementById(inputId).value = '';
        }
    }

    document.getElementById('pembimbing1-select').addEventListener('change', function() {
        toggleOtherInput('pembimbing1-select', 'pembimbing1-other-group', 'pembimbing1-other');
    });

    document.getElementById('pembimbing2-select').addEventListener('change', function() {
        toggleOtherInput('pembimbing2-select', 'pembimbing2-other-group', 'pembimbing2-other');
    });

    document.getElementById('penguji1-select').addEventListener('change', function() {
        toggleOtherInput('penguji1-select', 'penguji1-other-group', 'penguji1-other');
    });

    document.getElementById('penguji2-select').addEventListener('change', function() {
        toggleOtherInput('penguji2-select', 'penguji2-other-group', 'penguji2-other');
    });

    document.getElementById('pembimbing1-select').dispatchEvent(new Event('change'));
    document.getElementById('pembimbing2-select').dispatchEvent(new Event('change'));
    document.getElementById('penguji1-select').dispatchEvent(new Event('change'));
    document.getElementById('penguji2-select').dispatchEvent(new Event('change'));
</script>

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" value="{{old('status')}}">
                      <option value="0">Seminar Proposal</option>
                      <option value="1">Sidang Akhir</option>
                      <option value="2">Selesai</option>
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