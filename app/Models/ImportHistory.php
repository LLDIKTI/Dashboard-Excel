<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportHistory extends Model
{
    protected $fillable = [
        'file_name',
        'total_rows',
        'successful_imports',
        'failed_imports',
        'status',
    ];
    use HasFactory;
}
