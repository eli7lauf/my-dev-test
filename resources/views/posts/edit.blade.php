@extends('posts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
      <h2>Edit Post</h2>
      <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
    </div>
    @if ($errors->any())
       <div class="alert alert-danger">
           <strong>Whoops!</strong> There were some problems with your input.<br><br>
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
   <form action="{{ route('posts.update',$post->id) }}" method="POST">
   @csrf
   @method('PUT')
    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Title:</strong>
               <input type="text" name="title" class="form-control" placeholder="{{ $post->title }}">
           </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Content:</strong>
               <textarea class="form-control" style="height:150px" name="content" placeholder="{{ $post->content }}"></textarea>
           </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Admin Content:</strong>
               <textarea class="form-control" style="height:150px" name="adminContent" placeholder="{{ $post->adminContent }}"></textarea>
           </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Tags:</strong>
               <input type="text" name="tags" class="form-control" placeholder="{{ $post->tags }}">
           </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-12 text-center">
               <button type="submit" class="btn btn-primary">Submit</button>
       </div>
    </div>
   </form>
</div>
@endsection
