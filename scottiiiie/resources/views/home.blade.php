@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                @foreach ($images as $image)
                    <a href="image/{{ $image->id }}"><p>This is image owned by {{ $image->user->name }}</p></a>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
