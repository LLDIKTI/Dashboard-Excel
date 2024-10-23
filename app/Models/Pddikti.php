<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pddikti extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pd',
        'nm_pd',
        'nipd',   // Sesuaikan dengan kolom di Excel
        'nik',  // Sesuaikan dengan kolom di Excel
        'nm_stat_mhs',   // Sesuaikan dengan kolom di Excel
        'tgl_lahir',   // Sesuaikan dengan kolom di Excel
        'nm_ibu_kandung',   // Sesuaikan dengan kolom di Excel
        'mulai_smt',   // Sesuaikan dengan kolom di Excel
        'id_smt',   // Sesuaikan dengan kolom di Excel
        'nm_smt', // Sesuaikan dengan kolom di Excel
        'ips',
        'sks_smt',
        'biaya_smt',
        'sks_total',
        'sks_diakui',
        'ipk',
        'ipk_reg_pd',
        'tgl_masuk_sp',
        'tgl_keluar',
        'nm_jns_daftar',
        'ket_keluar',
        'smt_yudisium',
        'nm_jenj_didik',
        'no_seri_ijazah',
        'sk_yudisium',
        'tgl_sk_yudisium',
        'npsn',
        'nm_lemb',
        'stat_sp',
        'nm_prodi',
        'kode_prodi',
        'stat_prodi',
        'softdelv_kul_mhs',
        'softdelv_peserta_didik',
        'softdelv_reg_pd',
        'lastupdate_regpd',
        'id_reg_pd',
        'create_reg_pd',
        'created_pd'
    ];
    protected $table = 'pddiktis';

    // Menentukan kolom primary key
    protected $primaryKey = 'id_pd';

    // Jika id_pd bukan auto-increment, tambahkan ini
    public $incrementing = false;

    // Jika tipe data primary key bukan integer, misalnya varchar
    protected $keyType = 'string';

    public function getMasaStudiAttribute()
    {
        // Mengambil tanggal masuk dari field tgl_masuk_sp
        $tglMasuk = Carbon::parse($this->tgl_masuk_sp);
        // Menghitung tahun saat ini
        $tahunSekarang = Carbon::now();
        // Menghitung selisih tahun dan memastikan return dalam bentuk integer
        return (int) $tglMasuk->diffInYears($tahunSekarang);
    }
}
