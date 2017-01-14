<input type="hidden" name="campaign_id" value="{{$campaign_id}}">
<div class="form-group {{ $errors->has('template_id') ? 'has-error' : ''}}">
    {!! Form::label('template_id', 'Template', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">

        {!! Form::select('template_id', $templates, null, ['class' => 'select222 form-control', 'required' => 'required']) !!}
        {!! $errors->first('template_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>