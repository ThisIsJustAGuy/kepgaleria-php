<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $term = request()->term;
        $order = request()->order;
        $field = request()->field;

        return view('home', [
            'posts' => Post
                ::query()
                ->where('title','LIKE', "%{$term}%")
                ->orWhere('description','LIKE', "%{$term}%")
                ->orderBy($field ?? 'created_at', $order ?? 'desc')
                ->latest()
                ->get(),
        ]);
    }
}
