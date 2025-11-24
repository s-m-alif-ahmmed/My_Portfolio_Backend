<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectKeyResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'project_id' => 'integer',
        'title' => 'string',
    ];
}
