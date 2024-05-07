@if(!empty(session('error')))
  <div class="alert alert-danger" role="alert">
    {{ session('error') }}
  </div>
@endif

@if(!empty(session('sukses')))
  <div class="alert alert-success" role="alert">
    {{ session('sukses') }}
  </div>
@endif