    @if ($errors->has('name'))
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    @endif

    @if ($errors->has('servings'))
        {!! $errors->first('servings', '<span class="help-block">:message</span>') !!}
    @endif

    @if ($errors->has('summary'))
        {!! $errors->first('summary', '<span class="help-block">:message</span>') !!}
    @endif
    @if ($errors->has('difficulty'))
        {!! $errors->first('difficulty', '<span class="help-block">:message</span>') !!}
    @endif
    @if ($errors->has('overall_time'))
        {!! $errors->first('overall_time', '<span class="help-block">:message</span>') !!}
    @endif

