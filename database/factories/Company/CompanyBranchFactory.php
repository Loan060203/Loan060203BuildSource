<?php

namespace Database\Factories\Company;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\CompanyTypeEnum;
use App\Models\Company\CompanyBranch;
use App\Models\User;
use Faker\Generator as Faker;


class CompanyBranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyBranch::class;

    public function definition(): array
    {
        $url = $this->faker->url;
        $trimUrl = strlen($url) > 99 ? substr($url, 0, 95) . "..." : $url;

        return [
            //
            'classification' => CompanyTypeEnum::OTHER,
            'code' => $this->faker->countryCode,
            'name' => $this->faker->company,
            'post' => $this->faker->numerify('########'),
            'address' => $this->faker->address,
            'tel1' => $this->faker->numerify('#############'),
            'tel2' => $this->faker->numerify('#############'),
            'fax' => $this->faker->postcode,
            'contact_name' => $this->faker->name,
            'url' => $trimUrl,
            'dsp_ord_num' => $this->faker->numberBetween(0, 99999),
            'remark' => $this->faker->text,
            'idv_mgmt' => $this->faker->boolean,
            'use_flg' => $this->faker->boolean,
            'created_by' => $this->faker->unique()->numerify('####'),
            'updated_by' => $this->faker->unique()->numerify('##'),
            'created_at' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+1 months'),
            'updated_at' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+2 months')
        ];
    }
}
