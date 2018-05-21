<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Routing\Controller;
use Yajra\Datatables\Facades\Datatables;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Http\Requests\ManageProductRequest;

class ProductTableController extends Controller
{
    /**
     * @var ProductRepository
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
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProductRequest $request)
    {
        return Datatables::of($this->product->getForDataTable())
            ->addColumn('status', function ($product) {
                if($product->status)
                    return '<label class="label label-success">Active</label>';

                return '<label class="label label-danger">Inactive</label>';
                })
            ->addColumn('actions', function ($product) {
                return $product->action_buttons;
            })
            ->rawColumns(['status','actions'])
            ->make(true);
    }
}
