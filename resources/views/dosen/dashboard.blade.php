@extends('layouts.app')
 
@section('content') 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$TotalKkn}}</h3>
                <p>Total Data Kuliah Kerja Nyata</p>
              </div>
            </div>
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$TotalKp}}</h3>
                <p>Total Data Kerja Praktik</p>
              </div>
            </div>
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$TotalTa}}</h3>
                <p>Total Data Tugas Akhir</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$TotalLomba}}</h3>
                <p>Total Data Prestasi</p>
              </div>
            </div>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$TotalMbkm}}</h3>
                <p>Total Data Merdeka Belajar Kampus Merdeka</p>
              </div>
            </div>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$TotalPkm}}</h3>
                <p>Total Data Pekan Kreativitas Mahasiswa</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection