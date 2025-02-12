<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

	protected $fillable = [
		'gametitle',
        'gameimage',
        'gameprice',
        'gamedescription',
        'gamepegirating',
        'gamegenre_id'
	];

    public function gamegenre() {
        return $this->belongsTo(GameGenre::class);
    }

    public function carts(){
		return $this->hasMany(Cart::class);
	}
}
