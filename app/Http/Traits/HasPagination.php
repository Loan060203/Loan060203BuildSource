<?php
namespace App\Http\Traits;


trait HasPagination
{
    public function getPerPage(): int
    {
        $perPage = (int) request()->query('perPage');
        return $perPage >= 1 && $perPage <= 100 ? $perPage : 20;
    }

    public function getPage(): int
    {
        $page = (int) request()->query('page');
        return $page > 0 ? $page : 1;
    }
}
