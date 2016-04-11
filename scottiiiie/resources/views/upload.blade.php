@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Form</div>

                <div class="panel-body">
                    <form action="submit" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image">Image (Only .jpg)</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection