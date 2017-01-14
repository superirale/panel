<div class="form-group {{ $errors->has('list_id') ? 'has-error' : ''}}">
    {!! Form::label('lists', 'Lists', ['class' => ' col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('lists', null, ['class' => 'cmp-lists form-control', 'required' => 'required']) !!}
        {!! $errors->first('lists', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="cmp-lists"></div> --}}

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Add', ['class' => 'sub-cmp-list btn btn-primary']) !!}
    </div>
</div>