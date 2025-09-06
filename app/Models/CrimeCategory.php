<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function crimeTypes()
    {
        return $this->hasMany(CrimeType::class, 'category_id');
    }
}
