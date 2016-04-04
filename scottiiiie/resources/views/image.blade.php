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
                <p>{{ $image->timestamp }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
