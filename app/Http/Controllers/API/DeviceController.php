<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Device;

class DeviceController extends Controller
{
    public function getDevices($chip_id = false)
    {
        if ($chip_id) {
            return Device::where('chip_id', $chip_id)->first();
        } else {
            return Device::with('state')->get();
        }
    }
}
