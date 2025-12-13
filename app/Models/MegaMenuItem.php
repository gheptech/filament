<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MegaMenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'label',
        'url',
        'icon',
        'description',
        'order',
        'active',
    ];

    public function group()
    {
        return $this->belongsTo(MegaMenuGroup::class);
    }
}