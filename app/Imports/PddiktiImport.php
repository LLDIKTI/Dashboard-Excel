<?php

namespace App\Imports;

use App\Models\Pddikti; // Pastikan ini model yang sesuai
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class PddiktiImport implements ToModel //harusnya ToModel
{

    private $current = 0;
    public function collection(Collection $collection)
    {
        dd($collection);
    }
    public function model(array $row)
    {
        $this->current++;
        if ($this->current > 0) {
            return new Pddikti([
                'id_pd' => $row[0],
                'nm_pd' => $row[1],  // Sesuaikan dengan kolom di Excel
                'nipd' => $row[2],   // Sesuaikan dengan kolom di Excel
                'nik' => $row[3],   // Sesuaikan dengan kolom di Excel
                'nm_stat_mhs' => $row[4],   // Sesuaikan dengan kolom di Excel
                'tgl_lahir' => $row[5],   // Sesuaikan dengan kolom di Excel
                'nm_ibu_kandung' => $row[6],   // Sesuaikan dengan kolom di Excel
                'mulai_smt' => $row[7],   // Sesuaikan dengan kolom di Excel
                'id_smt' => $row[8],   // Sesuaikan dengan kolom di Excel
                'nm_smt' => $row[9], // Sesuaikan dengan kolom di Excel
                'ips' => $row[10],
                'sks_smt' => $row[11],
                'biaya_smt' => $row[12],
                'sks_total' => $row[13],
                'sks_diakui' => $row[14],
                'ipk' => $row[15],
                'ipk_reg_pd' => $row[16],
                'tgl_masuk_sp' => $row[17],
                'tgl_keluar' => $row[18],
                'nm_jns_daftar' => $row[19],
                'ket_keluar' => $row[20],
                'smt_yudisium' => $row[21],
                'nm_jenj_didik' => $row[22],
                'no_seri_ijazah' => $row[23],
                'sk_yudisium' => $row[24],
                'tgl_sk_yudisium' => $row[25],
                'npsn' => $row[26],
                'nm_lemb' => $row[27],
                'stat_sp' => $row[28],
                'nm_prodi' => $row[29],
                'kode_prodi' => $row[30],
                'stat_prodi' => $row[31],
                'lastupdate_regpd' => $row[32],
                'id_reg_pd' => $row[33],
                'create_reg_pd' => $row[34],
                'created_pd' => $row[35],
                'softdelv_kul_mhs' => $row[36],
                'softdelv_peserta_didik' => $row[37],
                'softdelv_reg_pd' => $row[38],
            ]);
        }
    }
}
