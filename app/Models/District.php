<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'region_id', 'lng', 'lat'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
