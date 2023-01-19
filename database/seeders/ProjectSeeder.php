<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Functions\Helpers;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('it_IT');

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();

            $project->title = $faker->sentence(2);
            $project->description = $faker->text(400);
            $project->slug = Helpers::generateSlug($project->title);

            $project->save();
        }
    }
}
