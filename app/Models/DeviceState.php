<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class DeviceState extends Model
{
    protected $fillable = ['name', 'description'];

    public function devices()
    {
        return $this->hasMany('App\Models\Device');
    }
}
