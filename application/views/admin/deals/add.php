<!-- Page header -->

<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('add_deal');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/deals'); ?>"><?php _el('deals');?></a>
            </li>
            <li class="active"><?php _el('add');?></li>
        </ul>
    </div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Panel -->
            <div class="panel panel-flat">
                <!-- Panel heading -->
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="panel-title">
                                <strong><?php _el('deal');?></strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                    <form action="<?php echo base_url('admin/deals/add'); ?>" id="deal_form" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <small class="req text-danger">* </small>
                                <label><?php _el('product');?>:</label>
                                <select class="form-control select-search" name="product_id" id="product_id" >
                                    <option value="0" selected readonly disabled >----- Select product -----</option>
<?php

	foreach ($products as $key => $product)
	{
	?>
    <option value="<?php echo $product['id']; ?>" name="product"><?php echo ucwords($product['name']); ?></option>
<?php
	}

?>
                                </select>
                            </div>
                        </div>
                        <!-- discount select-->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <small class="req text-danger">* </small>
                                <label><?php _el('type');?>:</label>
                                <select class="form-control select-search" name="type" id="type" onchange="enable_discount(this);">
                                    <option value="" selected readonly disabled >----- Select Type -----</option>
                                    <option value="0"><?php _el('discount_amount')?></option>
                                    <option value="1"><?php _el('discount_percentage')?></option>
                                </select>
                            </div>
                        </div>
                        <!-- discount add -->
                        <div class="row hidden" id="discount_row"></div>
                        <!-- start date -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <small class="req text-danger">* </small>
                                <label><?php _el('start_date');?>:</label>
                                <input type="date" name="start_date" id="start_date" placeholder="<?php _el('start_date');?>"  class="form-control" min="<?php echo date('yy-m-d'); ?>">
                            </div>
                        </div>
                        <!-- end date -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <small class="req text-danger">* </small>
                                <label><?php _el('end_date');?>:</i></label>
                                <input type="date" name="end_date" id="end_date" placeholder="<?php _el('end_date');?>"  class="form-control" min="<?php echo date('yy-m-d'); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary"><i class="icon-checkmark3 position-left"></i><?php _el('save');?></button>
                                    <a href="javascript:window.history.back();" class="btn btn-default"><i class="icon-undo2 position-left"></i><?php _el('back');?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /Panel body -->
            </div>
            <!-- /Panel -->
        </div>
    </div>
</div>
<!-- /Content area -->

<script type="text/javascript">
var BASE_URL = "<?php echo base_url(); ?>";


//to check start date and end date.
$.validator.addMethod("greaterThan", function(value, element) {
    var end_date    = $(element).val();
    var start_date  = $("#start_date").val();

    if(end_date != '' && start_date != ''){
        if(end_date <= start_date)
        {
            return false;
        }
    }
    return true;

},'<?php _el('greater_than_start_date')?>');

$("#deal_form").validate({
    rules: {
        product_id: {
            required: true
        },
        type:{
            required:true
        },
        start_date:{
            required:true
        },
        value:{
            required:true,
            digits:true
        },
        end_date: {
            required:true,
            greaterThan:true
        }
    },
    messages: {
        product_id: {
            required:"<?php _el('please_select_', _l('product'))?>",
        },
        type: {
            required:"<?php _el('please_select_', _l('discount_type'))?>",
        },
        start_date:{
            required:"<?php _el('please_enter_', _l('start_date'))?>",
        },
        end_date:{
            required:"<?php _el('please_enter_', _l('end_date'))?>",
        },
        value:{
            required:"<?php _el('please_enter_', _l('discount'))?>",
            digits:"<?php _el('only_digits');?>"
        },
    },
});

/**
 * Enable discount box and append amount input box.
 **/
function enable_discount(obj)
{
    var discount = obj.options[obj.selectedIndex].value;//value of the selected discount option.

    //amount value box.
    if(discount == 0)
    {
        $('#discount_row').removeClass('hidden');
        $('#discount').remove();
        $('#discount_row').append('<div class="form-group col-md-12 has-feedback " id="discount"><small class="req text-danger">* </small><label><?php _el('amount');?>:</label> <input type="text" Class="form-control" placeholder="<?php _el('amount');?>" id="value" name="value"><div class="form-control-feedback"><?php echo '<i class="fa fa-inr"></i>'; ?></div></div>');
    }
    //percentage value box.
    else if(discount == 1)
    {
        $('#discount_row').removeClass('hidden');
        $('#discount').remove();
        $('#discount_row').append('<div class="form-group col-md-12 has-feedback " id="discount"><small class="req text-danger">* </small><label><?php _el('percentage');?>:</label> <input type="text" Class="form-control" placeholder="<?php _el('percentage');?>" max="100" id="value" name="value"><div class="form-control-feedback"><?php echo '&#37;'; ?></div></div>');
    }
}
</script>
