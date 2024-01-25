@extends('layouts.main')

@section('container')
@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
	{{ session('success') }}
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="d-grid gap-2 d-md-flex justify-content-center">
	<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
	  <div class="card-header">Jumlah Antrian</div>
	  <div class="card-body">
		<h1 class="card-title text-center">{{$all_antrian}}</h1>
	  </div>
	</div>
	
	<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
	  <div class="card-header">Nomor Antrian</div>
	  <div class="card-body">
		<h1 class="card-title text-center">{{$next_antrian}}</h1>
	  </div>
	</div>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
	<form action="/dashboard/add_antrian" method="post">
	@csrf
	<button type="submit" class="btn btn-primary">Tambah Antrian</button>
	</form>	
	<form action="/dashboard/proses_antrian" method="post">
	@csrf
	<button type="submit" class="btn btn-primary">Proses Antrian</button>
	</form>	
</div>
<br/>
<table class="table">
  <thead>
      <tr>
          <th scope="col">Tanggal</th>
          <th scope="col">Nomor</th>
          <th scope="col">Status</th>
      </tr>
  </thead>
  <tbody>
  @php
      $no = 0;
  @endphp
  @forelse ($antrians as $antrian)
      <tr>
          <td>{{ date('d-M-y', strtotime($antrian->tanggal)) }}</td>
          <td>{{ $antrian->nomor }}</td>
          <td>{{ $antrian->status }}</td>
          
      </tr>    
  @empty
      <tr>
          <td colspan="5" class="text-center">
              <div class="alert alert-danger" role="alert">
                 Tidak ada antrian!
              </div>
          </td>
      </tr>
  @endforelse
  
  </tbody>
</table>
{{ $antrians->links() }}


@endsection