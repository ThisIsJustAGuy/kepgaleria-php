<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'posts' => Post
                ::query()
//                ::search(request()->term)
//                ->latest(request()->sort)
                ->latest()
                ->get(),
        ]);
    }
}
