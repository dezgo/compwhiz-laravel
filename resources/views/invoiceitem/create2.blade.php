@extends('admin')

@section('content1')

    <h1 align="left">Create Invoice Item for invoice {{ $invoice->description }}</h1>
    <h2>Step 2 - Enter/select description</h2>
    {!! Form::open(['route' => 'invoiceitem.store2']) !!}
    {!! Form::hidden('invoice_id', $invoice->id) !!}

    <div class="form-group">
        {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}<br>
        {!! Form::text('category_description', $category->description, ['class' => 'control-label', 'disabled' => 'true']) !!}
        {!! Form::hidden('category_id', $category->id) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description_label', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::select('description_sel', ['' => ''] + $invoice_item_list->toArray(),
            null, ['class' => 'form-control', 'id' => 'description_list'] ) !!}
        {!! Form::hidden('description') !!}
    </div>

    {!! Form::submit('Next', ['class' => 'btn btn-primary', 'onclick' => 'populateDescription()']) !!}

    {!! Form::close() !!}

    @include('errors.list')
@stop

@section('footer1')
<script type="text/javascript">
$('#description_list').select2({
    placeholder: "Choose a description",
    tags: true,
    theme: "classic"
});

// When the form is submitted, populate the hidden description field
// with the value of the select. Using the hidden field is easier
// than accessing the jquery select element when running tests.
function populateDescription() {
  $('[name="description"]').val($('#description_list').val());
}

</script>
@stop
