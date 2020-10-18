<?php

namespace App\MyProject\Categories\Controllers\Api;


use App\MyProject\BaseApp\Api\BaseApiController;
use App\MyProject\Categories\Category;
use App\MyProject\Categories\Repository\CategoryRepositoryInterface;
use App\MyProject\Categories\Requests\CategoriesRequest;
use App\MyProject\Categories\Transformers\CategoriesListTransformer;
use App\MyProject\Categories\Transformers\CategoryTransformer;
use App\MyProject\Categories\UseCases\CategoryUseCase\CategoryUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Swis\JsonApi\Client\Interfaces\ParserInterface;

class CategoriesApiController extends BaseApiController
{
    public $model;
    public $module;
    private $repository;
    private $parserInterface;
    private $categoryUseCase;


    public function __construct(
        Category $model ,
        CategoryRepositoryInterface $categoryRepository,
        ParserInterface $parserInterface,
        CategoryUseCaseInterface $categoryUseCase
     )
    {
        $this->module = 'categories';
        $this->title = trans('app.Categories');
        $this->model = $model;
        $this->repository = $categoryRepository;
        $this->parserInterface = $parserInterface;
        $this->categoryUseCase = $categoryUseCase;


    }

    public function listAllCategories()
    {
        try {
            $categories = $this->repository->all();
            return $this->transformDataMod(
                $categories,
                new CategoriesListTransformer(),
                'category'
            );
        } catch (\Throwable $e) {
            Log::error($e);
        }
    }

    public function createCategory(Request $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();


        $useCase = $this->categoryUseCase->createCategory($data);
        if ($useCase['status'] == 200) {
            return $this->transformDataModInclude(
                $useCase['category'],
                '',
                new CategoryTransformer(),
                'category',
                $useCase['meta']
            );
        } else {
            return formatErrorValidation($useCase);
        }
    }
}
