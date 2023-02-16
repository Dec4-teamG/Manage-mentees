<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'department',
        'status',
        'profile',
        'github',
        'image'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
