<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id', 'name', 'address'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function managers()
    {
        return $this->hasMany(BranchManager::class);
    }
}
