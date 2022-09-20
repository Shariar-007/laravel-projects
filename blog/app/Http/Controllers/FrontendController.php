<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class FrontendController extends Controller
{
    //
    public function home(){
        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(6)->get();
        $first2Posts =   $posts->splice(0,2);
        $middlePost =   $posts->splice(0,1);
        $lastposts =   $posts->splice(0,2);

        $footerPosts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();
        $firstFooter2Posts =   $footerPosts->splice(0,2);
        $middleFooterPost =   $footerPosts->splice(0,1);
        $lastFooterPosts =   $footerPosts->splice(0,1);

        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
        // return $middlePost;
        return view('website.home', compact('posts', 'recentPosts', 'first2Posts', 'middlePost', 'lastposts','firstFooter2Posts','middleFooterPost','lastFooterPosts'));
    }
    
    public function about(){
        return view('website.about');
    }

    public function category(){
        return view('website.category');
    }

    public function contact(){
        return view('website.contact');
    }

    public function post($slug){
        $post = Post::with('category','user')->where('slug',$slug)->first();
        $popularPosts = Post::with('category','user')->inRandomOrder()->limit(3)->get();
        $categories = Category::all();
        $tags = Tag::all();

        if($post) {
            return view('website.post', compact('post', 'popularPosts', 'categories', 'tags'));
        } else {
            return redirect('/');
        }
        
    }
}
