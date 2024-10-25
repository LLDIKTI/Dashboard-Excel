<?php

namespace App\Http\Controllers;

use App\Models\Pddikti;
use App\Models\ImportHistory;
use App\Imports\PddiktiImport;
use Illuminate\Http\Request;
use App\Exports\PddiktiExport;
use Maatwebsite\Excel\Facades\Excel;

class PddiktiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pddikti::query();
        $jumlahMahasiswa = Pddikti::count('nm_pd');
        $jumlahUniversitas = Pddikti::distinct()->count('nm_lemb');
        $jumlahProdi = Pddikti::distinct()->count('nm_prodi');

        // Ambil list Universitas dan Prodi untuk dropdown
        $universitasList = Pddikti::distinct()->pluck('nm_lemb');
        $prodiList = Pddikti::distinct()->pluck('nm_prodi');

        // Filter berdasarkan prodi dan universitas
        if ($request->has('universitas') && $request->universitas != '') {
            $query->where('nm_lemb', $request->universitas);
        }

        if ($request->has('prodi') && $request->prodi != '') {
            $query->where('nm_prodi', $request->prodi);
        }

        // Logic search
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nm_pd', 'LIKE', "%$search%")
                    ->orWhere('nipd', 'LIKE', "%$search%");
            });
        }

        $data = $query->paginate(15);

        if ($request->ajax()) {
            return view('pddikti.partials.table', compact('data'))->render();
        }

        return view('pddikti.index', compact('data', 'jumlahMahasiswa', 'jumlahUniversitas', 'jumlahProdi', 'universitasList', 'prodiList'));
    }


    public function export(Request $request)
    {
        // Ambil filter dari request
        $prodi = $request->input('prodi');
        $universitas = $request->input('universitas');
        $search = $request->input('search');

        // Query data yang sesuai dengan filter
        $query = Pddikti::query();

        if ($universitas) {
            $query->where('nm_lemb', $universitas);
        }

        if ($prodi) {
            $query->where('nm_prodi', $prodi);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nm_pd', 'LIKE', "%$search%")
                    ->orWhere('nipd', 'LIKE', "%$search%");
            });
        }
        // Ekspor data yang sudah difilter ke dalam Excel
        return Excel::download(new PddiktiExport($query->get()), 'pddikti_filtered.xlsx');
    }

    public function showImportForm()
    {
        return view('pddikti.import');
    }

    public function import(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file');
        $import = new PddiktiImport;

        Excel::import($import, $file);

        ImportHistory::create([
            'file_name' => $file->getClientOriginalName(),
            'total_rows' => $import->getTotalRows(), // Implement this method in your import class
            'successful_imports' => $import->getSuccessfulImports(), // Implement this method
            'failed_imports' => $import->getFailedImports(), // Implement this method if necessary
            'status' => 'Completed',
        ]);

        return back()->with('success', 'File imported successfully.');
    }

    public function show($id_pd)
    {
        $mahasiswa = Pddikti::where('id_pd', $id_pd)->firstOrFail();
        $masaStudi = $mahasiswa->masa_studi;
        return view('pddikti.detail', compact('mahasiswa', 'masaStudi',));
    }
}
