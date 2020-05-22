<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('order_invoice');?></span>
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
            <li class="active"><?php _el('invoice');?></li>
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
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="panel-title">
                                <i class="icon-store2 text-info position-left"></i>
                                <strong><?php echo get_settings('company_name'); ?></strong>
                            </h3>
                        </div>
                    </div>
                    <div class="heading-elements">
                        <a href="<?php echo base_url('admin/orders/print_invoice/').$order['id']; ?>" class="btn btn-info btn-sm"><i class="icon-printer2 position-left"></i><?php _el('print_invoice');?></a>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
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
                	}

                ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table>
                                <thead>
                                    <tr><th colspan="3"><u><h4 class="panel-title"><strong><?php _el('order_details');?></strong></h4></u></th></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold"><?php _el('invoice_number');?></td><td>&nbsp;:&nbsp;</td><td><?php echo $order['invoice_number']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold"><?php _el('order_date');?></td><td>&nbsp;:&nbsp;</td><td><?php echo date('jS F Y  h:i:s A', strtotime($order['order_date'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold"><?php _el('order_number');?></td><td>&nbsp;:&nbsp;</td><td><?php echo $order['order_number']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold"><?php _el('payment_method');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords($order['payment_method']); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table>
                                <thead>
                                    <tr><th colspan="3"><u><h4 class="panel-title"><strong><?php _el('billing_details');?></strong></h4></u></th></tr>
                                </thead>
                                <?php
                                	$user    = get_user_info($order['user_id']);
                                	$address = get_user_address($order['user_id']);
                                ?>
                                <tbody>
                                    <tr>
                                        <td class="text-bold"><?php _el('customer_name');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords($user['firstname'].' '.$user['lastname']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-semibold"><?php _el('address');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords($address['house_or_village'].', '.$address['street_or_society']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold"><?php _el('city');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords(get_city_name($address['city_id'], 'name')); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold"><?php _el('pincode');?></td><td>&nbsp;:&nbsp;</td><td><?php echo $address['pincode']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered table-framed table-sm table-striped rounded">
                                <thead>
                                    <tr>
                                        <th width="40%" ><?php _el('product_name');?></th>
                                        <th width="20%" ><?php _el('price');?></th>
                                        <th width="20%" ><?php _el('quantity');?></th>
                                        <th width="20%" ><?php _el('total_amount');?></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

	foreach ($order_items as $key => $item)
	{
	?>
    <tr>
        <td><?php echo ucwords($item['name']); ?></td>
        <td><?php echo _l('currency_symbol').'. '.$item['price']; ?></td>
        <td><?php echo $item['item_quantity']; ?></td>
        <td><?php echo _l('currency_symbol').'. '.$item['total_amount']; ?></td>
    </tr>
<?php
	}

	if ($order['coupon_id'] != null)
	{
	?>

                                    <tr>
                                        <td colspan="3" class="text-right">
                                            <strong><?php _el('total_amount');?></strong>
                                            <br>
                                            <strong><?php echo _l('discount').' (-)'; ?></strong>
                                            <hr>
                                            <strong><?php _el('grand_total');?></strong>
                                        </td>
                                        <td>
                                            <?php echo '<i class="fa fa-inr"></i>'.'. '.$order['grand_total']; ?><br>
                                            <?php echo '<i class="fa fa-inr"></i>'.'. '.number_format($discount, 2, '.', ''); ?><hr>
                                            <?php echo '<i class="fa fa-inr"></i>'.'. '.number_format($total, 2, '.', ''); ?>
                                        </td>
                                    </tr>

                                <?php
                                	}
                                	else
                                	{
                                	?>
                                     <tr>
                                        <td colspan="3" class="text-right"><strong><?php _el('grand_total');?></strong></td>
                                        <td><?php echo _l('currency_symbol').'. '.$order['grand_total']; ?></td>
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
<!-- /Content area -->