@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload</div>

                <div class="panel-body">
                    <form method="post" class="form-horizontal" action="/upload" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group">
                            <select name="beautician_id" class="form-control">
                                <option value=""></option>
                                @foreach($beauticians as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <input type="file" name="file" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="upload">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection