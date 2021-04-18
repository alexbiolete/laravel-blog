@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Blog Settings
        </div>
        <div class="panel-body">
            <form action="{{ route('settings.update') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Site name</label>
                    <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Contact E-mail</label>
                    <input type="email" name="contact_email" value="{{ $settings->contact_email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Contact Number</label>
                    <input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" name="address" value="{{ $settings->address }}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
