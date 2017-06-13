@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')
<div class='page-header'><h3>List of Albums</h3></div>

<div class="form-group">
    {!!  Form::label('band', 'Band:', ['class' => 'control-label']) !!}
    {!!  Form::select('band_id', $bands, $selected, ['class' => 'form-control', 'id'=>'band_id']); !!}
</div>

@include('albums.partial')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
<script>
    $(document).ready(function() {
        $("select").change(function() {
            var band_id = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
               type: "POST",
               url: "{{ url('albums-filtered') }}",
               dataType: "text",
               data: { band_id:band_id, 'csrf-token': '{{ csrf_token() }}' },
               error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
               },
               success: function(data) {
                    $('#response').html(data);
               }
            });
        });
     });
</script>

@stop
