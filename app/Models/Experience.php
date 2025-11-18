<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_year',
        'leave_year',
        'is_running',
        'office_name',
        'description',
        'website_url',
        'position',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
