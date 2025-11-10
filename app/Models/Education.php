<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_year',
        'leave_year',
        'is_running',
        'institute_name',
        'description',
        'result',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
