@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Private Gallery</div>
                    <div class="panel-heading"><h2>Viewer privileges</h2></div>
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Owner</th>
                            <th>Created</th>
                        </tr>
                        @foreach ($images as $image)
                        <tr>
                            <td><a href="image/{{ $image->id }}">{{$image->id}}</a></td>
                            <td><a href="image/{{ $image->id }}">{{ $image->user->name }}</a></td>
                            <td><a href="image/{{ $image->id }}">{{ $image->created_at }}</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
