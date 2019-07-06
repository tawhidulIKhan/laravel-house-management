<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    protected $fillable = ['total_family_members', 'address', 'user_id', 'room_id'];

    public function __toString()
    {
        return $this->user;
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

}
