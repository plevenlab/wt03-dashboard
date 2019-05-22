<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceState extends Model
{
    protected $fillable = ['name', 'description'];

    public function devices()
    {
        return $this->hasMany('App\Models\Device');
    }
}
