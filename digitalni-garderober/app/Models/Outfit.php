<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    /** @use HasFactory<\Database\Factories\OutfitFactory> */
    use HasFactory;

    protected $fillable = [
        'ime',
        'datum',
        'temperatura',
        'dogadjaj',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function item()
    {
        return $this->belongsToMany(Item::class, 'outfit_item');
    }

}
