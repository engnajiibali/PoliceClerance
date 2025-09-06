<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'full_name',
        'national_id',
        'phone',
        'relationship',
        'address',
    ];

    // Relationship: Guarantor belongs to an Application
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
