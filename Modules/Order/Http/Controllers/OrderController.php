<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Order\Entities\Order;
use Modules\Product\Entities\Product;
use Modules\Order\Http\Requests\ManageOrderRequest;
use Modules\Order\Http\Requests\CreateOrderRequest;
use Modules\Order\Http\Requests\UpdateOrderRequest;
use Modules\Order\Http\Requests\ShowOrderRequest;
use Modules\Order\Repositories\OrderRepository;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     * @var CategoryRepository
     */
    protected $order;

    /**
     * @param OrderRepository $order
     */
    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('order::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $all_products = Product::where('status',1)->pluck('name','id');
        return view('order::create',compact('all_products'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $order = new Order($request->except('_token','_method'));
        $this->order->save($order);
        return redirect()->route('admin.order.index')->withFlashSuccess(trans('order::alerts.backend.order.created'));
    }

    /**
     * @param Order              $order
     * @param ManageOrderRequest $request
     *
     * @return mixed
     */
    public function edit(Order $order, ManageOrderRequest $request)
    {
        return view('order::edit')
            ->withOrder($order);
    }

    /**
     * @param Order              $order
     * @param UpdateOrderRequest $request
     *
     * @return mixed
     */
    public function update(Order $order, UpdateOrderRequest $request)
    {
        $this->order->update($order,$request->except('_token','_method'));

        return redirect()->route('admin.order.index')->withFlashSuccess(trans('order::alerts.backend.order.updated'));
    }

    /**
     * @param Order              $order
     * @param ManageOrderRequest $request
     *
     * @return mixed
     */
    public function show(Order $order, ShowOrderRequest $request)
    {
        return view('order::show')->withOrder($order);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Order $order)
    {
        $this->order->delete($order);

        return redirect()->route('admin.order.index')->withFlashSuccess(trans('order::alerts.backend.order.deleted'));
    }
}