<?php

namespace Database\Seeders;

use App\Models\Company\CompanyBranch;
use App\Models\District;
use Database\Seeders\CompanyBranchSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            //CompanySeeder::class,
            CompanyBranchSeeder::class,
            //DistrictSeeder::class,
            ]);
    }
}
