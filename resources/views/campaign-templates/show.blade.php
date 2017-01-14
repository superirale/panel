@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CampaignTemplate {{ $campaigntemplate->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('campaign-templates/' . $campaigntemplate->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit CampaignTemplate"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['campaigntemplates', $campaigntemplate->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete CampaignTemplate',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $campaigntemplate->id }}</td>
                                    </tr>
                                    <tr><th> Campaign Id </th><td> {{ $campaigntemplate->campaign_id }} </td></tr><tr><th> Template Id </th><td> {{ $campaigntemplate->template_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection