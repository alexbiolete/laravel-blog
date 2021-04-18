@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Users
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Image
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Permissions
                    </th>
                    <th>
                        Delete
                    </th>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ asset($user->profile->avatar) }}" alt="Avatar" width="60px" height="60px" style="border-radius: 50%;">
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    @if ($user->admin == 1)
                                        <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-danger btn-xs">Remove Permissions</a>
                                    @else
                                        <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-success btn-xs">Make Admin</a>
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::id() !== $user->id)
                                        <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-xs">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach 
                    @else
                        <tr>
                            <th colspan="5" class="text-center">
                                No users.
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
            <form action="{{ route('user.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Create a new user</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-default" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection