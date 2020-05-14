<!-- Page header -->

<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('add_sale');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/sales'); ?>"><?php _el('sales');?></a>
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
                                <strong><?php _el('sale');?></strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                    <form action="<?php echo base_url('admin/sales/add'); ?>" id="sale_form" method="POST" enctype="multipart/form-data">
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


$("#sale_form").validate({
    rules: {
        product_id: {
            required: true
        },
        type:{
            required:true
        },
        value:{
            required:true,
            digits:true
        }
    },
    messages: {
        product_id: {
            required:"<?php _el('please_select_', _l('product'))?>",
        },
        type: {
            required:"<?php _el('please_select_', _l('discount_type'))?>",
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
        $('#discount_row').append('<div class="form-group col-md-12 has-feedback " id="discount"><small class="req text-danger">* </small><label><?php _el('amount');?>:</label> <input type="text" Class="form-control" placeholder="<?php _el('amount');?>" id="value" name="value"><div class="form-control-feedback"><?php echo '&#8377;'; ?></div></div>');
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
