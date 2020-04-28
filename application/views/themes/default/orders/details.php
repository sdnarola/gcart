 <?php
  $user    = get_user_info($order['user_id']);                                      
  $address    = $this->users->show($order['user_id']);                                          
 ?>

<style type="text/css">
tr{
  border: 1px solid #ddd;
  margin-top: 3px;
  padding-top: 3px;
  border-collapse: collapse; 
  line-height: 0px;
   min-height: 25px;
   height: 25px;
  border: none;
   }
td{
    margin-top: 3px;
    padding-top: 3px;
      padding: 20px;
    font-size: 15px;
    color: #666;
    border-right: none;
    text-align:left;
  }

table, td, th {  
  text-align: left;

}

table {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
}

th {
    padding: 20px;
    font-size: 15px;
    border: 1px solid #ddd;
}

</style>

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
                    <table  class="table-responsive">
                      <tr>
                        <th colspan="3"><h3 class="panel-title"><strong><?php _el('order_details');?></strong></h3></th>
                      
                      </tr>
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
                        <td><?php _el('rs');echo '.'.$order['grand_total']; ?></td>

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
                                                        

                </table>                           
            </div>

            <div class="col-md-6">

                 <table  class="table-responsive">

                     <?php foreach ($address as $address)
                      {
                      ?>
                      <tr>
                        <th colspan="3"><h3 class="panel-title"><strong><?php _el('billing_details');?></strong></h3></th>  
                      </tr>
                     
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
                        <td><?php echo ucwords($address['city']); ?></td>
                      
                      </tr>
                        <tr>
                        <td><?php _el('state');?></td>
                        <td>:</td>
                        <td><?php echo ucwords($address['state']); ?></td>
                      
                      </tr>
                       </tr>
                        <tr>
                        <td><?php _el('pincode');?></td>
                        <td>:</td>
                        <td><?php echo $address['pincode']; ?></td>
                      
                      </tr>
                       
                       <?php 
                        }
                        ?>
                 </table>
                           
            </div>
            </div>
                <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table  class="table-responsive">                             

                                <tr>
                                <th colspan="7"><h3 class="panel-title"><strong><?php _el('products_ordered');?></strong></h3></th>  
                                </tr>  
                                <tr>
                                    <th><?php _el('product_name');?></th>
                                    <th><?php _el('shop_name');?></th>
                                    <th><?php _el('price');?></th>
                                    <th><?php _el('quantity');?></th>
                                    <th><?php _el('total_amount');?></th>
                                    <th class="text-center"><?php _el('status');?></th>
                                    
                                    <th class="text-center" width="12%"> <?php
                                     if ($order['payment_status'] == 1)
                                     {                                     
                                      _el('invoice');
                                    }
                                      else
                                      {
                                        _el('total');
                                      }
                                    ?>

                                    </th>
                                </tr>
                              
                                <?php
                                foreach ($order_items as $key => $item)
                                {
                                ?>
                                <tr>
                                    <td><?php echo ucwords($item['name']); ?></td>
                                    <td><?php echo ucwords(get_vendor_info($item['vendor_id'], 'shop_name')); ?></td>
                                    <td><?php _el('rs');echo '.'.$item['price']; ?></td>
                                    <td><?php echo $item['item_quantity']; ?></td>
                                    <td><?php _el('rs');echo '.'.$item['total_amount']; ?></td>
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
                                      <td width="15%"><center><a href="<?php  echo base_url('orders/invoice/').$order['id'].'/'.$item['vendor_id']; ?>"><i class='fa fa-file-text-o' style="font-size: 20px;color: green"></i></a></center></td>
                                    <?php }?>
                                </tr>
                               
                               <?php 
                                }
                                ?>

                                <tr rowspan="2" style="border-top: 1px solid #ddd;"><td><b><?php _el('amount_in_Words');?><?php echo str_repeat("&nbsp;",1); ?>:<?php echo str_repeat("&nbsp;",1); ?></b><br></td><td colspan="2"><?php echo no_to_words($order['grand_total']);?></td><td colspan="3" class="text-right"><strong><?php _el('grand_total');?></strong></td><td><?php _el('rs');echo '.'.$order['grand_total']; ?></td></tr>
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
</div>
</br>
</br>
<hr>
