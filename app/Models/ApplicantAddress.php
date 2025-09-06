<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantAddress extends Model
{
    use HasFactory;

    protected $table = 'applicant_addresses';

    protected $fillable = [
        'applicant_id',
        'address',
        'type',
    ];

    /**
     * Get the applicant that owns the address.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
