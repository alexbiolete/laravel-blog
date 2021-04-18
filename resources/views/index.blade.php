@extends('layouts.app')

@section('title')
    <title>{{ $settings->site_name }}</title>
@endsection

@section('content')
    @if ($last_post)
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img src="{{ $last_post->featured }}" alt="Post Image" style="max-height: 30rem; max-width: 100%">
                </div>
                <div class="col-md-8 col-sm-8">
                    Latest Post
                    <h1><a href="{{ route('post.show', ['slug' => $last_post->slug]) }}">{{ $last_post->title }}</a></h1>
                    <br>
                    @foreach ($last_post->tags as $tag)
                        <a href=""><span class="label label-default">#{{ $tag->tag }}</span></a>
                    @endforeach
                    <small class="pull-right">Posted {{ $last_post->created_at->diffForHumans() }} in {{ $last_post->category->name }}</small>
                </div>
            </div>
        </div>
    @else
        <h1 class="text-center">No posts available.</h1>
    @endif
    @foreach ($categories as $category)
        @if (count($category->posts) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->name }}</a></h1>
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
                                @foreach ($post->tags as $tag)
                                    <a href="{{ route('tag.show', ['id' => $tag->id]) }}"><span class="label label-default">#{{ $tag->tag }}</span></a>
                                @endforeach
                            </div>
                        </div>
                        @if (!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        @endif
    @endforeach
@endsection