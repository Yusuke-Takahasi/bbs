@extends('layouts.front')
@section('title', 'コメント')

@section('content')
    <form class=content action="/comments/create" method="post" enctype="multipart/form-data">

    @csrf

    <input name="post_id" type="hidden" value="{{ $post->id }}" >

    <div class="form-group">
        <label for="body">本文</label>

        <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4"> {{ old('body') }} </textarea>
        @if ($errors->has('body'))
            <div class="invalid-feedback">
                {{ $errors->first('body') }}
            </div>
        @endif
    </div>

    <div class="mt-4">
        <a href="/comments/index" role="button" class="btn btn-primary">コメントする</a>
    </div>
    </form>
@endsection