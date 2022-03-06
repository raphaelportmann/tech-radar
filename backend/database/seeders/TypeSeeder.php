<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Technology',
            ],
            [
                'name' => 'Tools',
            ],
            [
                'name' => 'Platforms',
            ],
            [
                'name' => 'Languages & Frameworks',
            ]
        ];
        foreach ($types as $type) {
            if (Type::firstWhere('name', $type['name']) === null) {
                Type::create($type);
            }
        }
    }
}
