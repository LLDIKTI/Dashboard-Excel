@extends('layouts.app')
@section('title', 'Riwayat Import')
@section('content')
<div class="container">
  <h2>Import History</h2>
  <table class="table">
    <thead>
      <tr>
        <th>File Name</th>
        <th>Total Rows</th>
        <th>Successful Imports</th>
        <th>Failed Imports</th>
        <th>Status</th>
        <th>Imported At</th>
      </tr>
    </thead>
    <tbody>
      @foreach($histories as $history)
      <tr>
        <td>{{ $history->file_name }}</td>
        <td>{{ $history->total_rows }}</td>
        <td>{{ $history->successful_imports }}</td>
        <td>{{ $history->failed_imports }}</td>
        <td>{{ $history->status }}</td>
        <td>{{ $history->created_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection