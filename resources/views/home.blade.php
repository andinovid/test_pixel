@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="col-md-12 post">
        <form action="/post" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="text" required="required" class="form-control text-post" id="post" placeholder="Update Status" name="post">
            </div>
            <button type="submit" class="btn btn-info pull-right">Update</button>
            <div class="clearfix"></div>
        </form>
    </div>
    <div class="col-md-12 list-post">
        @foreach($post as $row)
        @if($row->id == Auth::user()->id)
        <div class="panel-body my-session">
            <div class="pull-right left10">
                @if ($row->photo)
                <img class="round-img2" id="show-img" src="{{ asset('photo/'.$row->photo) }}"/>
                @else
                <img class="round-img2" id="show-img" src="{{ asset('photo/noimage.png') }}"/>
                @endif
            </div>
            <div class="pull-right">
                <h4>{{ $row->name }}</h4>
                <p>{{ $row->post }}</p>
            </div>
        </div>
        @else
        <div class="panel-body">
            <div class="pull-left right10">
                @if ($row->photo)
                <img class="round-img2" id="show-img" src="{{ asset('photo/'.$row->photo) }}"/>
                @else
                <img class="round-img2" id="show-img" src="{{ asset('photo/noimage.png') }}"/>
                @endif
            </div>
            <div class="pull-left">
                <h4>{{ $row->name }}</h4>
                <p>{{ $row->post }}</p>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
