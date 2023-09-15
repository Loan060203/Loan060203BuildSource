<?php

namespace Database\Seeders;


use App\Models\Company\CompanyBranch;
use Illuminate\Database\Seeder;





class CompanyBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyBranch::factory()->count(20)->create();
    }
}
