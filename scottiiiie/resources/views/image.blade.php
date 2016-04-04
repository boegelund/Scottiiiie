@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Viewing Image</div>

                <div class="panel-body">
                    {{ $image->user->name }}
                </div>
                
                <p>{{ $image->id }}</p>
                
                <img src="data:image/jpeg;base64,{{ base64_encode($image->image_data) }}">
            </div>
        </div>
    </div>
</div>
@endsection
