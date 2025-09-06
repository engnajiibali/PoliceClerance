<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'amount',
        'currency',
        'payment_method',
        'transaction_id',
        'payment_date',
        'status',
    ];

    // Relationship to Application
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
