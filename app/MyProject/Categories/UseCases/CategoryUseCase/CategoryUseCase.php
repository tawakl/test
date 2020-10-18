<?php


namespace App\MyProject\Categories\UseCases\CategoryUseCase;


use App\MyProject\Categories\Category;
use App\MyProject\Categories\Repository\CategoryRepositoryInterface;

class CategoryUseCase implements CategoryUseCaseInterface
{
    private $categoryRepository;
    private $category;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        Category $category
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->category = $category;
    }

    public function createCategory($data): array
    {
        $additionalData['title'] = $data->title;
        $additionalData['description'] = $data->description;



        $useCase['category'] =  $this->categoryRepository->create(array_merge($data->toArray(), $additionalData));
        $useCase['meta'] = [
            'message' => trans('api.category created successfully')
        ];
        $useCase['status'] = 200;
        return $useCase;
    }

}
