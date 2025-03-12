<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    protected $orderRepository, $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository, OrderRepositoryInterface $orderRepository)
    {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        $orders = $this->orderRepository->search($request->search);
        return response()->view('orders.index', ['orders' => $orders, 'search'=>$request->search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()->view('orders.create', ['products' => $this->productRepository->search(null)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrderRequest $request
     * @return RedirectResponse
     */
    public function store(StoreOrderRequest $request): RedirectResponse
    {
        $this->orderRepository->create(array_merge($request->validated(), ['created_at' => now()]));
        return redirect()->route('orders.index')->with('success', 'Заказ создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return response()->view('orders.show', ['order' => $this->orderRepository->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        return response()->view('orders.edit', ['order' => $this->orderRepository->find($id), 'products' => $this->productRepository->search(null)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrderRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateOrderRequest $request, int $id): RedirectResponse
    {
        $this->orderRepository->update($id, $request->validated());
        return redirect()->route('orders.index')->with('success', 'Заказ обновлён!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->orderRepository->delete($id);
        return redirect()->route('orders.index')->with('success', 'Заказ удалён!');
    }
}
