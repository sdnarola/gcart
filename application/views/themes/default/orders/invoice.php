<?php
  $user    = get_user_info($order['user_id']);                                                                            
  $address    = $this->users->show($order['user_id']);                                         
 ?>
  <style type="text/css">
tr{
  border:none;
  margin-top: 3px;
  padding-top: 3px;
  border-collapse: collapse; 
  line-height: 0px;
  
   }
   @media (max-width:767px) {
    td {
        width:30%;
    }
    @media (min-width:768px) {
    td {
        width: 50px;
    }
}
}
td{
    margin-top: 1px;
    padding-top:1px;
  }

table, td, th {  
  text-align: left;
  font-size: 15px;
   color: #666;
}

table {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;

}
th,td{

    padding: 10px;
    border: none;    

}
.table-responsive .table {
    max-width: none;
    -webkit-overflow-scrolling: touch !important;
}

</style>

    <div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner col-md-12 col-sm-12">
            <!-- <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>"><?php _el('home');?></a></li>
                <li><a href="<?php echo base_url('orders'); ?>"><?php _el('orders');?></a></li>
                <li> <a href="<?php echo site_url('orders/save_pdf/'.$order['id']); ?>" ><?php _el('details')?></a></li>
                <li class='active'><?php _el('invoice');?></li>

            </ul> -->
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
<?php foreach ($order_items as $key => $item){
?>
<a href="<?php echo base_url('orders/print_pdf/').$order['id'].'/'.$item['vendor_id'];;?>" class="btn btn-info btn-sm" style="text-align: right;margin-left: 88%;"><?php _el('print');?></a>
<?php break; } ?>
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
                                     <h5><?php echo date('jS F Y ', strtotime($order['invoice_date'])); ?></h5>
                                
                                <?php
                                foreach ($order_items as $key => $item)
                                {
                                ?>
                               
                               <div class="col-md-6 col-sm-3 col-12">
                                <table  class="table-responsive table-hover table-framed table-striped rounded" style="border:none;" >
                                
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
    <br>
                <!-- /Panel heading -->
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">

                            <table class="table-responsive table-hover table-framed table-sm table-striped rounded">
                               
                                <thead>

                                    <tr><th colspan="3"><p><h4 class="panel-title"><label class="info-title"><?php _el('order_details');?></label></h4></p></th></tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td ><?php _el('invoice_number');?></td><td>&nbsp;:&nbsp;</td><td><?php echo $order['invoice_number']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php _el('order_date');?></td><td>&nbsp;:&nbsp;</td><td><?php echo date('jS F Y  h:i:s A', strtotime($order['order_date'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php _el('order_number');?></td><td>&nbsp;:&nbsp;</td><td><?php echo $order['order_number']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php _el('payment_method');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords($order['payment_method']); ?></td>
                                    </tr>

                                </tbody>
                            </table>
                            <br></br>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <table  class="tabel-responsive table-hover table-framed  table-sm table-striped rounded">
                                <thead>
                                    <tr><th colspan="3"><p><h4 class="panel-title"><label class="info-title"><?php _el('billing_address');?></label></h4></p></th></tr>
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
                                        <td><?php _el('city');?></td><td>&nbsp;:&nbsp;</td><td><?php echo ucwords($address['city']); ?></td>
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
                            <table class="table tabel-responsive table-responsive-sm table-hover table-striped rounded">
                               
                                <thead>    
                                                        
                                    <tr class="text-center">
                                        <th ><?php _el('product_name');?></th>
                                        <th  ><?php _el('shop_name');?></th>
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
                                        <td  class="text-center"><?php _el('rs');echo '.'.$item['price']; ?></td>
                                        <td><?php _el('rs');echo '.'.$item['total_amount'];   $total[]=$item['total_amount']; ?></td>
                                    </tr>
                                    <?php
                                     }
                                    ?>

                                    <tr rowspan="2" style="border-top: 1px solid #ddd;"><td colspan="1"><b><?php _el('amount_in_Words'); echo str_repeat("&nbsp;",1); ?>:</b><?php echo str_repeat("&nbsp;",1); ?></td><td colspan="2" ><?php echo no_to_words(array_sum($total));?></td><td colspan="1" class="text-right"><strong><?php _el('grand_total');?></strong></td><td><?php  _el('rs');echo '. '.array_sum($total);?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
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
