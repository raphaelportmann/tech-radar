<?php

namespace Database\Seeders;

use App\Models\State;
use App\Models\Technology;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            [
                'name' => 'Java',
                'type_id' => Type::firstWhere('name', 'Languages & Frameworks')->id,
                'state_id' => State::firstWhere('name', 'Hold')->id,
                'description' => 'Java is a general-purpose computer programming language that is concurrent, class-based, object-oriented and specifically designed to have as few implementation dependencies as possible. It is intended to let application developers "write once, run anywhere" (WORA), meaning that code that runs on one platform does not need to be recompiled to run on another platform.',
                'description_classification' => 'This because that.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'John Doe')->id,
            ],
            [
                'name' => 'Python',
                'type_id' => Type::firstWhere('name', 'Languages & Frameworks')->id,
                'state_id' => State::firstWhere('name', 'Assess')->id,
                'description' => 'Python is a widely used high-level programming language for general-purpose programming, created by Guido van Rossum and first released in 1991. Python has a design philosophy which emphasizes code readability, notably using significant whitespace. It provides constructs that enable clear programming on both small and large scales. In July 2018, Van Rossum stepped down as the current project leader, and continued to maintain the language as a community-based project, under the name CPython.',
                'status' => 'draft',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'PHP',
                'type_id' => Type::firstWhere('name', 'Languages & Frameworks')->id,
                'description' => 'PHP is a general-purpose programming language originally designed for web development to produce dynamic web pages. PHP is now used primarily on the server side for web development, but is also used on the client side for web application development. PHP is now installed on most web servers, and can be embedded into HTML pages. PHP is also used to create dynamic web pages, web applications, and web services.',
                'status' => 'draft',
                'user_id' => User::firstWhere('name', 'John Doe')->id,
            ],
            [
                'name' => 'JavaScript',
                'type_id' => Type::firstWhere('name', 'Languages & Frameworks')->id,
                'state_id' => State::firstWhere('name', 'Adopt')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
        ];
        foreach ($technologies as $technology) {
            if (Technology::firstWhere('name', $technology['name']) === null) {
                Technology::create($technology);
            }
        }
    }
}
