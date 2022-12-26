<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\PostRepository;
use App\Repositories\UserRepository;

use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{
    public function __construct(PostRepository $postRepo, UserRepository $userRepo)
     {
       $this->postRepo = $postRepo;
       $this->userRepo = $userRepo;
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->postRepo->listAll();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //доступно только для пользователя с ролью 'registered_user'
    public function create()
    {
        return response()->json([
            'title' => 'title', 
            'content' => 'content', 
            'user_id' => auth()->user()->id, 
            'role_id' => auth()->user()->role_id, 
            'permission' => auth()->user()->role->permission, 
            'token' => csrf_token()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //доступно только для пользователя с ролью 'registered_user'
    public function store(PostCreateRequest $request)
    {
        return $this->postRepo->create($request->except('_token','method'));
    }

}
