<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Auto Logout after 15 mins (15*60=900 seconds) of inactivity -->
<meta http-equiv="refresh" content="900;url=<?php echo admin_url('authentication/autologout'); ?>" />

<title><?php echo $this->page_title; ?></title>

<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin/css/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin/css/core.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin/css/components.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin/css/colors.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/themes/default/css/font-awesome.css'); ?> " rel="stylesheet" type="text/css">
<!-- /global stylesheets -->
</head>
<body>
<main>
    <div class="row">
        <div class="col-md-12">
            <!-- Panel -->
            <div class="panel panel-flat">
                <!-- Panel heading -->
                <center><h2>GCART</h2></center>
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
                    <hr>
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
                                        <td class="text-bold"><?php _el('order_date');?></td><td>&nbsp;:&nbsp;</td><td><?php echo date('jS F Y', strtotime($order['order_date'])); ?></td>
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
                                        <td class="text-bold"><?php _el('address');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords($address['house_or_village'].', '.$address['street_or_society']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold"><?php _el('city');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords(get_city_name($address['city_id'], 'name')); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold"><?php _el('pincode');?></td><td>&nbsp;:&nbsp;</td><td><?php echo $address['pincode']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold"><?php _el('mobile');?></td><td>&nbsp;:&nbsp;</td><td><?php echo $user['mobile']; ?></td>
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

	if ($order_items)
	{
		foreach ($order_items as $key => $item)
		{
		?>
    <tr>
        <td><?php echo ucwords($item['name']); ?></td>
        <td><?php echo _l('rs_symbol').'. '.$item['price']; ?></td>
        <td><?php echo $item['item_quantity']; ?></td>
        <td><?php echo _l('rs_symbol').'. '.$item['total_amount']; ?></td>
    </tr>
<?php
	}
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
                                            <?php echo _l('rs_symbol').'. '.$order['grand_total']; ?><br>
                                            <?php echo _l('rs_symbol').'. '.number_format($discount, 2, '.', ''); ?><hr>
                                            <?php echo _l('rs_symbol').'. '.number_format($total, 2, '.', ''); ?>
                                        </td>
                                    </tr>

                                <?php
                                	}
                                	else
                                	{
                                	?>
                                    <tr>
                                        <td colspan="3" class="text-right"><strong><?php _el('grand_total');?></strong></td>
                                        <td><?php echo _l('rs_symbol').'. '.number_format($order['grand_total'], 2, '.', ''); ?></td>
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
<!-- /Content area -->
</main>
</body>
</html>