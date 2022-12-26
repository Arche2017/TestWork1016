<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\PostRepository;
use App\Contracts\PostRepositoryInterface;

use App\Repositories\UserRepository;
use App\Contracts\UserRepositoryInterface;

use App\Repositories\RoleRepository;
use App\Contracts\RoleRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );
    }

}
