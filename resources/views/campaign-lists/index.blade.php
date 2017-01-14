@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Campaignlists</div>
                    <div class="panel-body">

                        <a href="{{ url('/campaign-lists/create') }}" class="btn btn-primary btn-xs" title="Add New CampaignList"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Campaign Id </th><th> List Id </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($campaignlists as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->campaign_id }}</td><td>{{ $item->list_id }}</td>
                                        <td>
                                            <a href="{{ url('/campaign-lists/' . $item->id) }}" class="btn btn-success btn-xs" title="View CampaignList"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/campaign-lists/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit CampaignList"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/campaign-lists', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete CampaignList" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete CampaignList',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $campaignlists->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection