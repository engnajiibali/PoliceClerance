<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    // Table name (optional if Laravel naming convention is followed)
    protected $table = 'certificates';

    // Fillable fields for mass assignment
    protected $fillable = [
        'application_id',
        'certificate_number',
        'issue_date',
        'expiry_date',
        'qr_code_path',
        'status',
        'digital_signature',
    ];

    // Relationships
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
