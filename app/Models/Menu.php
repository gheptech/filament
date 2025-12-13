<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'slug', 'active'];

    public function items()
    {
        return $this->hasMany(MenuItem::class)
            ->where('active', true)
            ->orderBy('order');
    }
}
