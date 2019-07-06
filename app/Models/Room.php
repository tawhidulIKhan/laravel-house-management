<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['no', 'rent', 'house_id', 'image_id'];

    public function house()
    {
       return $this->belongsTo( House::class,'house_id');
    }

    public function __toString()
    {
        return $this->no;
    }

    public function renter()
    {
       return $this->hasOne(Renter::class);
    }

    public function photo()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

}
