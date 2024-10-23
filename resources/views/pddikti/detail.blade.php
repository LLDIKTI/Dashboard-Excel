@php
use Carbon\Carbon;
@endphp

@extends('layouts.app')
@section('title', 'Detail Mahasiswa')

@section('content')
<div class=" flex items-center justify-center container-md mx-auto px-4 bg-white/25 backdrop-blur-lg border border-gray-500 rounded-2xl py-10">
  <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-teal-400">Biodata Mahasiswa</h1>
</div>

<div class="grid grid-cols-2 container-md mt-4 px-4 bg-white/20 backdrop-blur-lg border border-gray-500 rounded-2xl py-10">
  <div>
    <div>
      <p>Nama</p>
      <p class="font-bold text-lg">{{$mahasiswa->nm_pd}}</p>
    </div>
    <div class="mt-3">
      <p>NIPD</p>
      <p class="font-bold text-lg">{{$mahasiswa->nipd}}</p>
    </div>
    <div class="mt-3">
      <p>Masa Studi</p>
      <p class="font-bold text-lg">{{$mahasiswa->masa_studi}} Tahun</p>
    </div>
    <div class="mt-3">
      <p>Tanggal Lahir</p>
      <p class="font-bold text-lg">{{$mahasiswa->tgl_lahir}}</p>
    </div>
  </div>
  <div>
    <div>
      <p>Perguruan Tinggi</p>
      <p class="font-bold text-lg">{{$mahasiswa->nm_lemb}}</p>
    </div>
    <div class="mt-3">
      <p>Tanggal Masuk</p>
      <p class="font-bold text-lg">{{$mahasiswa->tgl_masuk_sp}}</p>
    </div>
    <div class="mt-3">
      <p>Jenjang - Program Studi</p>
      <p class="font-bold text-lg">{{$mahasiswa->nm_jenj_didik}} - {{$mahasiswa->nm_prodi}}</p>
    </div>
    <div class="mt-3">
      <p>Status Terakhir Mahasiswa</p>
      <p class="font-bold text-lg">{{$mahasiswa->nm_stat_mhs}}-{{$mahasiswa->nm_smt}}</p>
    </div>
  </div>
</div>
@endsection