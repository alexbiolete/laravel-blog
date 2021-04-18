@extends('layouts.app')

@section('title')
    <title>{{ $category->title }} - {{ $settings->site_name }}</title>
@endsection

@section('content')
@if (count($category->posts) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $category->name }}</h3>
            </div>
            <div class="panel-body">
                @foreach ($category->posts()->orderBy('created_at', 'desc')->get() as $post)
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img src="{{ $post->featured }}" alt="Post Image" style="max-height: 30rem; max-width: 100%">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3><a href="{{ route('post.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
                            <small>Posted {{ $post->created_at->diffForHumans() }}</small>
                            <br>
                            @foreach ($last_post->tags as $tag)
                                <a href="{{ route('tag.show', ['id' => $tag->id]) }}"><span class="label label-default">#{{ $tag->tag }}</span></a>
                            @endforeach
                        </div>
                    </div>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
@endsection
