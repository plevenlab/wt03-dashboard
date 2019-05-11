<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use App\Models\Device;

class DeviceController extends Controller
{

    public function getDevices($chip_id = false) {
        if($chip_id) {
            return Device::where('chip_id', $chip_id)->first();
        } else {
            return Device::all();
        }
    }

}
