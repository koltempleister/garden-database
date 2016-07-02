        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('parent_id', 'Parent:') !!}
            {!! Form::select('parent_id', $parents, $species->parent_id, ['class' => 'form-control']) !!}
        </div>
      