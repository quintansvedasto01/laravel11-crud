<?php

namespace App\Http\Controllers;

use App\Models\{User, Post};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(){
        $posts = Auth::user()->posts()->latest()->paginate(6);
        return view('users.dashboard', ['posts' => $posts]);
    }

    public function userPosts(User $user){
        $user_posts = $user->posts()->latest()->paginate(6);
        return view('users.posts', [
            'user' => $user,
            'posts' => $user_posts
        ]);
    }
}
