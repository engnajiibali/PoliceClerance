<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    use HasFactory;

    protected $fillable = ['crime_id', 'person_id', 'injury_details'];

    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }

  public function persons()
{
    return $this->belongsTo(persons::class, 'person_id');
}
}
