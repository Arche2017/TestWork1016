<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

use App\Contracts\RoleRepositoryInterface;

use App\Models\Role;
use App\Models\Permission;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\RoleNotFoundException;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{

   
    public function __construct(Role $role, Permission $permission)
    {
        parent::__construct($role);
        $this->model = $role;
        $this->permission = $permission;
        $this->user=auth()->user();
    }

    //найти роль по id
    public function findRole ($id)
    {
      try {
        return $this->find($id);
      } catch (ModelNotFoundException $e) {
          throw new PostNotFoundException($e);
      }
    }
    //назначить разрешение роли
    public function addPermission ($data)
    {
      try {
        return $this->permission->create($data);
      } catch (ModelNotFoundException $e) {
          throw new PostNotFoundException($e);
      }
    }

}