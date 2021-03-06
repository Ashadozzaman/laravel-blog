<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::orderBy('name')->get();
        $data['authors'] = Author::orderBy('name')->get();
        $data['posts'] = Post::all();
        // dd($data);
        $data['serial'] = 1;
        return view('admin.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::orderBy('name')->get();
        $data['authors'] = Author::orderBy('name')->get();
        return view('admin.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpeg,png,webp',
            

        ]);
        if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path = 'images/upload/post';
            $file_name = time().rand(00000,99999).'.'.$file->getClientOriginalExtension();
            $file->move($path,$file_name);
            $data['image'] = $path.'/'.$file_name;
        }
        $data['category_id'] = $request->category_id;
        $data['author_id'] = $request->author_id;
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['status'] = $request->status;

        if($request->has('is_featured')){
            $data['is_featured'] = $request->is_featured;
        }

        if ($request->status == 'published'){
            $data['published_at'] = date('Y-m-d');
        }
        // dd($request->all());
        Post::create($data);
        session()->flash('success','Post Create Successfully');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data['post'] = $post;
        $data['categories'] = Category::orderBy('name')->get();
        $data['authors'] = Author::orderBy('name')->get();
        return view('admin.post.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['post'] = $post;
        $data['categories'] = Category::orderBy('name')->get();
        $data['authors'] = Author::orderBy('name')->get();
        return view('admin.post.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpeg,png,webp',

        ]);
        if ($request->hasFile('image'))
        {
            $file      = $request->file('image');
            $path      = 'images/upload/post';
            $file_name = time().rand(00000,99999).'.'.$file->getClientOriginalExtension();
            $file->move($path,$file_name);
            $data['image'] = $path.'/'.$file_name;
            if (file_exists($post->image))
            {
                unlink($post->image);
            }
        }
        $data['category_id'] = $request->category_id;
        $data['author_id']   = $request->author_id;
        $data['title']       = $request->title;
        $data['content']     = $request->content;
        $data['status']      = $request->status;
        $data['categories']  = Category::orderBy('name')->get();
        $data['authors']     = Author::orderBy('name')->get();
        if($request->has('is_featured')){
            $data['is_featured'] = $request->is_featured;
        }
    //    dd($data);
        $post->update($data);
        session()->flash('success','Post Updated Successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success','Post Deleted Successfully');
        return redirect()->route('post.index');
        if (file_exists($post->image))
        {
            unlink($post->image);
        }
    }
}
