<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

use App\Contracts\PostRepositoryInterface;

use App\Models\Post;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\PostNotFoundException;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{

   
    public function __construct(Post $post)
    {
        parent::__construct($post);
        $this->model = $post;
        $this->user=auth()->user();
    }

}