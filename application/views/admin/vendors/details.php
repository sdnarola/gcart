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
    <div class="row">
        <div class="col-md-12">
            <!-- Panel -->
            <div class="panel panel-flat">
                <!-- Panel heading -->
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                    <div class="row">  
                        <div class="col-md-6">
                            <fieldset>
                            <legend class="text-semibold"><i class="icon-reading position-left"></i><?php _el('vendor')?> </legend>
<?php
 $file = basename($vendor['profile_image']);
?>
                                <p style="text-align:center;"><img  src="<?php echo base_url() . 'assets/Uploads/vendors/profile/' . $file; ?>" alt="<?php _el('img_alt_msg')?>" height="226" width="226" border="2" ></p>
                             
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                            <legend class="text-semibold"><i class="icon-store position-left"></i><?php _el('shop')?> </legend>

<?php
 $file = basename($vendor['logo']);
?>
                                    <p style="text-align:center;"><image class="center" src="<?php echo base_url() . 'assets/Uploads/vendors/logo/' . $file; ?>" alt="<?php _el('img_alt_msg')?>" height="226" width="226" border="2"></image></p>   
                            </fieldset>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover table-framed table-sm table-striped rounded">
                              <thead>
                                <tr class="alpha-slate"><th colspan="3"><h3 class="panel-title"><strong><?php _el('vendor')?> <?php _el('details')?></strong></h3></th></tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('name');?></td><td width="10%">:</td><td width="40%"><?php echo ucfirst($vendor['firstname'])?> <?echo ucfirst($vendor['lastname']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('email');?></td><td width="10%">:</td><td width="40%"><a href="mailto:<?php echo $vendor['email']; ?>"><?php echo $vendor['email'] ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('mobile_no');?></td><td width="10%">:</td><td width="40%"><?php echo $vendor['mobile'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('address');?></td><td width="10%">:</td>
                                    <td width="40%"><?php echo ucfirst($vendor['address']) ?>  
                                    </td>
                                </tr>
                                <tr> 
                                    <td width="40%" class="text-semibold"><?php _el('city');?></td>
                                    <td width="10%">:</td>
                                    <td><?php echo ucfirst($vendor['city']) ?>,</td>
                                </tr>
                                <tr> 
                                    <td width="40%" class="text-semibold"><?php _el('pincode');?></td><td width="10%">:</td>
                                            <td><?php echo ucfirst($vendor['pincode']) ?>,</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('subscription_plan');?></td><td width="10%">:</td><td width="40%">
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
                                            echo ' '.'<span class="label label-danger label-rounded">'._l('expired').'</span>';
                                        }
?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('join_date');?></td><td width="10%">:</td>
                                    <td width="40%">
                                       <?php $time =time_to_words($vendor['subscribe_date']); echo $time; ?> <?php _el('ago'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('email_varified');?></td><td width="10%">:</td>
                                    <td width="40%">
<?php 
                                                if($vendor['is_email_verified']==1) 
                                                {
?>
                                                    <span class="label label-success label-rounded"><?php _el('varified')?></span>
<?php                                                                
                                                }
                                                else
                                                {
?>             
                                                   <span  class="label label-danger label-rounded"><?php _el('not_varified');?></span>   
<?php
                                                }
?>
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>

                         <div class="col-md-6">
                            <table class="table table-hover table-framed table-sm table-striped rounded">
                              <thead>
                                <tr class="alpha-slate"><th colspan="3"><h3 class="panel-title"><strong><?php _el('shop')?> <?php _el('details')?></strong></h3></th></tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('owner');?> <?php _el('name');?></td><td width="10%">:</td><td width="40%"><?php echo ucfirst($vendor['owner_name']); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('shop');?> <?php _el('name');?></td><td width="10%">:</td><td width="40%"><?php echo ucfirst($vendor['shop_name']); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('shop');?> <?php _el('number');?></td><td width="10%">:</td><td width="40%"><?php echo ucfirst($vendor['shop_number']); ?></td>
                                </tr>

                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('shop');?> <?php _el('details');?></td><td width="10%">:</td>
                                    <td width="40%"><?php echo ucfirst($vendor['shop_details']); ?></td>
                                </tr>
                                <tr> <td width="40%" class="text-semibold"><?php _el('total');?>&nbsp<?php _el('products');?>
                                </td><td width="10%">:</td>
                                            <td><?php echo $vendor['total_products']; ?></td></tr>                           
                              </tbody>
                            </table>
                        </div>
                    </div>
 <br><hr><br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-framed table-sm table-striped rounded">
                                <thead>
                                <tr class="alpha-slate"><th colspan="7"><h3 class="panel-title"><strong><?php _el('products_added');?></strong></h3></th></tr>
                                </thead>
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
            <td><?php echo $record['name'] ?></td>
            <td><?php echo $record['category_name'] ?></td>
            <td><?php echo $record['price'] ?></td>
            <td><?php echo $record['quantity'] ?></td>
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
else
        {
            echo "<tr >
                    <td colspan=7 class='text-center'>". _l('no_data_found'). "</td>
                </tr>";
        }

?>
                                  </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /Panel body -->
            </div>
            <!-- /Panel -->
        </div>
    </div>
</div>
<!-- /Content area-->

   

           











































        