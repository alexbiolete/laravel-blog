@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Categories
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
                    @if ($categories->count() > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-info btn-xs">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">
                                No categories.
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
                <form action="{{ route('category.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Create a new category">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Submit</button>
                        </span>
                    </div>
                </form>
        </div>
    </div>
@endsection