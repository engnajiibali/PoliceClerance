<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationHistory extends Model
{
    use HasFactory;
 protected $table = 'application_history'; // <- specify your table name
  public $timestamps = false;
    protected $fillable = [
        'application_id',
        'old_status',
        'new_status',
        'changed_by',
        'changed_at',
        'remarks',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
