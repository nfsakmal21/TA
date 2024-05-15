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
<div class="container">
        <h2>Pesan Dari Dosen Wali</h2>
        <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Pesan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->pesan}}</td>
                        

                      </tr>
                    @endforeach
                  </tbody>
                </table>
    </div>
          </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection