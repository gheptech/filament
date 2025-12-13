<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MegaMenuGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'mega_menu_id',
        'title',
        'order',
        'active',
    ];

    public function megaMenu()
    {
        return $this->belongsTo(MegaMenu::class);
    }

    public function items()
    {
        return $this->hasMany(MegaMenuItem::class)
            ->orderBy('order')
            ->where('active', true);
    }
}