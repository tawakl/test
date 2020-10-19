<?php


namespace App\MyProject\Categories\Transformers;

use App\MyProject\Categories\Category;
use League\Fractal\TransformerAbstract;

class CategoriesListTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [

    ];
    protected $availableIncludes = [
    ];


    public function __construct()
    {
    }

    public function transform(Category $category)
    {
        $transformedData = [
            'id' => (int) $category->id,
            'title' => (string) $category->title,
            'description' => (string) $category->description,
        ];

        return $transformedData;
    }


}
