<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicants';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'gender',
        'national_id',
        'passport_no',
        'phone',
        'email',
        'address',
        'photo_path',
        'region_id',
        'district_id',
        'branch_id',
    ];

    // Relationships
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function addresses()
{
    return $this->hasMany(ApplicantAddress::class);
}

    // Relation to Applications
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
