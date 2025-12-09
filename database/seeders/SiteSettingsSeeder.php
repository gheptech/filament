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
                'address'       => 'Alamat belum diisi',
                'phone'         => '-',
                'email'         => 'info@example.com',
                'facebook'      => '-',
                'instagram'     => '-',
                'youtube'       => '-',
                'linked'      => '-',
            ]);
        }
    }
}