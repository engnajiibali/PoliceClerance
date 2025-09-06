<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeType extends Model
{
    use HasFactory;

    protected $table = 'crime_types';

    protected $fillable = ['name', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(CrimeCategory::class, 'category_id');
    }

    public function crimes()
    {
        return $this->belongsToMany(
            Crimecase::class,        // Related model
            'crime_crime_types',     // Pivot table
            'crime_type_id',         // FK on pivot pointing to this model
            'crimecase_id'           // FK on pivot pointing to Crimecase
        );
    }
}
