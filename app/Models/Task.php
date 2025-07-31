<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // ----- Relationships -----
    // M:1 - User model
    public function user() {
        return $this->belongsTo(User::class);
    }

    // M:1 - Company model
    public function company() {
        return $this->belongsTo(Company::class);
    }
}
