<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BlogsController extends Controller
{
    public function blogs() {
        $search = request()->query('search');
        $categories = Category::all();
        $tags = Tag::all();
        if($search) {
            $posts = Post::with('author')
                ->where('title', 'like', "%{$search}%")
                ->latest()
                ->simplePaginate(9);
        } else {
            $posts = Post::with('author')
                ->latest()
                ->simplePaginate(9);
        }


        return view('frontend.home', compact([
            'posts',
            'categories',
            'tags'
        ]));
    }

    public function show(Request $request, string $slug) {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $tags = Tag::all();
        $this->trackViewCount($post);
        return view('frontend.blog', compact([
            'post',
            'categories',
            'tags'
        ]));
    }

    private function trackViewCount(Post $post) {
        $cookieName = 'blog_viewed_'. $post->id;

        if(!Cookie::has($cookieName)) {
            $post->increment('view_count');

            Cookie::queue($cookieName, true, 60*24);
        }
    }

    public function showByCategory(Request $request, $slug) {
        $category = Category::where('slug', $slug)->firstOrFail();

        $categories = Category::all();
        $tags = Tag::all();

        $posts = Post::where('category_id', $category->id)->with('author')->latest()->simplePaginate(9);

        return view('frontend.categories', compact([
            'category',
            'posts',
            'categories',
            'tags'
        ]));
    }
}
