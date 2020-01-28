<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function add(Request $request)
    {
        return view('comments.create',["post"=> Post::find($request->id)]);
    }
    
    public function create(Request $request)
    {
        $comment = new Comment();
        $form = $request->all();
        $comment->fill($form);
        dd($comment);
        $comment->save();
        return 'ok'; 
    }
    
    public function index(Request $request)
    {
        $comment = Comment::all()->sortByDesc('updated_at');


         return view('comments.index', ['comments' => $comment]);
    }
}