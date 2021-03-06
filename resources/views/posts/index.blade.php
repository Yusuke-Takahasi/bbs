@extends('layouts.front')
@section('title', '投稿済み投稿の一覧')

@section('content')
    <div class="container">
         <a href="{{ action('Posts\PostController@add') }}" role="button" class="btn btn-primary">新規作成</a>
         <a href="{{ url('/posts') }}" role="button" class="btn btn-primary">編集と削除</a>
        
        
       
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                            <a href="/comments/create?id={{$post->id}}" role="button" class="btn btn-primary">コメントする</a>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection