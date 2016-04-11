@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Viewing {{ ucfirst(trans($image->user->name)) }}'s Image</h1></div>
                <img class="img-responsive" src="data:image/jpeg;charset=utf-8;base64,{{base64_encode($image->image_data)}}">
                <div class="panel-heading"><h2>Viewer privileges</h2></div>
                    <table class="table table-striped">
                        @if (Auth::user()->id == $image->user_id)
                        <tr>
                            <th>
                                <label for="email">Add User by email address</label>
                                </th>
                            <th></th
                            ><th></th>
                        </tr>
                        @endif
                        <form action="{{ url('image/addUser') }}" method="post" enctype="multipart/form-data">
                        
                        @if (Auth::user()->id == $image->user_id)
                        <tr>
                            <td>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                            </td>
                            <td></td>
                            
                            <td>
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </td>
                            
                        </tr>
                        @endif
                        <input type="hidden" name="imageid" value="{{$image->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                        
                        <tr>
                            <th>List of users</th>
                            <th>Added</th>
                            @if (Auth::user()->id == $image->user_id)
                            <th>Edit Access</th>
                            @endif
                        </tr>
                        @foreach ($image->imageAccess as $access)
                        <tr>
                            <td>{{ ucfirst(trans($access->user->name)) }}</td>
                            <td>{{ $access->created_at }}</td>
                            @if (Auth::user()->id == $image->user_id)
                            <td>
                                <input class="btn btn-danger" onclick="location.href='{{ url('image/revokeUser', array($image->id,$access->user_id), null) }}';" value="Revoke">

                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                <form action="{{url("comment/create")}}" method="POST">
                    <p>comments:</p>
                    <input type="text" id="comment" name="comment">
                    <input type="hidden" value="{{$image->id}}" name="image_id">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>
                <hr>
                 @foreach ($image->comments as $comment)
                 <p>{{$comment->comment}}</p>
                 @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
