<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biometric extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'fingerprint_template',
        'face_scan',
        'iris_scan',
    ];

    // Relationship: Biometric belongs to an Applicant
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
