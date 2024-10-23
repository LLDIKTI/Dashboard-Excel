@if($data->count() > 0)
<table class="min-w-full table-auto">
  <thead>
    <tr class="bg-white/40">
      <th class="px-6 py-3 text-left border-b rounded-tl-xl">NO.</th>
      <th>NIPD</th>
      <th>NAMA</th>
      <th>PRODI</th>
      <th>LEMBAGA</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $pddikti)
    <tr class="bg-white/20 backdrop-blur-md">
      <th class="px-6 py-3 border-b">{{ $loop->iteration }}</th>
      <td class="px-6 py-3 border-b">{{ $pddikti->nipd }}</td>
      <td class="px-6 py-3 border-b"> <a href="{{ route('mahasiswa.show', $pddikti->id_pd) }}">{{ $pddikti->nm_pd }}</a></td>
      <td class="px-6 py-3 border-b">{{ $pddikti->nm_prodi }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->nm_lemb }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<p class="text-center">Tidak ada data</p>
@endif
<div class="mt-3">
  {{ $data->links() }}
</div>