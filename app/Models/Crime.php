<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'phone',
        'status',
        'description',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}

