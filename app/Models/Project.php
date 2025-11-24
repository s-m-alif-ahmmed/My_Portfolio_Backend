<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'office_name',
        'office_logo',
        'office_web_url',
        'client_source',
        'client_name',
        'name',
        'slug',
        'thumbnail',
        'short_description',
        'start_date',
        'end_date',
        'is_office_project',
        'is_complete',
        'role',
        'challenges',
        'solutions',
        'website_url',
        'admin_dashboard_url',
        'google_play_store_url',
        'apple_store_url',
        'api_documentation_url',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'thumbnail' => 'string',
        'short_description' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_office_project' => 'boolean',
        'is_complete' => 'boolean',
        'role' => 'string',
        'challenges' => 'string',
        'solutions' => 'string',
        'website_url' => 'string',
        'admin_dashboard_url' => 'string',
        'google_play_store_url' => 'string',
        'apple_store_url' => 'string',
        'api_documentation_url' => 'string',
        'status' => 'string',
    ];

    public function office()
    {
        return $this->belongsTo(Experience::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'project_categories', 'project_id', 'category_id');
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'project_technologies', 'project_id', 'technology_id');
    }

    public function photos()
    {
        return $this->hasMany(ProjectImage::class, 'project_id');
    }


    public function keyResults()
    {
        return $this->hasMany(ProjectKeyResult::class, 'project_id');
    }

}
