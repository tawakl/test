<?php

namespace App\MyProject\Categories\Controllers;
use App\MyProject\Categories\Category;
use App\MyProject\Categories\Repository\CategoryRepositoryInterface;
use App\MyProject\Categories\Requests\CreateCategoriesRequest;
use App\MyProject\Categories\Requests\UpdateCategoriesRequest;
use App\Http\Controllers\Controller;


class CategoriesController extends Controller
{
    public $model;
    public $module;
    private $repository;

    public function __construct(Category $model ,CategoryRepositoryInterface $categoryRepository)
    {
        $this->module = 'categories';
        $this->title = trans('app.Categories');
        $this->model = $model;
        $this->repository = $categoryRepository;

    }
    public function getIndex()
    {
        $data['module'] = $this->module;
        $data['page_title'] = trans('categories.List categories');
        $data['rows'] = $this->repository->all();
        return view('admin.'.$this->module . '.index', $data);
    }


    public function getCreate()
    {
        $data['module'] = $this->module;
        $data['page_title'] = trans('app.Create') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => route('categories')];
        $data['row'] = $this->model;
        return view('admin.'.$this->module . '.create', $data);

    }

    public function postCreate(CreateCategoriesRequest $request)
    {
        $data['module'] = $this->module;
        $data = $request->except(['_token']);

        if ($row = $this->repository->create($data)) {
//            flash()->success(trans('app.Created successfully'));
            return redirect( '/' . $this->module );
        }
//        flash()->error(trans('app.failed to save'));
        return back();
    }


    public function getEdit($id) {
        $data['module'] = $this->module;
        $data['page_title'] = trans('app.Edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module];
        $data['row'] = $this->repository->findOrFail($id);
        return view('admin.'.$this->module . '.edit', $data);
    }

    public function postEdit(UpdateCategoriesRequest $request , $id) {
        $row = $this->repository->findOrFail($id);
        if ($row->update($request->except(['_token','_method']))) {
//            flash(trans('app.Update successfully'))->success();
            return redirect( '/' . $this->module );
        }
    }

    public function getDelete($id)
    {
        $row = $this->repository->findOrFail($id);
        $row->delete();
//        flash()->success(trans('app.Deleted Successfully'));
        return back();
    }

}
