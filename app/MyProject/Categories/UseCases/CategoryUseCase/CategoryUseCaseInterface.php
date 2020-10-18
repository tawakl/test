<?php


namespace App\MyProject\Categories\UseCases\CategoryUseCase;


interface CategoryUseCaseInterface
{
    /**
     * @param $data
     * @param bool $isPublish
     * @return array
     */
    public function createCategory($data): array;
}
