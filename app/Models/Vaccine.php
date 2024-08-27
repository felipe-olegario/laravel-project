<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'batch', 'expiration_date'];

    protected $casts = [
        'expiration_date' => 'datetime',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class)->withPivot('type')->withTimestamps();
    }
}
