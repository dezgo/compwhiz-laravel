@extends('admin')

@section('content1')
    <h1 align="left">Invoicing - Create Invoice</h1>

    {!! Form::open([
    'route' => 'invoice/store_top',
    ]) !!}
    <div class="row">
        <div class="col-md-8">
            <div class="form-horizontal">
                <!-- Customer Form Input -->
                <div class="form-group">
                    {!! Form::label('customer', 'Customer:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('customer_list', $customer_list, null, ['id' => 'customer_list', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- First name Form Input -->
                <div class="form-group">
                    {!! Form::label('first_name', 'First&nbsp;name:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- Last name Form Input -->
                <div class="form-group">
                    {!! Form::label('last_name', 'Last&nbsp;name:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- Address line 1 Form Input -->
                <div class="form-group">
                    {!! Form::label('address1', 'Address:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('address1', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- Address line 2 Form Input -->
                <div class="form-group">
                    {!! Form::label('address2', '&nbsp;', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('address2', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- Suburb Form Input -->
                <div class="form-group">
                    {!! Form::label('suburb', 'Suburb:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('suburb', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- State Form Input -->
                <div class="form-group">
                    {!! Form::label('state', 'State:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('state_list', [
                            'ACT' => 'ACT',
                            'NSW' => 'NSW',
                            'SA' => 'SA',
                            'WA' => 'WA',
                            'TAS' => 'TAS',
                            'NT' => 'NT',
                            'QLD' => 'QLD',
                            'VIC' => 'VIC'], 'ACT', ['id' => 'state_list', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- Postcode Form Input -->
                <div class="form-group">
                    {!! Form::label('postcode', 'Postcode:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Invoice number Form Input -->
            <div class="form-group">
                {!!  Form::label('invoice_number', 'Invoice number:', ['class' => 'control-label']) !!}
                {!! Form::text('invoice_number', $invoice->invoice_number, ['class' => 'form-control']) !!}
            </div>

            <!-- Invoice date Form Input -->
            <div class="form-group">
                {!! Form::label('invoice_date', 'Invoice date:', ['class' => 'control-label']) !!}
                {!! Form::text('invoice_date', $invoice->invoice_date->toDateString(), ['id' => 'invoice_date', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            {!! Form::submit('Continue', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@stop

@section('footer')
    <script type="text/javascript">
        $('#customer_list').select2({
            placeholder: 'Choose a customer',
            tags: false,
            theme: "classic"
        });

        $('#state_list').select2({
            placeholder: 'Choose a state',
            tags: false,
            theme: "classic"
        });

        $( "#invoice_date" ).datepicker({
            dateFormat:"yy-mm-dd",
            showAnim: "fold",
            minDate: -7,
        });
    </script>
@stop
