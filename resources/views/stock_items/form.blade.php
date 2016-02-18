        <div class="form-group">
            {!! Form::label('supplier', 'Supplier:') !!}
            {!! Form::select('supplier_id', $supplier_list, $stock_item->supplier_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', $statuses, $stock_item->status, ['class' => 'form-control']) !!}
        </div>
       <div class="form-group">
            {!! Form::label('fresh_untill', 'Fresh untill:') !!}
            {!! Form::text('fresh_untill', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('date_of_purchase', 'Date of purchase:') !!}
            {!! Form::text('date_of_purchase', null, ['class' => 'form-control']) !!}
        </div>
       