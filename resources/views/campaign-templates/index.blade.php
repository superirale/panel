@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Campaigntemplates</div>
                    <div class="panel-body">

                        <a href="{{ url('/campaign-templates/create') }}" class="btn btn-primary btn-xs" title="Add New CampaignTemplate"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Campaign Id </th><th> Template Id </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($campaigntemplates as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->campaign_id }}</td><td>{{ $item->template_id }}</td>
                                        <td>
                                            <a href="{{ url('/campaign-templates/' . $item->id) }}" class="btn btn-success btn-xs" title="View CampaignTemplate"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/campaign-templates/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit CampaignTemplate"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/campaign-templates', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete CampaignTemplate" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete CampaignTemplate',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $campaigntemplates->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection