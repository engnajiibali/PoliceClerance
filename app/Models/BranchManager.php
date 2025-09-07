<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id', 'sub_branch_id', 'user_id', 'title'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function subBranch()
    {
        return $this->belongsTo(SubBranch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
