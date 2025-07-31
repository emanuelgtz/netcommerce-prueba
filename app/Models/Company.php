<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    // ----- Relationships -----
    // 1:M
    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
