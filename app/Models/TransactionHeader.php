<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $table = 'transaction_headers';

	protected $fillable = [
        'user_id',
        'transaction_date',
        'total_item'
	];

    public function user(){
		return $this->belongsTo(User::class);
	}

	public function details(){
		return $this->hasMany(TransactionDetail::class);
	}
}
