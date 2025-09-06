<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Witness extends Model
{
    use HasFactory;

    protected $fillable = ['crime_id', 'person_id', 'statement'];

    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }

   public function persons()
{
    return $this->belongsTo(persons::class, 'person_id');
}
}
