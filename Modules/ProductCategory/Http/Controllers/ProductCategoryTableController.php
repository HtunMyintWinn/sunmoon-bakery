<?php

namespace Modules\ProductCategory\Http\Controllers;

use Illuminate\Routing\Controller;
use Yajra\Datatables\Facades\Datatables;
use Modules\ProductCategory\Repositories\ProductCategoryRepository;
use Modules\ProductCategory\Http\Requests\ManageProductCategoryRequest;

class ProductCategoryTableController extends Controller
{
    /**
     * @var ProductCategoryRepository
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
     * @param ManageProductCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProductCategoryRequest $request)
    {
        return Datatables::of($this->productcategory->getForDataTable())
            ->addColumn('actions', function ($productcategory) {
                return $productcategory->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
