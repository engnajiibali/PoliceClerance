<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'lng', 'lat', 'state_id'];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
      public function state()
    {
        return $this->belongsTo(State::class);
    }
}
