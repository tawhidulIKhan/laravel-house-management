<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['type', 'name', 'src', 'extension', 'description', 'path', 'mediable_id', 'mediable_type'];

    public function __toString()
    {
        return $this->src;
    }

    public function mediable()
    {
        return $this->morphTo();
    }

}
