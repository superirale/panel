<input type="hidden" name="campaign_id" value="{{$campaign_id}}">
<div class="form-group {{ $errors->has('message_id') ? 'has-error' : ''}}">
    {!! Form::label('message_id', 'Message', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">

        {!! Form::select('message_id', $messages, null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('message_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>