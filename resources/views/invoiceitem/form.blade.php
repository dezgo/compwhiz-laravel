<?php $options['class'] = 'form-control' ?>

    {!! Form::hidden('invoice_id', $invoice->id) !!}

    <div class="form-group">
        {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}

        <?php $options['id'] = 'category_list' ?>
        {!! Form::select('category_id', ['' => ''] + $invoice_item_categories->toArray(), null, $options) !!}
        <?php unset($options['id']) ?>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        <?php $options['id'] = 'description_list' ?>
        {!! Form::select('description_sel', ['' => ''] + $invoice_item_list->toArray(), null, $options) !!}
        <?php $options['id'] = 'description' ?>
        {!! Form::hidden('description', null, $options) !!}
        <?php unset($options['id']) ?>
    </div>

    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:', ['class' => 'control-label']) !!}
        {!! Form::text('quantity', null, $options) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price:', ['class' => 'control-label']) !!}
        {!! Form::text('price', null, $options) !!}
    </div>

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary', 'onclick' => 'populateDescription()']) !!}

@section('footer1')
<script type="text/javascript">
    $('#category_list').select2({
        placeholder: "Choose a category",
        tags: false,
        theme: "classic"
    });

    var $desc = $('[name="description"]').val();
    var $sel = $('#description_list').select2();
    $('#description_list').select2({
        placeholder: "Choose an item",
        tags: true,
        theme: "classic",
    });
    $sel.val($desc).trigger("change");

    // when the form is submitted, populate the hidden description field
    // with the value of the select
    // makes it easier to test as we can just populate the description field
    // directly rather than mucking around with the jquery select2 element
    function populateDescription() {
      $('[name="description"]').val($('#description_list').val());
    }
</script>
@stop
