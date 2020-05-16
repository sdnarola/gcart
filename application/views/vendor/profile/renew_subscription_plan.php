<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $this->page_title; ?></title>
<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin/css/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin/css/icons/fontawesome/styles.min.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin/css/core.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin/css/components.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin/css/colors.css'); ?>" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->

<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/loaders/pace.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/core/libraries/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/core/libraries/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/loaders/blockui.min.js'); ?>"></script>
<!-- /core JS files -->
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/core/libraries/jquery_ui/interactions.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/selects/select2.min.js'); ?>"></script>
</head>

<body>
<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('vendors');?></span>
            </h4>
        </div>
    </div>
</div>
<!-- /Page header -->
    <div class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                        <!-- Panel -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h5 class="panel-title">
                                                <strong><?php _el('subscriptions');?></strong>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Panel heading -->
                                <!-- Panel body -->
                            <div class="panel-body">
<?php
                            $key = md5($vendor['id'] + $vendor['mobile']);
?>
                            <form action="<?php echo base_url('vendor/profile/renew_paln_link/').$vendor['id'].'/'.$key; ?>" id="subscription_form" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <small class="req text-danger">* </small>
                                      <label><?php _el('subscriptions') ?></label>
                                      <select class="select-search" name="plan_id" id="plan_id">
                                        <option value="0" selected readonly disabled>----- Select Subscription -----</option>
<?php
                                        foreach($plans as $plan)
                                        {
?>
                                            <option id="$plan['id']" name="plan" value="<?php echo $plan['id'] ?>"
                                                <?php
                                                        if ($plan['id'] == $vendor['subscription_id'])
                                                        {
                                                            echo ' selected';
                                                        }
                                                    ?>> <?php echo ucfirst($plan['title']) ?></option>
<?php
                                        }
?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="vendor_id" value="<?php echo $vendor['id']; ?>">
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-12">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary"><i class="icon-checkmark3 position-left"></i><?php _el('save');?></button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer text-muted text-center pl-20">
                    <?php echo date('Y') ?>. <a href="#">Vendor Panel</a> by <a target="_blank">
                    <?php echo get_settings('company_name'); ?></a>
            </div>
        </div>
    </div>
</div>      
</body>

<script type="text/javascript">
$('.select-search').select2();
</script>
