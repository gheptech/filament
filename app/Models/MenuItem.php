<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    protected $fillable = [
        'menu_id',
        'parent_id',
        'label',
        'url',
        'order',
        'active',
    ];

    // Relasi ke Menu
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    // Relasi ke parent item
    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    // Relasi ke children item
    public function children(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id')
            ->where('active', true) // hanya ambil anak aktif
            ->orderBy('order');
    }
}