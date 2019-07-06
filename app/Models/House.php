<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['name', 'address', 'owner_id', 'image_id'];

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function __toString()
    {
        return $this->name;
    }

    public function photo()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    public function getTotalRoomAttribute()
    {
        $total = $this->rooms->count();

        return $total > 0 ? $total : 'N/A';
    }

}
