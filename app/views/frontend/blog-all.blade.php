@extends('frontend.layouts.master')
@section('content')
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <?php $count = count($posts);
    $i = 1;
    ?>
    @foreach ($posts as $post)
    <div class="post-preview">
        <a href="{{ URL::route('detail', $post->id) }}">
            <h2 class="post-title">
                {{ $post->title }}
            </h2>
            <h3 class="post-subtitle">
                {{ $post->body }}
            </h3>
        </a>
        <p class="post-meta">Posted by <a href="#">{{ $post->author->name }}</a> on {{ date("jS F, Y", strtotime($post->created_at))}}</p>
    </div>
    <?php if ($i !== $count): ?>
        <hr>
    <?php endif ?>
<?php $i++ ?>
    @endforeach
</div>


@endsection            
