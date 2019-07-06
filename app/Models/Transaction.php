<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['type', 'amount', 'description', 'room_id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
