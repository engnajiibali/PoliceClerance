<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persons extends Model
{
    use HasFactory;
   protected $table = 'persons';

    protected $fillable = [
        'FullName', 'Mothername', 'Gender', 'DOB', 'POB', 'Naitonality', 
        'address', 'Phone', 'Email', 'image', 'status', 'createdby','Notes'
    ];

   public function suspects() {
        return $this->hasMany(Suspect::class, 'person_id');
    }
}
