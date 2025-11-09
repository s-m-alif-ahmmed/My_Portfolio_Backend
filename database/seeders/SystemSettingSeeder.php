<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemSetting::create([
            'title' => 'S M Alif Ahmmed',
            'system_name' => 'S M Alif Ahmmed',
            'email' => 'info@smalifahmmed.com',
            'number' => '01614647325',
            'logo' => null,
            'favicon' => null,
            'address' => null,
            'copyright_text' => 'Copyright 2025. All Rights Reserved. Powered by S M Alif Ahmmed.',
            'description' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
