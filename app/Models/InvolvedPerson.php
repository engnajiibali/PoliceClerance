<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvolvedPerson extends Model
{
    use HasFactory;

    protected $fillable = ['crime_id', 'person_id', 'role', 'description'];

    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
