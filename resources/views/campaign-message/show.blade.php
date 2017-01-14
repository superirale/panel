@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CampaignMessage {{ $campaignmessage->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('campaign-message/' . $campaignmessage->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit CampaignMessage"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['campaignmessage', $campaignmessage->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete CampaignMessage',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $campaignmessage->id }}</td>
                                    </tr>
                                    <tr><th> Campaign Id </th><td> {{ $campaignmessage->campaign_id }} </td></tr><tr><th> Mesage Id </th><td> {{ $campaignmessage->mesage_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection