<?php
namespace App\Contracts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    public function create(array $attributes);
    public function update(array $attributes) : bool;
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc');
    public function find($id);
    public function findOneOrFail($id);
    public function findBy(array $data);
    public function findOneBy(array $data);
    public function findOneByOrFail(array $data);
    public function delete() : bool;
   
}
