@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Contact <span class="pull-right"><a href="/contacts">All Contacts</a></span></div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                       	{!! Form::open(['url' => "/contacts/import/$contact_list_id", 'class' => 'form-horizontal', 'files' => true]) !!}
							<div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
							    {!! Form::label('file', 'File', ['class' => 'col-md-4 control-label']) !!}
							    <div class="col-md-6">
							        {!! Form::file('file', null, ['class' => 'form-control']) !!}
							        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
							    </div>
							</div>
							<div class="form-group">
							    <div class="col-md-offset-4 col-md-4">
							        {!! Form::submit("Upload", ['class' => 'btn btn-primary']) !!}
							    </div>
							</div>
						{!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection