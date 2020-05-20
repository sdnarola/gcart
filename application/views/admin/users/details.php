  <div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('user_details')?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/users'); ?>"><?php _el('users');?></a>
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
                        <div class="form-group col-md-12">
                            <div class="pull-right">
                                <a href="javascript:window.history.back();" class="btn btn-default"><i class="icon-undo2 position-left"></i><?php _el('back');?></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                           <div class="thumbnail">
                                <div class="thumb">
                                    <img src="<?php echo base_url().$user['profile_image'] ?>">
                                    <div class="caption-overflow">
                                        <span>
                                            <a href="<?php echo base_url().$user['profile_image'] ?>" target="_blank" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <table class="table table-hover table-framed table-sm table-striped rounded">
                              <thead>
                                <tr class="alpha-slate"><th colspan="3"><h3 class="panel-title"><strong><?php _el('user');?></strong></h3></th></tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('name');?></td><td width="10%">:</td><td width="40%"><?php echo ucfirst($user['firstname']) . ' ' . ucfirst($user['lastname']);?></td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('email');?></td><td width="10%">:</td><td width="40%"><a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('mobile_no');?></td><td width="10%">:</td><td width="40%"><?php echo $user['mobile']; ?></td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('last_login');?></td><td width="10%">:</td><td width="40%"><?php $time =time_to_words($user['last_login']); echo $time.' '._l('ago'); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('email_varified');?></td><td width="10%">:</td><td width="40%">
<?php                                           if($user['is_email_verified']==1) 
                                                {
                                                   echo ' '.'<span class="label label-success label-rounded">'._l('varified').'</span>';
                                                }
                                                else
                                                {
                                                   echo ' '.'<span class="label label-danger label-rounded">'._l('not_varified').'</span>';
                                                } 
?>   
                                                </td>
                                </tr>
                             </tbody>
                            </table>
                        </div>
                        <div class="col-md-5">
                            <table class="table table-hover table-framed table-sm table-striped rounded">
                                <thead>
                                    <tr class="alpha-slate"><th colspan="3"><h3 class="panel-title"><strong><?php _el('address')?> <?php _el('details');?></strong></h3></th></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('address');?></td><td width="10%">:</td><td width="40%"><?php echo ucwords($address['house_or_village'].', '.$address['street_or_society'].', '); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('landmark');?></td><td width="10%">:</td><td width="40%"><?php echo ucwords($address['landmark'].', '); ?></td>
                                    </tr>
<?php
                                    $city = get_city_name($address['city_id'],'name');
                                    $state = get_state_name($address['state_id'],'name'); 
?>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('city');?></td><td width="10%">:</td><td width="40%"><?php echo ucfirst($city); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('state');?></td><td width="10%">:</td><td width="40%"><?php echo ucfirst($state); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('pincode');?></td><td width="10%">:</td><td width="40%"><?php echo $address['pincode']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                     <br><hr><br>
                     <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-framed table-sm table-striped rounded">
                               <thead>
                                <tr class="alpha-slate"><th colspan="5"><h3 class="panel-title"><strong><?php _el('products_ordered');?></strong></h3></th></tr>
                                </thead> 
                                <thead>
                                    <th width="30%"><?php _el('order_number')?></th>
                                    <th width="30%" ><?php _el('order_date')?></th>
                                    <th width="20%"><?php _el('amount')?></th>
                                    <th width="10%"  class="text-center"><?php _el('status')?></th>
                                    <th width="10%" class="text-center"><?php _el('actions')?></th>
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
                                            <?php echo $record['order_number'] ?>
                                        </td>
                                        <td>
                                            <?php echo $record['order_date'] ?>
                                        </td>        
                                        <td><?php echo _l('currency_symbol').' '.$record['grand_total'] ?></td>
                                        <td class="text-center">
<?php
                                        if($record['order_status'] == 0) 
                                        {
                                                  echo '<span class="label label-warning label-rounded">'. _l('pending') .'</span>';
                                        } elseif($record['order_status'] == 1) 
                                        {
                                                echo '<span class="label label-info label-rounded">'. _l('processing') .'</span>';
                                        } elseif($record['order_status'] == 2) 
                                        {
                                                  echo '<span class="label label-success label-rounded">'. _l('completed') .'</span>';
                                        } elseif($record['order_status'] == 3)
                                        {
                                                  echo '<span class="label label-danger label-rounded">'. _l('Declined') .'</span>';
                                        }
?>
                                        </td>       
                                        <td class="text-center">
                                                 <a data-popup="tooltip"  data-placement="top"  title="<?php _el('details')?>" href="<?php echo site_url('admin/orders/details/') . $record['id']; ?>" class=" text-slate" ><i class="icon-info3"></i></a>
                                        </td>
                                    </tr>
<?php
                                    }
                                }
                                else
                                {
                                    echo "<tr >
                                            <td colspan=5 class='text-center'>". _l('no_data_found'). "</td>
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
<!-- /Content area -->