<?php

namespace App\MyProject\Categories\Repository;



use App\MyProject\Categories\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->getData()->latest()->paginate();
    }
    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }
    public function create($data)
    {
        return $this->model->create($data);
    }

}
