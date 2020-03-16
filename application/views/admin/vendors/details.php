  <div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('vendor');?> <?php _el('details');?> </span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li class="active"><?php _el('vendors');?></li>
             <li >
                <a href="<?php echo base_url('admin/vendors'); ?>"><?php _el('list');?></a>
            </li>
              <li class="active"><?php _el('details');?></li>
        </ul>
    </div>
</div>
<!-- /Page header -->

<!-- Content area -->
<div class="content">
    <!-- Panel -->
    <div class="panel panel-flat">
        <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="panel-title">
                                <strong><?php _el('vendor')?></strong>
                            </h5>
                        </div>
                    </div>
        </div>
        <div class="body-area">
            <div class="row">
                <!-- table shows the user's details -->
            <div class="panel-body table-responsive">
                <div class="col-md-6">
                        <fieldset>
                            <legend class="text-semibold"><i class="icon-reading position-left"></i><?php _el('vendor')?> <?php _el('details')?></legend>
<?php

    if ($vendor) 
    {         
        $file = basename($vendor['profile_image']);
?>
                        <table class="table table-borderless">
                             <tbody>
                                 <!-- profile pic display -->
                                    <tr>
                                        <th>profile</th>
                                        <td>
                                            <img src="<?php echo base_url() . 'assets/Uploads/vendors/profile/' . $file; ?>" alt="<?php _el('img_alt_msg')?>" height="226" width="226" border="2" class="img-circle">
                                        </td>
                                    </tr>
                                    <tr >
                                        <th><?php echo _el('name'); ?></th>
                                        <td><?php echo ucfirst($vendor['firstname'])?> <?echo ucfirst($vendor['lastname']); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('email'); ?></th>
                                        <td><a href="mailto:<?php echo $vendor['email']; ?>"><?php echo $vendor['email'] ?></a></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('mobile_no'); ?></th>
                                        <td><?php echo $vendor['mobile'] ?></td>
                                    </tr>
                                     <tr>
                                        <th><?php echo _el('address'); ?></th>
                                        <td><?php echo ucfirst($vendor['address']) ?>,
                                        <tr><th></th><td><?php echo _el('city'); ?>:<?php echo ucfirst($vendor['city']) ?>,</td></tr>
                                        <tr><th></th><td><?php echo _el('pincode'); ?>:<?php echo ucfirst($vendor['pincode']) ?></td></tr>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('subscription_plan'); ?></th>  
                                        <td>
<?php
    //for subscription title display either deleted or not 
    $del = get_subscription_info($vendor['subscription_id'],'is_deleted');
    if($del == 1)
    {
        echo "<del>".get_subscription_info($vendor['subscription_id'],'title')."</del>";
    }
    else
    {
     echo get_subscription_info($vendor['subscription_id'],'title'); 
    }    
    //for expired subscription lebel
    $expire = expire_subscription($vendor['id']);
    if($expire == 1)
    {
        echo ' '.'<span class="label label-danger">'._l('expired').'</span>';
    }
?>
                                        </td>
                                   </tr>

                                    <tr>
                                        <th><?php echo _el('join_date'); ?></th>
                                        <td><?php $time =time_to_words($vendor['subscribe_date']); echo $time; ?> <?php _el('ago'); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('last_login'); ?> </th>
                                            <td>
                                                <?php $time =time_to_words($vendor['last_login']); echo $time; ?> <?php _el('ago');?>
                                            </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('email_varified'); ?> </th>
                                        <td>
<?php 
                                                if($vendor['is_email_verified']==1) 
                                                {
?>
                                                    <span class="label label-success"><?php _el('varified')?></span>
<?php                                                                
                                                }
                                                else
                                                {
?>
                                                  
                                                   <span  class="label label-danger"><?php _el('not_varified');?></span>   
<?php
                                                }
?>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </div>


                <!-- table shows the user's address details -->
                <div class="col-md-6">
<?php
    $file = basename($vendor['logo']);
?>
                   <fieldset>
                            <legend class="text-semibold"><i class="icon-store reading position-left"></i><?php _el('shop')?> <?php _el('details')?></legend>
                           
                        <table class="table table-borderless">
                            <tbody>
                                     <tr>
                                        <th>logo</th>
                                        <td>
                                            <img src="<?php echo base_url() . 'assets/Uploads/vendors/logo/' . $file; ?>" alt="<?php _el('img_alt_msg')?>" height="226" width="226" border="10" class="img-circle">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php _el('owner');?>&nbsp<?php _el('name');?></th>
                                        <td><?php echo ucfirst($vendor['owner_name']); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php _el('shop');?>&nbsp<?php _el('name');?></th>
                                        <td><?php echo ucfirst($vendor['shop_name']); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php _el('shop');?>&nbsp<?php _el('number');?></th>
                                        <td><?php echo ucfirst($vendor['shop_number']); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php _el('shop');?>&nbsp<?php _el('details');?></th>
                                        <td><textarea cols=60 rows=8 readonly="true"><?php echo ucfirst($vendor['shop_details']); ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <th><?php _el('total');?>&nbsp<?php _el('products');?></th>
                                        <td><?php echo $vendor['total_products']; ?></td>
                                    </tr>
<?php     
    }
?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    </div>
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="panel-title">
                                <strong><?php _el('products_added');?></strong>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="panel-body table-responsive">
                 <!-- table shows the user's orders details -->
                    <table id="info_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="20%"><?php _el('product')?> <?php _el('name')?></th>
                                <th width="20%" ><?php _el('category')?></th>
                                <th width="10%" ><?php _el('price')?></th>
                                <th width="10%" ><?php _el('stock')?></th>
                                <th width="10%" class="text-center"><?php _el('product')?> <?php _el('status')?></th>
                                <th width="10%" class="text-center"><?php _el('category')?> <?php _el('status')?></th>
                                <th width="8%" class="text-center"><?php _el('actions')?></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
        if ($records) 
        {
        	foreach ($records as $record) 
            {
?>
                            <tr>
                                <td>
                                    <?php echo $record['name'] ?>
                                </td>
                                <td>
                                    <?php echo $record['category_name'] ?>
                                </td>
                                <td>
                                    <?php echo $record['price'] ?>
                                </td>
                                <td>
                                    <?php echo $record['quantity'] ?>
                                </td>
                                <td class="text-center switchery-sm">
                                    <input type="checkbox" class="switchery" id="<?php echo $record['id']; ?>" <?php if ($record['is_active'] == 1) {echo "checked";}?> readonly>
                                </td>
                                <td class="text-center switchery-sm">
                                    <input type="checkbox"  class="switchery"  id="<?php echo $record['id']; ?>" <?php if ($record['category_status'] == 1) {echo "checked";}?> readonly>
                                </td>
                                <td class="text-center">
                                    <a data-popup="tooltip"  data-placement="top"  title="<?php _el('details')?>" href="<?php echo site_url('admin/products/details/') . $record['id']; ?>" class=" text-slate" ><i class="icon-info3"></i></a>
                                </td>
                            </tr>
<?php
            }
        }
?>
                         </tbody>
                    </table>
                </div>
    <!-- /Panel -->
</div>
<!-- /Content area -->

<script type="text/javascript">
$(function() {

    $('#info_table').DataTable({
        'columnDefs': [ {
        'targets': [4,5,6], /* column index */
        'orderable': false, /* disable sorting */
        }],

    });

    //add class to style style datatable select box
    $('div.dataTables_length select').addClass('datatable-select');
 });
</script>