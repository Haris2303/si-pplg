<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // 1. Casting JSON & Array (PENTING!)
    protected $casts = [
        'subjects' => 'array',
    ];

    // 2. Relasi ke User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
