<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::with('user')->latest()->paginate(5);
        return view('blog.index', compact('blogs'));
    }

    public function create(){
        return view('blog.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Blog::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);
        return redirect()->route('index')->with('success', 'Blog created successfully!');
    }

    public function display($id){
        $id = decrypt($id);
        $blog = Blog::with(['user','reviews' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->find($id);
        return view('blog.display', compact('blog'));
    }
}

