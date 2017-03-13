
@section('title', 'Profile')
@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-md-12">
        <form action="/profile/{{ $results->id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="col-md-4 text-center">
                @if ($results->photo)
                <img class="round-img" id="show-img" src="{{ asset('photo/'.$results->photo) }}"/>
                @else
                <img class="round-img" id="show-img" src="{{ asset('photo/noimage.png') }}"/>
                @endif

                <div class="browse">
                    <span class="btn btn-info btn-file">
                        Browse <input type="file" name="photo" id="photo">
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <h1>Profile</h1>
                <div class="form-group">
                    <label>Name : </label>
                    <input type="text" class="form-control" value="{{ $results->name }}" name="name">
                </div>
                <div class="form-group">
                    <label>Email : </label>
                    <input type="text" class="form-control" value="{{ $results->email }}" name="email">
                </div>
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>
    </div>
    <div class="col-md-offset-4 col-md-6">
        <h1>Update Password</h1>
        <form action="/profile/changepassword" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Old Password : </label>
                <input type="text" class="form-control" name="old">
                @if ($errors->has('old'))
                <span class="help-block">
                    <strong>{{ $errors->first('old') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label>New Password : </label>
                <input type="text" class="form-control" name="password">
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label>Confirm Password : </label>
                <input type="text" class="form-control" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-info">Update</button>
        </form>
        @if (Session::has('success'))
        <div class="alert alert-success">{!! Session::get('success') !!}</div>
        @endif
        @if (Session::has('failure'))
        <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
        @endif
    </div>
</div>
@endsection