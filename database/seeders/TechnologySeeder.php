<?php

namespace Database\Seeders;

use App\Models\Technology;
use App\Functions\Helpers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $technologies = ['vue', 'js', 'bootstrap', 'laravel', 'php', 'css', 'sass', 'postman'];

        foreach ($technologies as $technology) {
            $new_technology = new Technology();

            $new_technology->name = $technology;
            $new_technology->slug = Helpers::generateSlug($new_technology->name . '-');

            $new_technology->save();
        }
    }
}
