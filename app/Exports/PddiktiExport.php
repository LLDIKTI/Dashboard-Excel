<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Schema;

class PddiktiExport implements FromCollection, WithHeadings
{
    protected $filteredData;

    public function __construct($filteredData)
    {
        $this->filteredData = $filteredData;
    }

    /**
     * Return the collection that will be exported
     */
    public function collection()
    {
        return $this->filteredData;
    }

    // Mengambil nama kolom
    public function headings(): array
    {
        return Schema::getColumnListing((new \App\Models\Pddikti())->getTable());
    }
}
