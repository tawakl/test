<?php

namespace App\MyProject\Products;


use App\MyProject\BaseApp\BaseModel;
use App\MyProject\Categories\Category;

class Product extends BaseModel
{
    protected $table = 'products';
    public $timestamps = true;
    protected $fillable =
        [
            'title',
            'description',
            'quantity',
            'category_id'
        ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategories()
    {
        return Category::with('title')->pluck('title', 'id')->toArray();

    }



}
