<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTechnology extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'technology_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'project_id' => 'integer',
        'technology_id' => 'integer',
    ];
}
