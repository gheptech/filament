<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan hanya ada satu record
        if (! SiteSetting::exists()) {
            SiteSetting::create([
                'site_name'     => 'My Website',
                'company_name'  => 'My Company',
                'logo'          => 'default-logo.png',
                'tagline'       => '-',
                'address'       => '-',
                'phone'         => '-',
                'email'         => 'info@example.com',
                'facebook'      => 'www.facebook.com',
                'instagram'     => 'www.instagram.com',
                'youtube'       => 'www.youtube.com',
                'linked'      => '-',
            ]);
        }
    }
}