<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = Technology::all();
        foreach ($technologies as $technology) {
            $technology->update([
                'slug' => Str::slug($technology->name)
            ]);
        }
    }
}
