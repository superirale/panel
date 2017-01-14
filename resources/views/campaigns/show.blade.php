@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Campaign {{ $campaign->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('campaigns/' . $campaign->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Campaign"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['campaigns', $campaign->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Campaign',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $campaign->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $campaign->name }} </td></tr><tr><th> Schedule Date </th><td> {{ $campaign->schedule_date }} </td></tr><tr><th> Type </th><td> {{ $campaign->type }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection