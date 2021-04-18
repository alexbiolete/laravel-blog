@extends('layouts.app')

@section('title')
    <title>{{ $post->title }} - {{ $settings->site_name }}</title>
@endsection

@section('content')
    <a href="{{ URL::previous() }}" role="button" class="btn btn-default">Back</a>
    @if (Auth::user()->id == $post->user_id)
        <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-default">Edit</a>
        <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger">Delete</a>
    @endif
    <br><br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $post->title }}</h3>
        </div>
        <div class="panel-body">
            <div style="text-align: center">
                <img src="{{ $post->featured }}" alt="Post Image" style="max-height: 30rem; max-width: 35rem">
            </div>
            <hr>
            {!! $post->content !!}
        </div>
    </div>
    @foreach ($post->tags as $tag)
        <a href="{{ route('tag.show', ['id' => $tag->id]) }}"><span class="label label-default">#{{ $tag->tag }}</span></a>
    @endforeach
    <small class="pull-right">Written on {{ $post->created_at }}</small>
    <br><br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $post->user->name }}</h1>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img src="{{ asset($post->user->profile->avatar) }}" alt="Avatar" style="max-height: 30rem; max-width: 100%">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3>{{ $post->user->profile->about }}</h3>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="...">
        <ul class="pager">
            @if ($prev)
                <li>
                    <a href="{{ route('post.show', ['slug' => $prev->slug]) }}">
                        Previous
                        <small>({{ $prev->title }})</small>
                    </a>
                </li>
            @endif
            @if ($next)
                <li>
                    <a href="{{ route('post.show', ['slug' => $next->slug]) }}">
                        Next
                        <small>({{ $next->title }})</small>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endsection
