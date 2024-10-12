<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        return Post::paginate();
    }

    public function createPost(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'content' =>  ['required', 'string'],
            'user_id' => ['required', 'exists:users,id']
        ]);

        return Post::create($data);
    }
}
