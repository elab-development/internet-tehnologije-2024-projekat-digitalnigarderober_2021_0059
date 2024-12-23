<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wardrobe extends Model
{
    /** @use HasFactory<\Database\Factories\WardrobeFactory> */
    use HasFactory;

    protected $fillable = [
        'ime',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
