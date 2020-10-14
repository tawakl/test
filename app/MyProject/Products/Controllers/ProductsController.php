<?php

namespace App\MyProject\Products\Controllers;
use App\MyProject\Categories\Category;
use App\MyProject\Categories\Repository\CategoryRepositoryInterface;
use App\MyProject\Categories\Requests\CreateCategoriesRequest;
use App\MyProject\Categories\Requests\UpdateCategoriesRequest;
use App\Http\Controllers\Controller;
use App\MyProject\Products\Product;
use App\MyProject\Products\Repository\ProductRepositoryInterface;
use App\MyProject\Products\Requests\CreateProductsRequest;
use App\MyProject\Products\Requests\UpdateProductsRequest;


class ProductsController extends Controller
{
    public $model;
    public $module;
    private $repository;

    public function __construct(Product $model ,ProductRepositoryInterface $productRepository)
    {
        $this->module = 'products';
        $this->title = trans('app.Products');
        $this->model = $model;
        $this->repository = $productRepository;

    }
    public function getIndex()
    {
        $data['module'] = $this->module;
        $data['page_title'] = trans('products.List products');
        $data['rows'] = $this->repository->all();
        return view('admin.'.$this->module . '.index', $data);
    }


    public function getCreate()
    {
        $data['module'] = $this->module;
        $data['page_title'] = trans('app.Create') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => route('products')];
        $data['row'] = $this->model;
        return view('admin.'.$this->module . '.create', $data);

    }

    public function postCreate(CreateProductsRequest $request)
    {
        $data['module'] = $this->module;
        $data = $request->except(['_token']);

        if ($row = $this->repository->create($data)) {
            return redirect( '/' . $this->module )->with('success','app.Created successfully');
        }
        return back()->with('error','app.failed to save');
    }


    public function getEdit($id) {
        $data['module'] = $this->module;
        $data['page_title'] = trans('app.Edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module];
        $data['row'] = $this->repository->findOrFail($id);
        return view('admin.'.$this->module . '.edit', $data);
    }

    public function postEdit(UpdateProductsRequest $request , $id) {
        $row = $this->repository->findOrFail($id);
        if ($row->update($request->except(['_token','_method']))) {
            return redirect( '/' . $this->module )->with('success','app.Update successfully');
        }
    }

    public function getDelete($id)
    {
        $row = $this->repository->findOrFail($id);
        $row->delete();
        return back()->with('success','app.Deleted successfully');
    }

}
