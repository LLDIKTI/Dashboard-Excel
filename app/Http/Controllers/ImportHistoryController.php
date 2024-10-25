<?php

namespace App\Http\Controllers;

use App\Models\ImportHistory;
use Illuminate\Http\Request;

class ImportHistoryController extends Controller
{
    public function index()
    {
        $histories = ImportHistory::orderBy('created_at', 'desc')->get();
        return view('import_history.index', compact('histories'));
    }
}
