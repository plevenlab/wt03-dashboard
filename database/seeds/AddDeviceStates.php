<?php
use Illuminate\Database\Seeder;
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
        if (DeviceState::count() === 0) {
            $states = [
                ['name' => 'New', 'description' => 'Newly discovered device, still haven\'t been provisioned'],
                ['name' => 'Accepted', 'description' => 'Provisioned device'],
                ['name' => 'Rejected', 'description' => 'Rejected device']
            ];

            foreach ($states as $value) {
                DeviceState::create($value);
            }
        }
    }
}
