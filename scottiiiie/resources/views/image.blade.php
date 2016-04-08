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
                        <tr>
                            <th>
                                <label for="email">Add User by email address</label>
                                </th>
                            <th></th
                            ><th></th>
                        </tr>
                        <form action="{{ url('image/addUser') }}" method="post" enctype="multipart/form-data">
                        <tr>
                            <td>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                            </td>
                            <td></td>
                            <td><input type="submit" value="Submit" class="btn btn-primary" /></td>
                        </tr>
                        <input type="hidden" name="imageid" value="{{$image->id}}">
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                        <form>
                        
                        <tr>
                            <th>List of users</th>
                            <th>Added</th
                            ><th>Edit Access</th>
                        </tr>
                        @foreach ($image->imageAccess as $access)
                        <tr>
                            <td>{{ ucfirst(trans($access->user->name)) }}</td>
                            <td>{{ $access->created_at }}</td>
                            <td><input class="btn btn-danger" onclick="location.href='{{ url('image/revokeUser', array($image->id,$access->user_id), null) }}';" value="Revoke"></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!--<div class="panel-heading">Comments</div>
                    <table class="table table-striped">
                        <tr><td>1</td><td>2</td></tr>
                        <tr><td>1</td><td>2</td></tr>
                        <tr><td>1</td><td>2</td></tr>
                        <tr><td>1</td><td>2</td></tr>
                    </table>
                </div>-->
            </div>
        </div>
    </div>
</div>
@endsection
