<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSetting extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'site_name',
        'company_name',
        'logo',
        'tagline',
        'address',
        'phone',
        'email',
        'facebook',
        'instagram',
        'youtube',
        'linked',
    ];

    protected static function booted()
    {
        static::updating(function ($model) {
            if ($model->isDirty('logo') && $model->getOriginal('logo')) {
                Storage::disk('public')->delete($model->getOriginal('logo'));
            }
        });
    }
}