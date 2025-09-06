<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fingers extends Model
{
	protected $casts = [
        'fingers' => 'array', // Automatically casts JSON to array
    ];
    use HasFactory;
}
