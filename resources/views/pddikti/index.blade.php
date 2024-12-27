@extends('layouts.app')
@section('title', 'Data Mahasiswa')

@section('content')
<h1 class="text-4xl font-extrabold font-grey-900 mb-6">Dashboard</h1>
<div id="contentDashboard" class="container px-4 py-4 bg-white/10 backdrop-blur-lg border border-white-600 rounded-2xl w-[80vw]">
  <!-- success message alert update -->
  <div class="grid grid-cols-3 gap-4 mb-4">
    <div class="border-dashed border-2 border-white p-6 rounded-md shadow-sm">
      <p class="text-4xl font-bold text-indigo-600">{{$jumlahMahasiswa}}</p>
      <p class="text-2xl">Mahasiswa</p>
    </div>
    <div class="border-dashed border-2 border-white p-6 rounded-md shadow-sm">
      <p class="text-4xl font-bold text-red-500">{{$jumlahUniversitas}}</p>
      <p class="text-2xl">Universitas</p>
    </div>
    <div class="border-dashed border-2 border-white p-6 rounded-md shadow-sm">
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
  <div class="flex justify-between mt-20">
    <p class="text-2xl font-bold text-slate-500">Tabel data mahasiswa</p>
    <a href="javascript:void(0)" class="btn btn-success mb-3" id="exportExcel">Export Excel</a>
  </div>
  <!-- Filter Form -->
  <div class="grid grid-cols-2 gap-4 mb-6">
    <!-- Select Universitas -->
    <select id="filterUniversitas" class="form-select bg-white/30 backdrop-blur-lg text-gray-700 placeholder-gray-400 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent p-3">
      <option value="">Filter Universitas</option>
      @foreach($universitasList as $universitas)
      <option value="{{ $universitas }}">{{ $universitas }}</option>
      @endforeach
    </select>

    <!-- Select Prodi -->
    <select id="filterProdi" class="form-select bg-white/30 backdrop-blur-lg text-gray-700 placeholder-gray-400 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent p-3">
      <option value="">Filter Prodi</option>
      @foreach($prodiList as $prodi)
      <option value="{{ $prodi }}">{{ $prodi }}</option>
      @endforeach
    </select>
  </div>



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
    function filterMahasiswa() {
      var query = $('#search').val();
      var universitas = $('#filterUniversitas').val();
      var prodi = $('#filterProdi').val();

      $.ajax({
        url: "{{ route('mahasiswa.search') }}",
        type: "GET",
        data: {
          search: query,
          universitas: universitas,
          prodi: prodi
        },
        success: function(data) {
          $('#mahasiswaTable').html(data);
        }
      });
    }

    $('#search').on('keyup', filterMahasiswa);
    $('#filterUniversitas, #filterProdi').on('change', filterMahasiswa);

    $(document).on('click', '.pagination a', function(event) {
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];

      $.ajax({
        url: "{{ route('mahasiswa.search') }}?page=" + page + "&search=" + $('#search').val() + "&universitas=" + $('#filterUniversitas').val() + "&prodi=" + $('#filterProdi').val(),
        success: function(data) {
          $('#mahasiswaTable').html(data);
        }
      });
    });

    // Ekspor data ke Excel
    $('#exportExcel').on('click', function() {
      var universitas = $('#filterUniversitas').val();
      var prodi = $('#filterProdi').val();
      var search = $('#search').val();

      var exportUrl = "{{ route('pddikti.export') }}" + "?universitas=" + universitas + "&prodi=" + prodi + "&search=" + search;

      window.location.href = exportUrl;
    });
  });
</script>
@endsection