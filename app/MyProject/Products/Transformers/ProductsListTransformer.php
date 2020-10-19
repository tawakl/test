<?php


namespace App\MyProject\Products\Transformers;

use App\MyProject\Products\Product;
use League\Fractal\TransformerAbstract;

class ProductsListTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [

    ];
    protected $availableIncludes = [
    ];


    public function __construct()
    {
    }

    public function transform(Product $product)
    {
        $transformedData = [
            'id' => (int) $product->id,
            'title' => (string) $product->title,
            'description' => (string) $product->description,
            'quantity' => (string) $product->quantity,
            'category_id' => (string) $product->category->id,
        ];

        return $transformedData;
    }


}
