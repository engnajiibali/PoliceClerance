<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crimecase extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_number', 'title', 'description', 'date_time', 'location', 
        'latitude', 'longitude', 'reported_by', 'assigned_officer', 'status'
    ];

 public function types()
{
    return $this->belongsToMany(
        CrimeType::class,
        'crime_crime_types', // pivot table
        'crime_id',          // FK on pivot pointing to this model (crimecases.id)
        'crime_type_id'      // FK on pivot pointing to CrimeType (crime_types.id)
    );
}


    public function involvedPersons()
    {
        return $this->hasMany(InvolvedPerson::class);
    }

    public function suspects()
    {
        return $this->hasMany(Suspect::class);
    }

    public function victims()
    {
        return $this->hasMany(Victim::class);
    }

    public function witnesses()
    {
        return $this->hasMany(Witness::class);
    }

    public function evidence()
    {
        return $this->hasMany(Evidence::class);
    }
}
