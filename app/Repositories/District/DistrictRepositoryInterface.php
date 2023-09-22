<?php

namespace App\Repositories\District;



Interface DistrictRepositoryInterface
{
    public function getAll();

    public function getAllInPage($perPage, $currentPage);

    public function getById($id);


}
