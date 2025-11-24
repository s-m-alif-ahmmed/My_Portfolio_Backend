<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_year',
        'leave_year',
        'is_running',
        'office_name',
        'logo',
        'description',
        'website_url',
        'position',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function groups():HasMany
    {
        return $this->hasMany(Project::class, 'project_id');
    }

}
