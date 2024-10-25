@extends('layouts.app')
@section('title', 'Import Data Excel')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif


<div class="relative z-20 container mt-10">
  <div class="w-full max-w-lg mx-auto bg-white shadow-md rounded-lg p-8">
    <h2 class="text-2xl font-semibold mb-6">Import Data Excel</h2>

    <!-- Form Import -->
    <form action="{{ route('pddikti.import') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      <div>
        <label for="file" class="block text-gray-700 font-medium">Pilih File Excel:</label>
        <input type="file" name="file" id="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none bg-gray-50 p-2 mt-2" required>
      </div>

      <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
        Import
      </button>
    </form>
  </div>
</div>
@endsection