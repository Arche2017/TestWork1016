<?php
namespace App\Repositories;
use App\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
   
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function listAll()
    {
        return $this->model->all();
    }
   
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
  
    public function update(array $data) : bool
    {
        return $this->model->update($data);
    }
   
    public function all($columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }
    
    public function find($id)
    {
        return $this->model->find($id);
    }
    
    public function findOneOrFail($id)
    {
        return $this->model->findOrFail($id);
    }
    
    public function findBy(array $data)
    {
        return $this->model->where($data)->get();
    }
    
    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }
    
    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }
    
    public function delete() : bool
    {
        return $this->model->delete();
    }
   

}
