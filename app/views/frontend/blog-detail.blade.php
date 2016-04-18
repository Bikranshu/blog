@extends('frontend.layouts.master')
@section('content')
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <h2 class="post-title">
        {{ $post->title }}
    </h2>
    <div class="post-preview">
        <p class="post-meta">Posted by <a href="#">{{ $post->author->name }}</a> on {{ date("jS F, Y", strtotime($post->created_at))}}</p>
    </div>
    <p>{{ $post->body }}</p>
</div>


@endsection            
