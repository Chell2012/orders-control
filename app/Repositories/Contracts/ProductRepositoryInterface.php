<?php
namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function search(?string $name);
    public function find(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
