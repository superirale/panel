@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Campaign Lists <span class="pull-right"><a href="/lists/create">Add List</a></span></div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form>

                        @include ('campaign-lists.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Campaign Lists </div>
                    <div class="panel-body">
                        @foreach($campaign->lists as $list)
                        <label class="label label-info">{{$list->name}}  <a href="/campaigns/{{$campaign->id}}/list/{{$list->id}}/remove">x</a></label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection