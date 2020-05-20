<?php
  $user    = get_user_info($order['user_id']);                                                                            
  $address = $this->users->get_user_addresses($order['user_id']);                                         
 ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/order.css">
  <?php foreach ($order_items as $key => $item){
?>
<a href="<?php echo base_url('orders/print_pdf/').$order['id'].'/'.$item['vendor_id'];?>" target="_blank" class="btn btn-info btn-md" style="text-align: right;margin-left: 89%;margin-top:5px;"> <span class="glyphicon glyphicon-print"></span></a>
<?php break; 
} ?>
<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->                
    <div class="col-md-12 col-sm-12 sign-in">
        <center>
        <h4 class=""><?php _el('invoice');?></h4>
       
        </center>
    <div>
</div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-12">          
                       
                            <h4 style="border-bottom: none;" class="panel-title">
                                <i class="icon-store2 text-info position-left"></i>
                                <strong><?php echo get_settings('company_name'); ?></strong><br>
                                <?php
                                foreach ($order_items as $key => $item)
                                {
                                ?>
                               
                               <div class="col-md-6 col-sm-12 col-12">
                                <table  class="table table-responsive table-hover table-framed table-striped rounded" style="border:none">
                                
                                <tbody>
                                    <tr>
                                        <td><?php echo ucwords(get_vendor_info($item['vendor_id'], 'shop_name')); ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><?php echo ucwords(get_vendor_info($item['vendor_id'], 'owner_name')); ?></td>
                                    </tr>
                                    <tr>
                                      <td><?php echo ucwords(get_vendor_info($item['vendor_id'], 'address')); ?></td>
                                    </tr>
                                    <tr>
                                       <td><?php echo ucwords(get_vendor_info($item['vendor_id'], 'city')); ?></td>
                                   </tr>
                                   <tr>
                                       <td><?php echo ucwords(get_vendor_info($item['vendor_id'], 'pincode')); ?></td>
                                   </tr>
                                    <tr>
                                       <td><?php echo ucwords(get_vendor_info($item['vendor_id'], 'registration_number')); ?></td>
                                   </tr>
                                </tbody>
                                </table>
                             </div> 
                                <?php
                                break; }
                                ?>                        
                            
                        </h4>                   
              </div>                                                
     </div><!--row-->
    

                <!-- /Panel heading -->
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">

                            <table class="table table-responsive table-hover table-framed  table-striped rounded">
                               <thead>
                                    <tr><th colspan="3"><h3 class="panel-title"><b><?php _el('order_details');?></b></h3></th></tr>
                               </thead>
                               <tbody>
                                    <tr>
                                        <td><?php _el('invoice_date');?></td><td>&nbsp;:&nbsp;</td><td><?php echo date('jS F Y ', strtotime($order['invoice_date'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php _el('invoice_number');?></td><td>&nbsp;:&nbsp;</td><td><?php echo $order['invoice_number']; ?></td>
                                    </tr>

                                    <tr>
                                        <td><?php _el('order_date');?></td><td>&nbsp;:&nbsp;</td><td><?php echo date('jS F Y ', strtotime($order['order_date'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php _el('order_number');?></td><td>&nbsp;:&nbsp;</td><td><?php echo $order['order_number']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php _el('payment_method');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords($order['payment_method']); ?></td>
                                    </tr>

                                </tbody>
                            </table>
                            <br>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <table  class="table tabel-responsive table-hover table-framed  table-sm table-striped rounded">
                                <thead>
                                    <tr><th colspan="3"><h3 class="panel-title"><b><?php _el('billing_address');?></b></h3></th></tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td><?php _el('customer_name');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords($user['firstname'].' '.$user['lastname']); ?></td>
                                    </tr>
                                    <?php
                                    foreach ($address as  $address) 
                                    {
                                    ?>
                                    <tr>
                                        <td><?php _el('address_1');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords($address['house_or_village']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php _el('address_2');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords($address['street_or_society']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php _el('city');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords(get_city_name($address['city'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php _el('pincode');?></td><td>&nbsp;:&nbsp;</td><td><?php echo $address['pincode']; ?></td>
                                    </tr>
                                    <?php
                                    }?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                  
                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-4">
                            <table class="table table tabel-responsive table-responsive-sm table-hover table-striped rounded product">
                               
                                <thead>    
                                                        
                                    <tr class="text-center">
                                        <th><?php _el('product_name');?></th>
                                        <th ><?php _el('shop_name');?></th>
                                        <th><?php _el('quantity');?></th>
                                        <th  class="text-center"><?php _el('price');?></th>
                                        <th><?php _el('total_amount');?></th>
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
                                        <td><?php echo $item['item_quantity']; ?></td>    
                                        <td  class="text-center"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?php echo '.'.$item['price']; ?></td>
                                        <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?php echo '.'.$item['total_amount'];   $total[]=$item['total_amount']; $total_amount[] = get_grand_total($order['coupon_id'],$item['total_amount']);?></td>
                                    </tr>
                                    <?php
                                     }
                                     $total=array_sum($total);
                                     $grand_total = array_sum($total_amount);
                                    ?>
                                    <tr><td colspan="3"></td><td colspan="1" class="text-right"><strong><?php _el('coupon_amount');?></strong></td><td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?php echo '.';  $discount = $total - $grand_total; echo sprintf("%.2f",$discount);?></td></tr>
                                    <tr rowspan="2" style="border-top: 1px solid #ddd;"><td colspan="1"><b><?php _el('amount_in_Words'); echo str_repeat("&nbsp;",1); ?>:</b><?php echo str_repeat("&nbsp;",1); ?></td><td colspan="2" ><?php echo no_to_words($grand_total);?></td><td colspan="1" class="text-right"><strong><?php _el('grand_total');?></strong></td><td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?php echo '.'; echo sprintf("%.2f",$grand_total);?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--col-md-12-->
                    </div><!--row-->
                            <p><b><?php _el('note');?><?php echo str_repeat("&nbsp;",1); ?>:<?php echo str_repeat("&nbsp;",1); ?></b><?php _el('computer_generated_invoice');?></p>
                            <br>                       
                    
                </div>
                <!-- /Panel body -->
            </div>
            <!-- /Panel -->
        </div> 
<!-- /Content area -->
