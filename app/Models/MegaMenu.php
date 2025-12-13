<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MegaMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'active',
    ];

    public function groups()
    {
        return $this->hasMany(MegaMenuGroup::class)
            ->orderBy('order')
            ->where('active', true);
    }
}