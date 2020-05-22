<?php
	$user    = get_user_info($order['user_id']);
	$address = $this->users->get_user_addresses($order['user_id']);
?>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/order.css">
    <div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>"><?php _el('home');?></a></li>
                <li><a href="<?php echo base_url('orders'); ?>"><?php _el('orders');?></a></li>
                <li class='active'><?php _el('details');?></li>

            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

</head>
<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
    <div class="col-md-12 col-sm-12 sign-in">
        <center>
        <h4 class=""><?php _el('details');?></h4>
        </center>
    <div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Panel -->
            <div class="row">
                <div class="col-md-6">
                    <table  class="table table-responsive">
                      <thead>
                      <tr>
                        <th colspan="3"><h3 class="panel-title"><strong><?php _el('order_details');?></strong></h3></th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                    
                        <td><?php _el('order_number');?></td>
                        <td>:</td>
                        <td><?php echo $order['order_number']; ?></td>
                      </tr>
                      <tr>
                        <td><?php _el('total_products');?></td>
                        <td>:</td>
                        <td><?php echo $order['total_products']; ?></td>

                      </tr>
                      <tr>
                        <td><?php _el('grand_total');?></td>
                        <td>:</td>
                        <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?php echo '.'.$order['grand_total']; ?></td>

                      </tr>
                      <tr>
                        <td><?php _el('order_date');?></td>
                        <td>:</td>
                        <td><?php echo date('jS F Y  h:i:s A', strtotime($order['order_date'])); ?></td>

                      </tr>
                        <tr>
                        <td><?php _el('payment_method');?></td>
                        <td>:</td>
                        <td><?php echo ucwords($order['payment_method']); ?></td>

                      </tr>
                        <tr>
                        <td><?php _el('payment_status');?></td>
                        <td>:</td>
                        <td>
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

                  </tbody>
                </table>
            </div>

            <div class="col-md-6">

                 <table  class="table table-responsive">

                     <?php
                     if(!empty($address))
                     {
                     	foreach ($address as $address)
                     	{
                     	?>
                      <thead>
                      <tr>
                        <th colspan="3"><h3 class="panel-title"><strong><?php _el('billing_details');?></strong></h3></th>
                      </tr>
                     </thead>
                     <tbody>
                      <tr>

                        <td><?php _el('customer_name');?></td>
                        <td>:</td>
                        <td><?php echo ucwords($user['firstname'].' '.$user['lastname']); ?></td>
                      </tr>
                      <tr>
                        <td><?php _el('email');?></td>
                        <td>:</td>
                        <td><a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></td>

                      </tr>
                      <tr>
                        <td><?php _el('mobile_no');?></td>
                        <td>:</td>
                        <td><a href="tel:<?php echo $user['mobile']; ?>"><?php echo $user['mobile']; ?></a></td>

                      </tr>
                      <tr>
                        <td><?php _el('address');?></td>
                        <td>:</td>
                        <td><?php echo ucwords($address['house_or_village'].', '.$address['street_or_society']); ?></td>

                      </tr>
                        <tr>
                        <td><?php _el('city');?></td>
                        <td>:</td>
                        <td><?php if($address['city_id']){ echo ucwords(get_city_name($address['city_id'], 'name')); }?></td>

                      </tr>
                        <tr>
                        <td><?php _el('state');?></td>
                        <td>:</td>
                        <td><?php if($address['state_id']){ echo ucwords(get_state_name($address['state_id'], 'name')); }?></td>

                      </tr>
                       </tr>
                        <tr>
                        <td><?php _el('pincode');?></td>
                        <td>:</td>
                        <td><?php echo $address['pincode']; ?></td>

                      </tr>

                       <?php
                       	}
                       }

                       ?>
                      </tbody>
                 </table>

            </div>
            </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table  class="table table-responsive product">
                                <thead>
                                <tr>
                                <th colspan="7"><h3 class="panel-title"><strong><?php _el('products_ordered');?></strong></h3></th>
                                </tr>

                                <tr>
                                    <th width="20%"><?php _el('product_name');?></th>
                                    <th width="20%"><?php _el('shop_name');?></th>
                                    <th width="15%"><?php _el('price');?></th>
                                    <th width="10%"><?php _el('quantity');?></th>
                                    <th width="15%"><?php _el('total_amount');?></th>
                                    <th class="text-center" ><?php _el('status');?></th>
                                    <?php

                                    	if ($order['payment_status'] == 1)
                                    	{
                                    	?>
                                    <th class="text-center" width="5%"><?php _el('action');?></th>
                                  <?php }
                                  	else
                                  	{
                                  	?>
                                   <th class="text-center" width="5%"><?php _el('total');?></th>
                                  <?php }

                                  ?>
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
                                    <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?php echo '.'.$item['price']; ?></td>
                                    <td><?php echo $item['item_quantity']; ?></td>
                                    <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?php echo '.'.$item['total_amount']; ?></td>
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
                                     <?php

                                     		if ($order['payment_status'] == 1)
                                     		{
                                     		?>
                                      <td width="10%"><center><a title="<?php _el('invoice')?>" href="<?php echo base_url('orders/invoice/').$order['id'].'/'.$item['vendor_id']; ?>"><i class='fa fa-file-text-o' style="font-size: 20px;color: orange"></i></a></center></td>
                                    <?php }
                                    	}

                                    ?>

                                </tr>

                                <tr rowspan="2" style="border-top: 1px solid #ddd;"><td><b><?php _el('amount_in_Words');?><?php echo str_repeat('&nbsp;', 1); ?>:<?php echo str_repeat('&nbsp;', 1); ?></b><br></td><td colspan="2"><?php echo no_to_words($order['grand_total']); ?></td><td colspan="3" class="text-right"><strong><?php _el('grand_total');?></strong></td><td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?php echo '.'.$order['grand_total']; ?></td></tr>

                              </tbody>
                            </table>

                              <br>
                              <br>
                              <hr>

                        </div>
                    </div>

        </div>
    </div>
</div>
<!-- /Content area-->
</div>
</div>
</div>
</div>
</br>
<hr>
