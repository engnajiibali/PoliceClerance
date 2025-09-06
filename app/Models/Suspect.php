<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspect extends Model
{
    use HasFactory;

    protected $fillable = ['crime_id', 'person_id', 'fingerprint_id', 'status','crimecase_id'];

    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }

   public function persons()
{
    return $this->belongsTo(persons::class, 'person_id');
}
}
