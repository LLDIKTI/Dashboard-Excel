@extends('layouts.app')
@section('title', 'Data Mahasiswa')

@section('content')
<h1 class="text-4xl font-extrabold text-gray-900 mb-6">Dashboard</h1>
<div id="contentDashboard" class="container px-4 py-4 bg-white/10 backdrop-blur-lg border border-white-600 rounded-2xl">

  <!-- Statistik utama -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
    <div class="group border-dashed border-2 border-white p-6 rounded-md shadow-sm bg-gradient-to-r from-indigo-100 via-indigo-200 to-indigo-300 hover:from-indigo-300 hover:via-indigo-400 hover:to-indigo-500 transition-all duration-300 ease-in-out">
      <p class="text-4xl font-bold text-indigo-600 group-hover:text-white">
        <i class="fas fa-user-graduate"></i> {{$jumlahMahasiswa}}
      </p>
      <p class="text-2xl text-indigo-800 group-hover:text-white">Mahasiswa</p>
      <p class="text-sm text-indigo-600 group-hover:text-white">Pertumbuhan: +5%</p>
    </div>
    <div class="group border-dashed border-2 border-white p-6 rounded-md shadow-sm bg-gradient-to-r from-red-100 via-red-200 to-red-300 hover:from-red-300 hover:via-red-400 hover:to-red-500 transition-all duration-300 ease-in-out">
      <p class="text-4xl font-bold text-red-500 group-hover:text-white">
        <i class="fas fa-university"></i> {{$jumlahUniversitas}}
      </p>
      <p class="text-2xl text-red-800 group-hover:text-white">Universitas</p>
      <p class="text-sm text-red-600 group-hover:text-white">Pertumbuhan: +3%</p>
    </div>
    <div class="group border-dashed border-2 border-white p-6 rounded-md shadow-sm bg-gradient-to-r from-blue-100 via-blue-200 to-blue-300 hover:from-blue-300 hover:via-blue-400 hover:to-blue-500 transition-all duration-300 ease-in-out">
      <p class="text-4xl font-bold text-blue-700 group-hover:text-white">
        <i class="fas fa-book"></i> {{$jumlahProdi}}
      </p>
      <p class="text-2xl text-blue-800 group-hover:text-white">Prodi</p>
      <p class="text-sm text-blue-600 group-hover:text-white">Pertumbuhan: +8%</p>
    </div>
  </div>

  <!-- Daftar Universitas -->
  <div class="mb-6">
    <h2 class="text-2xl font-semibold mb-4">Daftar Universitas</h2>
    <ul class="overflow-y-scroll max-h-32 border border-gray-300 bg-white rounded-lg p-4">
      @foreach($universitasList as $universitas)
      <li class="text-gray-700 hover:text-blue-500 transition-all">
        <i class="fas fa-university mr-2"></i> {{ $universitas }}
      </li>
      @endforeach
    </ul>
  </div>

  <!-- Daftar Prodi -->
  <div class="mb-6">
    <h2 class="text-2xl font-semibold mb-4">Daftar Prodi</h2>
    <ul class="overflow-y-scroll max-h-32 border border-gray-300 bg-white rounded-lg p-4">
      @foreach($prodiList as $prodi)
      <li class="text-gray-700 hover:text-blue-500 transition-all">
        <i class="fas fa-book mr-2"></i> {{ $prodi }}
      </li>
      @endforeach
    </ul>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection