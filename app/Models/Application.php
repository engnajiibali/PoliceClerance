<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'application_type',
        'application_date',
        'status',
        'priority',
        'remarks',
        'officer_id',
        'branch_id',
    ];

    // Relationships
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function officer()
    {
        return $this->belongsTo(User::class, 'officer_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

     // Relation to Certificate (one-to-one)
    public function certificate()
    {
        return $this->hasOne(Certificate::class, 'application_id');
    }


}
