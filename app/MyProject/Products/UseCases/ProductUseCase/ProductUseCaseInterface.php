<?php


namespace App\MyProject\Products\UseCases\ProductUseCase;


interface ProductUseCaseInterface
{
    /**
     * @param $data
     * @param bool $isPublish
     * @return array
     */
    public function createProduct($data): array;
}
