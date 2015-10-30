        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('remarks', 'Remarks:') !!}
            {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('species_list', 'Species:') !!}
            {!! Form::select('species_list', $species, null, ['class' => 'form-control']) !!}
        </div>
       <div class="form-group">
            <div class="col-md-6">
                {!! Form::label('outside_from', 'Sow outside from:') !!}
                {!! Form::select('outside_from', $sowing_periods, null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-6">
                 {!! Form::label('outside_till', 'Sow outside till:') !!}
            {!! Form::select('outside_till', $sowing_periods, null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                {!! Form::label('inside_from', 'Sow inside from:') !!}
                {!! Form::select('inside_from', $sowing_periods, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                {!! Form::label('inside_till', 'Sow inside till:') !!}
                {!! Form::select('inside_till', $sowing_periods, null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            {!! Form::label('harvest_from', 'Harvest from:') !!}
            {!! Form::select('harvest_from', $sowing_periods, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            {!! Form::label('harvest_till', 'Harvest till:') !!}
            {!! Form::select('harvest_till', $sowing_periods, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('time_till_harvest', 'Time till harvest (days):') !!}
            {!! Form::text('time_till_harvest', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('row_distance_cm', 'Row distance (cm):') !!}
            {!! Form::text('row_distance_cm', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('thin_out-cm', 'Thin out (cm):') !!}
            {!! Form::text('thin_out_cm', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('replant', 'Replant:') !!}
            {!! Form::checkbox('replant', null, ['class' => 'form-control']) !!}
        </div>
