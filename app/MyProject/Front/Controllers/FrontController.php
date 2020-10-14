<?php

namespace App\MyProject\Front\Controllers;

use App\Http\Controllers\Controller;
use App\MyProject\Categories\Category;
use App\MyProject\Products\Product;

class FrontController extends Controller {
    public $module;
    public $product;
    public $category;

    public function __construct(Product $product,Category $category) {
        $this->module='front.home';
        $this->product = $product;
        $this->category = $category;

    }

    public function getIndex() {
        $data = [];
        $data['products']= $this->product->all();
        $data['categories']= $this->category->all();
        return view($this->module, $data);
    }

}
