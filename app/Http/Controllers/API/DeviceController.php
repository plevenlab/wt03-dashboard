<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Device;

class DeviceController extends Controller
{
    public function getDevices()
    {
        return Device::with('state')->get();
    }

    public function getDeviceById($id)
    {
        return Device::with('state')->get()->find($id);
    }

    public function getDeviceByMac($mac)
    {
        return Device::with('state')->where('wifi_mac', $mac)->get()->first();
    }
}
