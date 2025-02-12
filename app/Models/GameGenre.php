<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameGenre extends Model
{
    use HasFactory;

    protected $table = 'game_genres';

	protected $fillable = [
		'genre',
        'created_at'
	];

    public function game(){
        return $this->hasMany(Game::class);
    }
}
