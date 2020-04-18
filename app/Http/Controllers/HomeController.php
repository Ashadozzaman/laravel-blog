<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Author;

class HomeController extends Controller
{
   public function index(){
   	$data['featured_posts'] = Post::with(['category','author'])->where('is_featured',1)->Published()->get();
   	$data['latest_posts']   = Post::with(['category','author'])->Published()->orderBy('id','desc')->paginate('6');

   	// $data['popular_posts']  = Post::Published()->orderBy('total_hit','desc')->limit('3')->get();
   	// $data['categories']     = Category::get();
   	// dd($data['categories']);

   	// dd($data);
   	
       return view('front.index',$data);
   }


   public function details($id){

   	// $data['popular_posts']  = Post::Published()->orderBy('total_hit','desc')->limit('3')->get();
   	
   	// $data['categories']     = Category::all();
   	$data['post'] = Post::with(['category','author'])->findOrFail($id);
   	$data['post']->increment('total_hit');
   	$data['related_posts']  = Post::with(['category'])->Published()->where('category_id',$data['post']->category_id)->orderBy('id','desc')->limit('3')->get();
   	// dd($data['related_posts']);
   	return view('front.details',$data);
   }

   public function category($id){           
    $data['featured_posts'] = Post::with(['category','author'])->where('is_featured',1)->Published()->get();
   	$data['posts'] = Post::Published()->where('category_id', $id)->orderBy('id','desc')->paginate('2');
   	// dd($data['posts']);
   	return view('front.category-post',$data);
   }
}
