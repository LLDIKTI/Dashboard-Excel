@extends('layouts.app')
@section('title', 'data mahasiswa')

@section('content')
<style>
  .table-responsive {
    overflow-x: auto;
    white-space: nowrap;
  }
</style>
<div class="container mx-auto px-4 bg-white/10 backdrop-blur-lg border border-white-600 rounded-2xl py-10">
  <!-- success message alert update -->
  <div class="grid grid-cols-3 gap-4 mb-4">
    <div class=" border-dashed border-2 border-white p-6 rounded-md shadow-sm">
      <p class="text-4xl font-bold text-indigo-600">{{$jumlahMahasiswa}}</p>
      <p class="text-2xl">Mahasiswa</p>
    </div>
    <div class=" border-dashed border-2 border-white p-6 rounded-md shadow-sm">
      <p class="text-4xl font-bold text-red-500">{{$jumlahUniversitas}}</p>
      <p class="text-2xl">Universitas</p>
    </div>
    <div class=" border-dashed border-2 border-white p-6 rounded-md shadow-sm">
      <p class="text-4xl font-bold text-blue-700">{{$jumlahProdi}}</p>
      <p class="text-2xl">Prodi</p>
    </div>
  </div>
  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif

  <!-- tombol ekspor excel -->
  <a href="{{ url('/export-pddikti') }}" class="btn btn-success mb-3">Ekspor ke Excel</a>
  <!-- Input Search -->
  <input type="text" id="search" class="form-control mb-3 bg-white/30 backdrop-blur-lg text-gray-700 placeholder-gray-400 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent p-3" placeholder="Cari mahasiswa berdasarkan nama atau nipd ...">


  <!-- Tabel data mahasiswa -->
  <div id="mahasiswaTable">
    @include('pddikti.partials.table')
  </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#search').on('keyup', function() {
      var query = $(this).val();

      $.ajax({
        url: "{{ route('mahasiswa.search') }}",
        type: "GET",
        data: {
          search: query
        },
        success: function(data) {
          $('#mahasiswaTable').html(data);
        }
      });
    });

    $(document).on('click', '.pagination a', function(event) {
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];

      $.ajax({
        url: "{{ route('mahasiswa.search') }}?page=" + page + "&search=" + $('#search').val(),
        success: function(data) {
          $('#mahasiswaTable').html(data);
        }
      });
    });
  });
</script>
@endsection