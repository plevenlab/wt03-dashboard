<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DeviceState;

class AddDeviceStates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['name' => 'New', 'description' => 'Newly discovered device, still haven\'t been provisioned'],
            ['name' => 'Accepted', 'description' => 'Provisioned device'],
            ['name' => 'Rejected', 'description' => 'Rejected device']
        ];

        foreach ($states as $key => $value) {
            DeviceState::create($value);
        }
    }
}
