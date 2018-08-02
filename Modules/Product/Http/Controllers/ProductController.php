<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\ManageProductRequest;
use Modules\Product\Http\Requests\CreateProductRequest;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Product\Http\Requests\ShowProductRequest;
use Modules\Product\Repositories\ProductRepository;
use SendPulse;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     * @var CategoryRepository
     */
    protected $product;

    /**
     * @param ProductRepository $product
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('product::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = new Product($request->except('_token','_method'));
        $this->product->create($product);
        return redirect()->route('admin.product.index')->withFlashSuccess(trans('product::alerts.backend.product.created'));
    }

    /**
     * @param Product              $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function edit(Product $product, ManageProductRequest $request)
    {
        $product->manufacture_date = date("d-m-Y", strtotime($product->manufacture_date)); 
        $product->expired_date = date("d-m-Y", strtotime($product->expired_date)); 
        return view('product::edit')
            ->withProduct($product);
    }

    /**
     * @param Product              $product
     * @param UpdateProductRequest $request
     *
     * @return mixed
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $this->product->update($product,$request->except('_token','_method'));

        return redirect()->route('admin.product.index')->withFlashSuccess(trans('product::alerts.backend.product.updated'));
    }

    /**
     * @param Product              $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function show(Product $product, ShowProductRequest $request)
    {
        // $message = ['title' => 'My first notification', 'website_id' => 1, 'body' => 'I am the body of the push message'];

        // SendPulse::createPushTask($message);
        return view('product::show')->withProduct($product);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Product $product)
    {
        $this->product->delete($product);

        return redirect()->route('admin.product.index')->withFlashSuccess(trans('product::alerts.backend.product.deleted'));
    }
}