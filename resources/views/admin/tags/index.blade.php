@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Tags
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Name
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>
                </thead>
                <tbody>
                @if ($tags->count() > 0)
                    @foreach ($tags as $tag)
                        <tr>
                            <td>
                                {{ $tag->tag }}
                            </td>
                            <td>
                                <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-info btn-xs">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-danger btn-xs">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">
                            No tags available.
                        </th>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="panel-body">
                <form action="{{ route('tag.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="tag" class="form-control" placeholder="Create a new tag">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Submit</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection