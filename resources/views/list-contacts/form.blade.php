<div class="form-group {{ $errors->has('list_id') ? 'has-error' : ''}}">
    {!! Form::label('list_id', 'List Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('list_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('list_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('contact_id') ? 'has-error' : ''}}">
    {!! Form::label('contact_id', 'Contact Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('contact_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('contact_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>