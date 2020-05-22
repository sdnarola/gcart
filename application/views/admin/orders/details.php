<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('order_details');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/orders'); ?>"><?php _el('orders');?></a>
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
                        <div class="col-md-6">
                            <table class="table table-hover table-framed table-sm table-striped rounded">
                              <thead>
                                <tr class="alpha-slate"><th colspan="3"><h3 class="panel-title"><strong><?php _el('order_details');?></strong></h3></th></tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('order_number');?></td><td width="10%">:</td><td width="40%"><?php echo $order['order_number']; ?></td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('total_products');?></td><td width="10%">:</td><td width="40%"><?php echo $order['total_products']; ?></td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('grand_total');?></td><td width="10%">:</td><td width="40%"><?php echo _l('currency_symbol').'. '.$order['grand_total']; ?></td>
                                </tr>
                                <?php

                                	if ($order['coupon_id'] != null)
                                	{
                                		$coupon = get_coupon_info($order['coupon_id']);
                                		$code   = $coupon['code'];

                                		if ($coupon['type'] == 1)
                                		{
                                			$discount = $order['grand_total'] * ($coupon['amount'] / 100);
                                			$total    = $order['grand_total'] - $discount;
                                		}
                                		else
                                		{
                                			$discount = $coupon['amount'];
                                			$total    = $order['grand_total'] - $coupon['amount'];
                                		}

                                	?>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('coupon');?></td><td width="10%">:</td><td width="40%"><?php echo $coupon['code']; ?></td>
                                    </tr>
                                        <?php
                                        	}

                                        ?>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('order_date');?></td><td width="10%">:</td><td width="40%"><?php echo date('jS F Y  h:i:s A', strtotime($order['order_date'])); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('payment_method');?></td><td width="10%">:</td><td width="40%"><?php echo ucwords($order['payment_method']); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%" class="text-semibold"><?php _el('payment_status');?></td><td width="10%">:</td>
                                    <td width="40%">
                                        <?php

                                        	if ($order['payment_status'] == 1)
                                        	{
                                        		echo '<span class="label label-success label-rounded">Paid</span>';}
                                        	else
                                        	{
                                        		echo '<span class="label label-warning label-rounded">Unpaid</span>';}

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-center"><a href="<?php echo base_url('admin/orders/invoice/').$order['id']; ?>" class="btn btn-sm bg-teal-700 btn-labeled"><b><i class="icon-calculator4"></i></b>View Invoice</a>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <table class="table table-hover table-framed table-sm table-striped rounded">
                                <thead>
                                    <tr class="alpha-slate"><th colspan="3"><h3 class="panel-title"><strong><?php _el('billing_details');?></strong></h3></th></tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    	$user    = get_user_info($order['user_id']);
                                    	$address = get_user_address($order['user_id']);
                                    ?>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('customer_name');?></td><td width="10%">:</td><td width="40%"><?php echo ucwords($user['firstname'].' '.$user['lastname']); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('email');?></td><td width="10%">:</td><td width="40%"><a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('mobile_no');?></td><td width="10%">:</td><td width="40%"><a href="tel:<?php echo $user['mobile']; ?>"><?php echo $user['mobile']; ?></a></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('address');?></td><td width="10%">:</td><td width="40%"><?php echo ucwords($address['house_or_village'].', '.$address['street_or_society']); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('city');?></td><td width="10%">:</td><td width="40%"><?php echo ucwords(get_city_name($address['city_id'], 'name')); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="text-semibold"><?php _el('state');?></td><td width="10%">:</td><td width="40%"><?php echo ucwords(get_state_name($address['state_id'], 'name')); ?></td>
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
                                <tr class="alpha-slate"><th colspan="6"><h3 class="panel-title"><strong><?php _el('products_ordered');?></strong></h3></th></tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th width="20%"><?php _el('product_name');?></th>
                                        <th width="20%"><?php _el('shop_name');?></th>
                                        <th width="15%"><?php _el('price');?></th>
                                        <th width="15%"><?php _el('quantity');?></th>
                                        <th width="15%"><?php _el('total_amount');?></th>
                                        <th width="15%" class="text-center"><?php _el('vendor_status');?></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

	foreach ($order_items as $key => $item)
	{
	?>
    <tr>
        <td><?php echo ucwords($item['name']); ?></td>
        <td><?php echo ucwords(get_vendor_info($item['vendor_id'], 'shop_name')); ?></td>
        <td><?php echo _l('currency_symbol').'. '.$item['price']; ?></td>
        <td><?php echo $item['item_quantity']; ?></td>
        <td><?php echo _l('currency_symbol').'. '.$item['total_amount']; ?></td>
        <td class="text-center">
            <?php

            		if ($item['vendor_status'] == 1)
            		{
            			echo '<span class="label label-info label-rounded">Processing</span>';}
            		elseif ($item['vendor_status'] == 2)
            		{
            			echo '<span class="label label-success label-rounded">Completed</span>';}
            		elseif ($item['vendor_status'] == 3)
            		{
            			echo '<span class="label label-danger label-rounded">Declined</span>';}
            		else
            		{
            			echo '<span class="label label-warning label-rounded">Pending</span>';}

            	?>
        </td>
    </tr>
<?php
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
<!-- /Content area --!