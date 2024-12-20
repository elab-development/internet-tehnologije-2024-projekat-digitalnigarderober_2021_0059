<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    /** @use HasFactory<\Database\Factories\OutfitFactory> */
    use HasFactory;

    protected $fillable = [
        'ime'=>$this->ime,
        'datum'=>$this->datum,
        'temperatura'=>$this->temperatura,
        'dogadjaj'=>$this->dogadjaj,
        'user_id'=>$this->user_id,
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
