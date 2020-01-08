@extends('posts.layout')

@section('content')
  <div class="row">
      <div class="col-lg-12 margin-tb">
        <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
      </div>
  </div>
  @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="d-flex">
    @foreach($posts as $post)
        <div class="col-lg-4">
            <h2>{{ $post->title }}</h2>
            <div class="col-lg-12">{{ $post->content }}</div>
        </div>
        <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show {{ $post->id }}</a>
            <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit {{ $post->id }}</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @endforeach
    </div>
  @endsection
