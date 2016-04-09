@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                
                @foreach ($images as $image)
                    <p>This is image owned by {{ $image->user_id }}</p>
                    <p>comments:</p>
                    <input type="text" id="comment">
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
