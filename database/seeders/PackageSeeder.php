<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = Package::all();
        foreach ($packages as $package) {
            $package->update([
                'slug' => Str::slug($package->name)
            ]);
        }
    }
}
