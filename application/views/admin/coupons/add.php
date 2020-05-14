<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('add_coupon');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/coupons'); ?>"><?php _el('coupons');?></a>
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
                                <strong><?php _el('coupon');?></strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                    <form action="<?php echo base_url('admin/coupons/add'); ?>" id="coupon_form" method="POST" enctype="multipart/form-data">
                    	<!-- code -->
                        <div class="row">
                            <div class="form-group col-md-12">
	                            <small class="req text-danger">* </small>
	                            <label><?php _el('code');?>:</label>
	                            <input type="text" class="form-control" placeholder="<?php _el('code');?>" id="code" name="code">
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
                        <!-- qty select -->
                        <div class="row">
                            <div class="form-group col-md-12">
	                            <small class="req text-danger">* </small>
	                            <label><?php _el('quantity');?>:</label>
	                            <select class="form-control select-search" name="quantity" id="quantity" onchange="enable_quantity(this);" >
                                    <option value="" selected readonly disabled >----- Select Quantity -----</option>
                                    <option value="0"><?php _el('limited')?></option>
                                    <option value="1"><?php _el('unlimited')?></option>
                                </select>
                            </div>
                        </div>
                        <!-- qty add -->
                        <div class="row hidden" id="quantity_row"></div>
                        <!-- start date -->
                        <div class="row">
                            <div class="form-group col-md-12">
	                            <label><?php _el('start_date');?>:-<i><?php _el('optional');?></i></label>
	                            <input type="date" name="start_date" id="start_date" placeholder="<?php _el('start_date');?>"  class="form-control" min="<?php echo date('yy-m-d'); ?>">
                            </div>
                        </div>
                        <!-- end date -->
                        <div class="row">
                            <div class="form-group col-md-12">
	                            <label><?php _el('end_date');?>:-<i><?php _el('optional');?></i></label>
	                            <input type="date" name="end_date" id="end_date" placeholder="<?php _el('end_date');?>"  class="form-control" min="<?php echo date('yy-m-d'); ?>">
                            </div>
                        </div>
                        <!-- buttons -->
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
	var end_date 	= $(element).val();
	var start_date 	= $("#start_date").val();

	if(end_date != '' && start_date != ''){
		if(end_date <= start_date)
		{
			return false;
		}
	}
	return true;

},'<?php _el('greater_than_start_date')?>');



$("#coupon_form").validate({
    rules: {
    	code:{
    		required:true
    	},
    	type:{
    		required:true
    	},
    	quantity:{
    		required:true
    	},
    	amount:{
    		required:true,
    		digits: true
    	},
    	value:{
    		required:true
    	},
    	end_date: {
            greaterThan:true
        }
    },
    messages: {
    	code:{
    		required:"<?php _el('please_enter_', _l('code'))?>",
    	},
    	type:{
    		required:"<?php _el('please_select_', _l('type'))?>",
    	},
    	quantity:{
    		required:"<?php _el('please_select_', _l('quantity'))?>",
    	},
    	amount:{
    		required:"<?php _el('please_enter_', _l('value'))?>",
            digits:"<?php _el('only_digits');?>"
    	},
    	value:{
    		required:"<?php _el('please_enter_', _l('value'))?>",
    	}
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
    	$('#discount_row').append('<div class="form-group col-md-12 has-feedback " id="discount"><small class="req text-danger">* </small><label><?php _el('amount');?>:</label> <input type="text" Class="form-control" placeholder="<?php _el('amount');?>" id="amount" name="amount"><div class="form-control-feedback"><?php echo '&#8377;'; ?></div></div>');
    }
    //percentage value box.
    else if(discount == 1)
    {
    	$('#discount_row').removeClass('hidden');
    	$('#discount').remove();
    	$('#discount_row').append('<div class="form-group col-md-12 has-feedback " id="discount"><small class="req text-danger">* </small><label><?php _el('percentage');?>:</label> <input type="text" Class="form-control" placeholder="<?php _el('percentage');?>" id="percentage" max="100" name="amount"><div class="form-control-feedback"><?php echo '&#37;'; ?></div></div>');
    }
}


/**
 * Enable quantity box and append value input box.
 **/
function enable_quantity(obj)
{
    var quantity = obj.options[obj.selectedIndex].value;//value of the selected quantity option.

    //limited quantity value box.
    if(quantity == 0)
    {
    	$('#quantity_row').removeClass('hidden');
    	$('#quantity_input').remove();
    	$('#quantity_row').append('<div class="form-group col-md-12 " id="quantity_input"><small class="req text-danger">* </small><label><?php _el('value');?>:</label><input type="text" class="form-control" placeholder="<?php _el('value');?>" id="value" name="value"></div>');
    }
    //unlimited quantity value box.
    else if(quantity == 1)
    {
    	$('#quantity_row').addClass('hidden');
    	$('#quantity_input').remove();
    	$('#quantity_row').append('<div class="form-group col-md-12" id="quantity_input"><small class="req text-danger">* </small><label><?php _el('value');?>:</label><input type="hidden" class="form-control" placeholder="<?php _el('value');?>" id="value" name="value" value="0" readonly></div>');
    }
}
</script>
