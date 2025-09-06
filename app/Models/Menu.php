<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
  
    // Relationship for submenus
 public function subMenus()
    {
        return $this->hasMany(SubMenu::class, 'menu_id');
    }
}
