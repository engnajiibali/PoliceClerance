<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'branch_code', 'address', 'phone', 'district_id'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
