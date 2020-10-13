<?php

namespace App\MyProject\Categories;


use App\MyProject\BaseApp\BaseModel;
use App\MyProject\Posts\Post;

class Category extends BaseModel
{
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable =
        [
            'title',
            'description'
        ];



//    public function product()
//    {
//        return $this->hasMany(Product::class);
//    }



}
