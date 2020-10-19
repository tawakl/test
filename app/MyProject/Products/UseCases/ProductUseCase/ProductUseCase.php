<?php


namespace App\MyProject\Products\UseCases\ProductUseCase;


use App\MyProject\Products\Product;
use App\MyProject\Products\Repository\ProductRepositoryInterface;

class ProductUseCase implements ProductUseCaseInterface
{
    private $productRepository;
    private $product;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        Product $product
    )
    {
        $this->productRepository = $productRepository;
        $this->product = $product;
    }

    public function createProduct($data): array
    {
        $additionalData['title'] = $data->title;
        $additionalData['description'] = $data->description;
        $additionalData['quantity'] = $data->quantity;
        $additionalData['category_id'] = $data->category_id;


        $useCase['product'] =  $this->productRepository->create(array_merge($data->toArray(), $additionalData));
        $useCase['meta'] = [
            'message' => trans('api.product created successfully')
        ];
        $useCase['status'] = 200;
        return $useCase;
    }

}
