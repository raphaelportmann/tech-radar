<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [
                'name' => 'Hold',
            ],
            [
                'name' => 'Assess',
            ],
            [
                'name' => 'Trial',
            ],
            [
                'name' => 'Adopt',
            ],
        ];
        foreach ($states as $state) {
            if (State::firstWhere('name', $state['name']) === null) {
                State::create($state);
            }
        }
    }
}
