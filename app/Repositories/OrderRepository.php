<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function search(?string $name): LengthAwarePaginator
    {
        return isset($name) ?
            $this->model::with('product')->where('customer_name', 'LIKE', "%{$name}%")->paginate(10) :
            $this->model::query()->paginate(10);
    }
}
