<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'rating',
    ];

    public function team()
    {
        return $this->belongsToMany(Team::class)->using(TeamPlayer::class);
    }
}
