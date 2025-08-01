<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'start_at',
        'expired_at',
        'user_id',
        'company_id'
    ];

    // The attributes that should be cast.
    protected $casts = [
        'start_at' => 'datetime',
        'expired_at' => 'datetime',
        'is_completed' => 'boolean',
    ];

    // ----- Relationships -----
    // M:1 - User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // M:1 - Company model
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
