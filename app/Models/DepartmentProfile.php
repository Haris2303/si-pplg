<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentProfile extends Model
{
    protected $table = 'department_profiles';

    protected $guarded = ['id'];

    protected $casts = [
        'features' => 'array',
        'mision' => 'array',
        'social_media' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
