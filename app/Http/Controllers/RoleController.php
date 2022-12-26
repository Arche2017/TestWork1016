<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\PermissionCreateRequest;



class RoleController extends Controller
{
    public function __construct(RoleRepository $roleRepo, UserRepository $userRepo)
     {
       $this->roleRepo = $roleRepo;
       $this->userRepo = $userRepo;
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->roleRepo->listAll();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //доступно только для пользователя с ролью 'admin'
    public function createRole()
    {
        return response()->json([
            'role' => 'testRole', 
            'token' => csrf_token()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //доступно только для пользователя с ролью 'admin'
    public function storeRole(RoleCreateRequest $request)
    {
        return $this->roleRepo->create($request->except('_token','method'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     //доступно только для пользователя с ролью 'admin'
    public function createPermission()
    {
        return response()->json([
            'role_id' => 2,
            'permission' => 'testPermission', 
            'token' => csrf_token()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //доступно только для пользователя с ролью 'admin'
    public function storePermission(PermissionCreateRequest $request)
    {
        return $this->roleRepo->addPermission($request->except('_token','method'));
    }


}
