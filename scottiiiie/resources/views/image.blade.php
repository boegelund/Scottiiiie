@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Viewing {{ ucfirst(trans($image->user->name)) }}'s Image</h1></div>
                <img class="img-responsive" src="data:image/jpeg;charset=utf-8;base64,{{base64_encode($image->image_data)}}">
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
                <div class="panel-heading"><h1>Comment Section</h1></div>
                <table class="table table-striped">
                    <form action="{{url("comment/create")}}" method="POST">
                    <tr>
                        <td>
                            <input type="text" id="comment" name="comment" class="form-control" placeholder="Your comment">
                        </td>
                        <td>
                            
                        </td>
                        
                        <td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="Submit" class="btn btn-primary">
                            <input type="hidden" value="{{$image->id}}" name="image_id">
                        </td>
                        
                    </tr>
                    </form>
                    <tr>
                        <th>Comment</th>
                        <th>Author</th>
                        <th>Created At</th>
                    </tr>
                    @foreach ($image->comments as $comment)
                    <tr>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->created_at }}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
