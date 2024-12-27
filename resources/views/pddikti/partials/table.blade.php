@if($data->count() > 0)
<div class="overflow-x-auto"">
  <table class=" table-auto border-collapse">
  <thead>
    <tr class="bg-white/40">
      <th class="px-6 py-3 text-left border-b rounded-tl-xl">NO.</th>
      <th class="px-6 py-3 text-left ">NIPD</th>
      <th class="px-6 py-3 text-left ">NAMA</th>
      <th class="px-6 py-3 text-left ">PRODI</th>
      <th class="px-6 py-3 text-left ">STATUS</th>
      <th class="px-6 py-3 text-left ">TANGGAL LAHIR</th>
      <th class="px-6 py-3 text-left ">NAMA IBU KANDUNG</th>
      <th class="px-6 py-3 text-left ">MULAI SMT</th>
      <th class="px-6 py-3 text-left ">ID SMT</th>
      <th class="px-6 py-3 text-left ">NAMA SMT</th>
      <th class="px-6 py-3 text-left ">IPS</th>
      <th class="px-6 py-3 text-left ">SKS SMT</th>
      <th class="px-6 py-3 text-left ">BIAYA SMT</th>
      <th class="px-6 py-3 text-left ">SKS TOTAL</th>
      <th class="px-6 py-3 text-left ">SKS DIAKUI</th>
      <th class="px-6 py-3 text-left ">IPK</th>
      <th class="px-6 py-3 text-left ">IPK REGULER</th>
      <th class="px-6 py-3 text-left ">TGL MASUK SP</th>
      <th class="px-6 py-3 text-left ">TGL KELUAR</th>
      <th class="px-6 py-3 text-left ">NAMA JENIS DAFTAR</th>
      <th class="px-6 py-3 text-left ">KET KELUAR</th>
      <th class="px-6 py-3 text-left ">SMT YUDISUM</th>
      <th class="px-6 py-3 text-left ">NAMA JENJ DIDIK</th>
      <th class="px-6 py-3 text-left ">NO SERI IJAZAH</th>
      <th class="px-6 py-3 text-left ">SK YUDISUM</th>
      <th class="px-6 py-3 text-left ">TGL SK YUDISUM</th>
      <th class="px-6 py-3 text-left ">NPSN</th>
      <th class="px-6 py-3 text-left ">LEMBAGA</th>
      <th class="px-6 py-3 text-left ">STATUS SP</th>
      <th class="px-6 py-3 text-left ">NAMA PRODI</th>
      <th class="px-6 py-3 text-left ">KODE PRODI</th>
      <th class="px-6 py-3 text-left ">STAT PRODI</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $pddikti)
    <tr class="bg-white/20 backdrop-blur-md">
      <th class="px-6 py-3 border-b">{{ $loop->iteration }}</th>
      <td class="px-6 py-3 border-b">{{ $pddikti->nipd }}</td>
      <td class="px-6 py-3 border-b"> <a href="{{ route('mahasiswa.show', $pddikti->id_pd) }}">{{ $pddikti->nm_pd }}</a></td>
      <td class="px-6 py-3 border-b">{{ $pddikti->nm_prodi }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->nm_stat_mhs }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->tgl_lahir }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->nm_ibu_kandung }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->mulai_smt }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->id_smt }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->nm_smt }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->ips }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->sks_smt }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->biaya_smt }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->sks_total }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->sks_diakui }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->ipk }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->ipk_reg_pd }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->tgl_masuk_sp }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->tgl_keluar }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->nm_jns_daftar }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->ket_keluar }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->smt_yudisum }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->nm_jenj_didik }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->no_seri_ijazah }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->sk_yudisum }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->tgl_sk_yudisum }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->npsn }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->nm_lemb }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->stat_sp }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->nm_prodi }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->kode_prodi }}</td>
      <td class="px-6 py-3 border-b">{{ $pddikti->stat_prodi }}</td>
    </tr>
    @endforeach
  </tbody>
  </table>
</div>
@else
<p class="text-center">Tidak ada data</p>
@endif
<div class="mt-3">
  {{ $data->links() }}
</div>