<?php

namespace App\Models;

use AlifAhmmed\HelperPackage\Traits\AllTraits;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory, AllTraits;

    protected $fillable = [
        'title',
        'email',
        'number',
        'system_name',
        'address',
        'copyright_text',
        'logo',
        'favicon',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getLogoAttribute($value){
        return $this->fullImageUrlForApi($value);
    }

    public function getFaviconAttribute($value){
        return $this->fullImageUrlForApi($value);
    }

    protected static function booted()
    {
        static::updating(function ($systemSetting) {
            if ($systemSetting->isDirty('favicon')) {
                $oldImage = $systemSetting->getOriginal('favicon');
                if ($oldImage) {
                    $systemSetting->deleteFromPublic($systemSetting, 'favicon');
                }
            }
            if ($systemSetting->isDirty('logo')) {
                $oldImage = $systemSetting->getOriginal('logo');
                if ($oldImage) {
                    $systemSetting->deleteFromPublic($systemSetting, 'logo');
                }
            }
        });
    }

}
