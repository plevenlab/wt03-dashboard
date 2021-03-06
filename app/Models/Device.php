<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $manufacturer
 * @property string $device
 * @property string $chip_id
 * @property string $wifi_mac
 * @property int $state_id
 * @property string $created_at
 * @property string $updated_at
 */
class Device extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'address', 'manufacturer', 'device', 'chip_id', 'wifi_mac', 'state_id', 'created_at', 'updated_at'];

    public function state()
    {
        return $this->belongsTo('App\Models\DeviceState');
    }
}
