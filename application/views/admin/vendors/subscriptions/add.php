<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('add'); ?> <?php _el('subscription')?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard'); ?></a>
            </li>
            <li class="active"><?php _el('vendors'); ?></li>
             <li>
                <a href="<?php echo base_url('admin/subscriptions'); ?>"><?php _el('subscriptions'); ?></a>
            </li>
            <li class="active"><?php _el('add'); ?></li>
        </ul>
    </div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
    <form action="<?php echo base_url('admin/subscriptions/add'); ?>" id="subscription_form" method="POST">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <!-- Panel -->
            <div class="panel panel-flat">
                <!-- Panel heading -->
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="panel-title">
                                <strong><?php _el('subscription'); ?></strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <small class="req text-danger">* </small>
                                <label><?php _el('title'); ?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('title'); ?>" id="title" name="title">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <small class="req text-danger">* </small>
                                    <label><?php _el('cost'); ?>:</label>
                                    <input type="number" class="form-control" placeholder="<?php _el('cost'); ?>" id="cost" name="cost">
                                </div>
                                <div class="form-group col-md-4">
                                    <small class="req text-danger">* </small>
                                    <label><?php _el('days'); ?>:</label>
                                    <input type="number" class="form-control" placeholder="<?php _el('days'); ?>" id="days" name="days" >
                                </div>
                                <div class="form-group col-md-4">
                                    <small class="req text-danger">* </small>
                                    <label><?php _el('product'); ?> <?php _el('limitations'); ?>:</label>
                                    <input type="number" class="form-control" placeholder="<?php _el('limitations'); ?>" id="limitations" name="limitations">
                                </div>
                        </div>
                            <div class="form-group">
                                <div>
                                    <small class="req text-danger">* </small>
                                    <label><?php _el('description'); ?>:</label>
                                </div>
                                <textarea id="description" name="description" cols="136" rows="5" placeholder="<?php _el('description');?>"></textarea>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Panel body -->	
            </div>
            <!-- /Panel -->
            </div>
        </div>
        <div class="btn-bottom-toolbar text-right btn-toolbar-container-out">
            <button type="submit" class="btn btn-success" name="submit"><?php _el('save'); ?></button>
            <a class="btn btn-default" onclick="window.history.back();"><?php _el('back'); ?></a>
        </div>
    </form>
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
        limitations: {
            required: true,          
        },
        description: {
            required: true,
        },
    },
    messages: {
        title: {
            required:"<?php _el('please_enter_', _l('title')) ?>",
        },
        cost: {
            required:"<?php _el('please_enter_', _l('cost')) ?>",
        },
        days: {
            required:"<?php _el('please_enter_', _l('days')) ?>",
        },        
        limitations: {
            required:"<?php _el('please_enter_', _l('limitations')) ?>",
        },
        description: {
            required:"<?php _el('please_enter_', _l('description')) ?>",
        }, 
    },
}); 
    	
</script>
