<?php

namespace App\MyProject\Products\Controllers\Api;


use App\MyProject\BaseApp\Api\BaseApiController;
use App\MyProject\Products\Product;
use App\MyProject\Products\Repository\ProductRepositoryInterface;
use App\MyProject\Products\Requests\ProductsRequest;
use App\MyProject\Products\Transformers\ProductsListTransformer;
use App\MyProject\Products\Transformers\ProductTransformer;
use App\MyProject\Products\UseCases\ProductUseCase\ProductUseCaseInterface;
use Illuminate\Support\Facades\Log;
use Swis\JsonApi\Client\Interfaces\ParserInterface;
use Illuminate\Http\Request;


class ProductsApiController extends BaseApiController
{
    public $model;
    public $module;
    private $repository;
    private $parserInterface;
    private $productUseCase;


    public function __construct(
        Product $model ,
        ProductRepositoryInterface $productRepository,
        ParserInterface $parserInterface,
        ProductUseCaseInterface $productUseCase
     )
    {
        $this->module = 'products';
        $this->title = trans('app.products');
        $this->model = $model;
        $this->repository = $productRepository;
        $this->parserInterface = $parserInterface;
        $this->productUseCase = $productUseCase;


    }

    public function listAllProducts()
    {
        try {
            $products = $this->repository->all();
            return $this->transformDataMod(
                $products,
                new ProductsListTransformer(),
                'product'
            );
        } catch (\Throwable $e) {
            Log::error($e);
        }
    }

    public function createProduct(ProductsRequest $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();


        $useCase = $this->productUseCase->createProduct($data);
        if ($useCase['status'] == 200) {
            return $this->transformDataModInclude(
                $useCase['product'],
                '',
                new ProductTransformer(),
                'product',
                $useCase['meta']
            );
        } else {
            return formatErrorValidation($useCase);
        }
    }
}
