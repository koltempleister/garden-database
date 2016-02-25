        <div class="form-group">
            {!! Form::label('stock_item_id', 'Stock:') !!}
            {!! Form::select('stock_item_id', $stock_items_list, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('place_id', 'Place:') !!}
            {!! Form::select('place_id', $places, null, ['class' => 'form-control']) !!}
        </div>
       <div class="form-group">
            {!! Form::label('sow_date', 'Sown:') !!}
            {!! Form::text('sow_date', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('harvest_date', 'Harvested:') !!}
            {!! Form::text('harvest_date', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('year', 'Year:') !!}
            {!! Form::text('year', $sowing->year, ['class' => 'form-control']) !!}
        </div>
       