@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Userservices</div>
                    <div class="panel-body">

                        <a href="{{ url('/user-services/create') }}" class="btn btn-primary btn-xs" title="Add New UserService"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Service Id </th><th> User Id </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($userservices as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->service_id }}</td><td>{{ $item->user_id }}</td>
                                        <td>
                                            <a href="{{ url('/user-services/' . $item->id) }}" class="btn btn-success btn-xs" title="View UserService"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/user-services/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit UserService"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/user-services', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete UserService" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete UserService',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $userservices->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection