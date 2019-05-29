<?php

use Illuminate\Database\Seeder;
use App\Models\Device;

class AddDevice extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Device::count() === 0) {
            $devices = [
                ['name' => 'Test device 1', 'address' => 'Test address 1', 'manufacturer' => 'Espressif', 'device' => 'ESP8266', 'chip_id' => 'ABC111', 'wifi_mac' => 'aa:bb:cc:dd:ee:fa', 'state_id' => 1],
                ['name' => 'Test device 2', 'address' => 'Test address 2', 'manufacturer' => 'Espressif', 'device' => 'ESP8266', 'chip_id' => 'ABC222', 'wifi_mac' => 'aa:bb:cc:dd:ee:fb', 'state_id' => 2],
                ['name' => 'Test device 3', 'address' => 'Test address 3', 'manufacturer' => 'Espressif', 'device' => 'ESP8266', 'chip_id' => 'ABC333', 'wifi_mac' => 'aa:bb:cc:dd:ee:fc', 'state_id' => 3],
            ];

            foreach ($devices as $value) {
                Device::create($value);
            }
        }
    }
}
