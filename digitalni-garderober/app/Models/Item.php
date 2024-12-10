<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;
    protected $fillable = [
        'ime',
        'kategorija',
        'boja',
        'temperatura',
        'slika',
        'garderober_id',
    ];

    public function wardrobe()
    {
        return $this->belongsTo(Wardrobe::class);
    }
    public function outfit()
    {
        return $this->belongsToMany(Outfit::class,'outfit_item');
    }
}
