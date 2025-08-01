<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name'
    ];

    

    // ----- Relationships -----
    // 1:M
    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
