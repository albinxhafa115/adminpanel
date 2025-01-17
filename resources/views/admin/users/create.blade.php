@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::open( array( 'route' => ['users.index'], 'role' => 'form' ) ) }}
    @include('admin.users._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')

<script>
    $(document).ready(function(){
        var e = document.getElementById("showHide");
        var value = e.options[e.selectedIndex].value;


        if(value == 2 || value == 4 || value == 9){
            $("#company").show();
            $("#one_time_limit").show();
            $("#plates").show();
            $("#vehicle").show();
        }

        var value = $('#showHideEmail option:selected').val();
        if(value == 1){
            $(".email_settings").show();
        }else {
            $(".email_settings").hide();
        }

    });



    var dateNow = new Date();
      $('#datetimepicker').datepicker({
          defaultDate:dateNow
      });
    // Check has_limit field
    $(document).on('change','#showHideLimits',function(){
        var e = document.getElementById("showHideLimits");
        var value = e.options[e.selectedIndex].value;

        $('#txtpsw').val('');

        if(value == 1){
            $("#starting_balance").show();
            $("#has_limits").show();
            $('#daily_limit').show();
        }else {
            $("#starting_balance").hide();
            $("#has_limits").hide();
            $('#daily_limit').hide();
        }
    });

    // Check if company is selected and show discount fields
    $(document).on('click','#showHide',function(){
        var e = document.getElementById("showHide");
        var value = e.options[e.selectedIndex].value;

        if(value !== "") {
            if(value == 2 || value == 4 || value == 9){
                $("#company").show();
                $("#one_time_limit").show();
                $("#plates").show();
                $("#vehicle").show();
            }else {
                $("#company").hide();
                $("#one_time_limit").hide();
                $("#plates").hide();
                $("#vehicle").hide();
            }
        }

    });

    $(document).on('click','#showHideEmail',function(){
        var value = $('#showHideEmail option:selected').val();

        if(value == 1){
            $(".email_settings").show();
        }else {
            $(".email_settings").hide();
        }
    });

    //Append another div if button(discounts) + is clicked
    $(document).on('click','#addProduct',function(){
        $("#discounts").append('<div class="row" id="products" style="margin-top: 10px;"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeProduct"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="product[]" required><option value="">Choose Product</option><?php foreach($products as $pr){ ?><?php echo "<option value=".$pr->pfc_pr_id.">$pr->name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="discount[]" type="number" required></div></div>');
    });

    //Append another div if button(limits) + is clicked
    $(document).on('click','#addBranch',function(){
        $("#addlimits").append('<div class="row" id="branches"><div class="col-md-1"><button type="button" class="btn btn-danger btn-circle" id="removeBranch"><i class="glyphicon glyphicon-minus"></i></button></div><div class="col-md-5"><select class="form-control" name="new_branch[]" required><option value="">Choose Branch</option><?php foreach($branches as $id => $name){ ?><?php echo "<option value=".$id.">$name</option>" ?><?php } ?></select></div><div class="col-md-6"><input class="form-control" step="any" placeholder="0.01" name="new_limit[]" type="number" required></div></div><br>');
    });

    $(document).on('click','.deleteDiscount',function(){
        $(this).closest("#discount").remove();
    });

    $(document).on('click','#deleteLimit',function(){
        $(this).closest("#limit").remove();
    });

    $(document).on('click','#removeProduct',function(){
        $(this).closest("#products").remove();
    });

    $(document).on('click','#removeBranch',function(){
        $(this).closest("#branches").remove();
    });



</script>

@endsection
