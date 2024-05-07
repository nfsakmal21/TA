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
        <h2>Random Quote of the Day</h2>
        <div class="quote-container">
            <h1>{{$quots}}</h1>
            <p>{{$penulis}}</p>
        </div>
    </div>
          </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection