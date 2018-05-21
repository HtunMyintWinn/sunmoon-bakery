<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Routing\Controller;
use Yajra\Datatables\Facades\Datatables;
use Modules\Shop\Repositories\ShopRepository;
use Modules\Shop\Http\Requests\ManageShopRequest;

class ShopTableController extends Controller
{
    /**
     * @var ShopRepository
     */
    protected $shop;

    /**
     * @param ShopRepository $shop
     */
    public function __construct(ShopRepository $shop)
    {
        $this->shop = $shop;
    }

    /**
     * @param ManageShopRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageShopRequest $request)
    {
        return Datatables::of($this->shop->getForDataTable())
            ->addColumn('status', function ($shop) {
                return $shop->status_label;
            })
            ->addColumn('actions', function ($shop) {
                return $shop->action_buttons;
            })
            ->rawColumns(['status','actions'])
            ->make(true);
    }
}
