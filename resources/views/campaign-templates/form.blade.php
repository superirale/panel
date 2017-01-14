<div class="form-group {{ $errors->has('campaign_id') ? 'has-error' : ''}}">
    {!! Form::label('campaign_id', 'Campaign Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('campaign_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('campaign_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('template_id') ? 'has-error' : ''}}">
    {!! Form::label('template_id', 'Template Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('template_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('template_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>