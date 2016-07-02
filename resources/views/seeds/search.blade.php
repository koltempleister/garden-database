{!! Form :: open(['method' =>'GET']) !!}       
    <div class="form-group">
        {!! Form::input('seatch', 'q', null, ['class' => 'form-control', "placeholder" => "search..."]) !!}
    </div>
{!! Form::close()!!}