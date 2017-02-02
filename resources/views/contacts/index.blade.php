@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Contacts <span class="pull-right"><a href="/contacts/import">Import CSV</a></span></div>
                    <div class="panel-body">

                        <a href="{{ url('/contacts/create') }}" class="btn btn-primary btn-xs" title="Add New Contact"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> First Name </th>
                                        <th> Last Name </th>
                                        <th> Email </th>
                                        <th> Phone </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            <a href="{{ url('/contacts/' . $item->id) }}" class="btn btn-success btn-xs" title="View Contact"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/contacts/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Contact"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

                                            <a href="{{ url('/contacts/' . $item->id . '/list') }}" class="btn btn-warning btn-xs" title="Add to Lists"><span class="glyphicon glyphicon-list" aria-hidden="true"/></a>

                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/contacts', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Contact" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Contact',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $contacts->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection