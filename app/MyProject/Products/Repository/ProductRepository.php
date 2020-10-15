<?php

namespace App\MyProject\Products\Repository;




use App\MyProject\Products\Product;

class ProductRepository implements ProductRepositoryInterface
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->getData()->orderBy('id','DESC')->paginate();
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
