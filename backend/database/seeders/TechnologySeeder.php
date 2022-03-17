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
                'name' => 'Tailwind CSS',
                'type_id' => Type::firstWhere('name', 'Languages & Frameworks')->id,
                'state_id' => State::firstWhere('name', 'Assess')->id,
                'description' => 'A utility-first CSS framework packed with classes like flex, pt-4, text-center and rotate-90 that can be composed to build any design, directly in your markup.',
                'description_classification' => 'Our developers have continued to be productive with Tailwind CSS and are impressed with its ability to scale with large teams and codebases. Tailwind CSS offers an alternative approach to CSS tools and frameworks that reduces complexity through lower-level utility CSS classes. The Tailwind CSS classes can easily be customized to suit any customer\'s visual identity. We\'ve also found that it pairs particularly well with Headless UI. Tailwind CSS allows you to avoid writing any classes or CSS on your own which leads to a more maintainable codebase in the long term. It seems that Tailwind CSS offers the right balance between reusability and customization to create visual components.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'John Doe')->id,
            ],
            [
                'name' => 'Python',
                'type_id' => Type::firstWhere('name', 'Languages & Frameworks')->id,
                'state_id' => State::firstWhere('name', 'Adopt')->id,
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
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'Backstage',
                'type_id' => Type::firstWhere('name', 'Platforms')->id,
                'state_id' => State::firstWhere('name', 'Adopt')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'ClickHouse',
                'type_id' => Type::firstWhere('name', 'Platforms')->id,
                'state_id' => State::firstWhere('name', 'Trial')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'GitHub Actions',
                'type_id' => Type::firstWhere('name', 'Platforms')->id,
                'state_id' => State::firstWhere('name', 'Assess')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'Vercel',
                'type_id' => Type::firstWhere('name', 'Platforms')->id,
                'state_id' => State::firstWhere('name', 'Hold')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'fastlane',
                'type_id' => Type::firstWhere('name', 'Tools')->id,
                'state_id' => State::firstWhere('name', 'Adopt')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'Airflow',
                'type_id' => Type::firstWhere('name', 'Tools')->id,
                'state_id' => State::firstWhere('name', 'Trial')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'Dive',
                'type_id' => Type::firstWhere('name', 'Tools')->id,
                'state_id' => State::firstWhere('name', 'Trial')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'Lens',
                'type_id' => Type::firstWhere('name', 'Tools')->id,
                'state_id' => State::firstWhere('name', 'Hold')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'AR spatial anchors',
                'type_id' => Type::firstWhere('name', 'Technology')->id,
                'state_id' => State::firstWhere('name', 'Hold')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'Single team remote wall',
                'type_id' => Type::firstWhere('name', 'Technology')->id,
                'state_id' => State::firstWhere('name', 'Hold')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
                'status' => 'published',
                'user_id' => User::firstWhere('name', 'Jane Doe')->id,
            ],
            [
                'name' => 'Team cognitive load',
                'type_id' => Type::firstWhere('name', 'Technology')->id,
                'state_id' => State::firstWhere('name', 'Assess')->id,
                'description' => 'JavaScript is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm. It has an object-oriented, dynamic, and interpreted nature.',
                'description_classification' => 'As the focus on improving the developer experience and efficiency increases across organizations, we\'re seeing Backstage rise in popularity, alongside the adoption of developer portals. These organizations are looking to support and streamline their development environments. As the number of tools and technologies increases, some form of standardization is becoming increasingly important for consistency so that developers can focus on innovation and product development instead of getting bogged down with reinventing the wheel.',
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
