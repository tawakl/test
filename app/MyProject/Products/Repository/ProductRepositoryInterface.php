<?php

namespace App\MyProject\Products\Repository;

interface ProductRepositoryInterface
{
    public function all();
    public function findOrFail($id);
    public function create($data);

}
