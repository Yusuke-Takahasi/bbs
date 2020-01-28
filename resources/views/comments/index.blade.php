@extends('layouts.front')
@section('title', 'コメント一覧')

@section('content')
    <div class="container">
         嗚呼嗚呼嗚呼
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($comments as $comment)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $comment->updated_at->format('Y年m月d日') }}
                                </div>
                                
                                <div class="body mt-3">
                                    {{ str_limit($comment->body, 1500) }}
                                </div>
                            </div>
                            
                        </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection