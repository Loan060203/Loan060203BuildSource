<?php

namespace Database\Seeders;

use App\Models\Company\Company;
use App\Models\Company\CompanyBranch;
use App\Models\Staff\Staff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CompanyBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @return void
     */
    public function run(): void
    {
        $companyIds = Company::pluck('id')->all();

        if (!empty($companyIds)) {
            foreach ($companyIds as $companyId) {
                CompanyBranch::factory()->count(20)->create([
                    'company_id' => $companyId,
                ]);
            }
        }

        //CompanyBranch::truncate();

    }
}
