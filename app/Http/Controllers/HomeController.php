<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class HomeController extends Controller
{
   public function index(){
   	$data['featured_posts'] = Post::with(['category','author'])->where('is_featured',1)->Published()->get();
   	$data['latest_posts']   = Post::with(['category','author'])->Published()->orderBy('id','desc')->paginate('4');
   	// dd($data);
       return view('front.index',$data);
   }
}
