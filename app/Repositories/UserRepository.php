<?php
namespace App\Repositories;

use App\Models\User;

use App\Repositories\BaseRepository;
use App\Contracts\UserRepositoryInterface;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\UserNotFoundException;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    use AuthenticatesUsers;

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->model=$user;
    }
    //назначить/изменить роль
    public function chengeRole($role_id)
    {
      try {
        $this->update(['role_id'=>$role_id]);
        return $this->model->destroy($id);
      } catch (ModelNotFoundException $e) {
          throw new UserNotFoundException($e);
      }
    }
    
}
