<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\History;
use Carbon\Carbon;

class PostController extends Controller
{
    public function add()
    {
        return view('admin.posts.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Post::$rules);

      $posts = new Post;
      $form = $request->all();

      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $posts->image_path = basename($path);
      } else {
          $posts->image_path = null;
      }

      unset($form['_token']);
      
      unset($form['image']);

      $posts->fill($form);
      $posts->save();

      return redirect('posts');
    }
    
    public function index(Request $request)
      {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          
          $search_word = Post::where('title', $cond_title)->get();
      } else {
         
          $search_word = Post::all();
      }
      return view('admin.posts.index', ['search_word' => $search_word, 'cond_title' => $cond_title]);
      }
      
      public function edit(Request $request)
      {
      
      $posts = Post::find($request->id);
      if (empty($posts)) {
        abort(404);    
      }
      return view('admin.posts.edit', ['posts_form' => $posts]);
      }
    
    public function update(Request $request)
    {
        $this->validate($request, Post::$rules);
      
      $posts = Post::find($request->id);
      
      $posts_form = $request->all();
      if (isset($posts_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $posts->image_path = basename($path);
        unset($posts_form['image']);
      } elseif (isset($request->remove)) {
        $posts->image_path = null;
        unset($posts_form['remove']);
      }
      unset($posts_form['_token']);
      
      $posts->fill($posts_form)->save();
      
      $history = new History;
      $history->post_id = $posts->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('posts');
    }
    
    public function delete(Request $request)
      {
      
      $posts = Post::find($request->id);
     
      $posts->delete();
      return redirect('posts');
      } 
    
    
}

