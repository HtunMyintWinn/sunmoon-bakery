<?php

namespace Modules\ProductCategory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\ProductCategory\Entities\ProductCategory;
use Modules\ProductCategory\Http\Requests\ManageProductCategoryRequest;
use Modules\ProductCategory\Http\Requests\CreateProductCategoryRequest;
use Modules\ProductCategory\Http\Requests\UpdateProductCategoryRequest;
use Modules\ProductCategory\Http\Requests\ShowProductCategoryRequest;
use Modules\ProductCategory\Repositories\ProductCategoryRepository;

class ProductCategoryController extends Controller
{
    /**
     * @var ProductCategoryRepository
     * @var CategoryRepository
     */
    protected $productcategory;

    /**
     * @param ProductCategoryRepository $productcategory
     */
    public function __construct(ProductCategoryRepository $productcategory)
    {
        $this->productcategory = $productcategory;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('productcategory::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('productcategory::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateProductCategoryRequest $request)
    {
        $productcategory = new ProductCategory($request->except('_token','_method'));
        if(isset($productcategory->status))
         {

            $productcategory->status = 1;
         }
        else $productcategory->status = 0;
        $this->productcategory->save($productcategory);
        return redirect()->route('admin.productcategory.index')->withFlashSuccess(trans('productcategory::alerts.backend.productcategory.created'));
    }

    /**
     * @param ProductCategory              $productcategory
     * @param ManageProductCategoryRequest $request
     *
     * @return mixed
     */
    public function edit(ProductCategory $productcategory, ManageProductCategoryRequest $request)
    {
        return view('productcategory::edit',compact('productcategory'));
    }

    /**
     * @param ProductCategory              $productcategory
     * @param UpdateProductCategoryRequest $request
     *
     * @return mixed
     */
    public function update(ProductCategory $productcategory, UpdateProductCategoryRequest $request)
    {
        $this->productcategory->update($productcategory,$request->except('_token','_method'));

        return redirect()->route('admin.productcategory.index')->withFlashSuccess(trans('productcategory::alerts.backend.productcategory.updated'));
    }

    /**
     * @param ProductCategory              $productcategory
     * @param ManageProductCategoryRequest $request
     *
     * @return mixed
     */
    public function show(ProductCategory $productcategory, ShowProductCategoryRequest $request)
    {
        return view('productcategory::show',compact('productcategory'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(ProductCategory $productcategory)
    {
        $this->productcategory->delete($productcategory);

        return redirect()->route('admin.productcategory.index')->withFlashSuccess(trans('productcategory::alerts.backend.productcategory.deleted'));
    }
}