<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('edit');?>&nbsp<?php _el('subscription')?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li >
                <a href="<?php echo base_url('admin/subscriptions'); ?>"><?php _el('subscriptions');?></a>
            </li>
            <li class="active"><?php _el('edit');?></li>
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
                                <strong><?php _el('subscription');?></strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                    <form action="<?php echo base_url('admin/subscriptions/edit/').$plan['id']; ?>" id="subscription_form" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <small class="req text-danger">* </small>
                                <label><?php _el('title');?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('title');?>" id="title" name="title" value="<?php echo $plan['title']; ?>">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <small class="req text-danger">* </small>
                                    <label><?php _el('cost');?>:</label>
                                    <input type="number" class="form-control" placeholder="<?php _el('cost');?>" id="cost" name="cost" value="<?php echo $plan['cost']; ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <small class="req text-danger">* </small>
                                    <label><?php _el('days');?>:</label>
                                    <input type="number" class="form-control" placeholder="<?php _el('days');?>" id="days" name="days" value="<?php echo $plan['days']; ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <small class="req text-danger">* </small>
                                    <label><?php _el('product');?>&nbsp<?php _el('limitations');?>:</label>
                                    <input type="number" class="form-control" placeholder="<?php _el('limitations');?>" id="product_limit" name="product_limit" value="<?php echo $plan['product_limit']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <small class="req text-danger">* </small>
                                    <label><?php _el('description');?>:</label>
                                </div>
                                <textarea id="description" name="description" rows="5" class="form-control" placeholder="<?php _el('description');?>"><?php echo $plan['description']; ?></textarea>
                            </div>
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
$("#subscription_form").validate({
    rules: {
        title: {
            required: true,
        },
        cost: {
            required: true,
        },
        days: {
            required: true,
        },
        product_limit: {
            required: true,
        },
        description: {
            required: true,
        },
    },
    messages: {
        title: {
            required:"<?php _el('please_enter_', _l('title'))?>",
        },
        cost: {
            required:"<?php _el('please_enter_', _l('cost'))?>",
        },
        days: {
            required:"<?php _el('please_enter_', _l('days'))?>",
        },
        product_limit: {
            required:"<?php _el('please_enter_', _l('limitations'))?>",
        },
        description: {
            required:"<?php _el('please_enter_', _l('description'))?>",
        },
    },
});
</script>
