@extends('posts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
      <h2>Show Post</h2>
      <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
    </div>
</div>
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $post->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content:</strong>
                {{ $post->content }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Admin Content:</strong>
                {{ $post->adminContent }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tags:</strong>
                {{ $post->tags }}
            </div>
        </div>
    </div>
@endsection
