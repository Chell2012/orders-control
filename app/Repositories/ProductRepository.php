<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductRepository  extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function search(?string $name): LengthAwarePaginator
    {
        return isset($name) ?
            $this->model::with('category')->where('name', 'LIKE', "%{$name}%")->paginate(10) :
            $this->model::with('category')->paginate(10);
    }
}
