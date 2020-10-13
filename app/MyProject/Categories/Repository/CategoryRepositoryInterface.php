<?php

namespace App\MyProject\Categories\Repository;

interface CategoryRepositoryInterface
{
    public function all();
    public function findOrFail($id);
    public function create($data);

}
