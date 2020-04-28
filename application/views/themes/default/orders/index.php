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
                <li><a href="<?php echo base_url(); ?>"><?php _el('home'); ?></a></li>
                <li class='active'><?php _el('orders');?></li>
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
        <h4 class=""><?php _el('my_orders');?></h4>       
        </center>
    <div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- Panel -->          
            <div class="row">
        <?php 
        if(empty($orders)){
        ?>
        <br><label class="info-title"><?php _el('no_order_yet_!');?></label><br><br>
        <?php
        }
         foreach ($orders as $order_value)
         { 
         ?>
  <div class="col-md-6 col-sm-12">  
              <table  class="table-responsive">                     
                      <tr>                   
                      <td ><b><?php _el('order_no');echo '&nbsp&nbsp'.$order_value['order_number'];?></b></td><td>&nbsp;&nbsp;</td><td> <b><?php echo "&#8377;.&nbsp".$order_value['grand_total'];?></b></td>
                      </tr>

                      <tr style="border-bottom: 1px solid #ddd;">
                      <td><?php echo date('jS F Y  h:i:s A', strtotime($order_value['order_date'])); ?> </td><td>&nbsp;&nbsp;</td><td><?php echo time_to_words($order_value['order_date'])."&nbspago";?></td>
                       </tr>
                                  
                       <?php foreach ($order_items as $order_info) 
                        {
                        if($order_info['order_id'] == $order_value['id'])
                        { 
                        ?>  

                        <tr>                          
                        <td> <?php
                        if ($order_info['vendor_status'] == 1)
                        {
                        echo '<span class="label label-info label-rounded">Processing</span>';}
                        elseif ($order_info['vendor_status'] == 2)
                        {
                        echo '<span class="label label-success label-rounded">Completed</span>';}
                        elseif ($order_info['vendor_status'] == 3)
                        {
                        echo '<span class="label label-danger label-rounded">Declined</span>';}
                        else
                        {
                        echo '<span class="label label-warning label-rounded">Pending</span>';}
                        ?></td>
                         <td>&nbsp;&nbsp;</td><td><?php  echo "&#8377;.".$order_info['total_amount'];?></td>
                        </tr>

                        <tr>
                        <td> <a href="<?= site_url('Products/'.$order_info['slug']); ?>"><img class="img-circle" id="blah" src="<?php echo base_url() .$order_info['thumb_image'];?>" alt="image" height=64 width=100 /></a></td><td>&nbsp;&nbsp;</td><td><?php echo ucwords($order_info['name']); ?></td>
                         </tr> 

                         <tr style="border-bottom: 1px solid #ddd;">
                         <td><b><a href="<?= site_url('Products/'.$order_info['slug']); ?>"><u><?php _el('buy_it_again');?></u></a></b></td><td>&nbsp;&nbsp;</td><td><b>  <a  title="<?php _el('details')?>" href="<?php echo site_url('orders/details/'.$order_info['order_id']); ?>" ><u><?php _el('View_details');?></u> </a></b></td>
                         </tr>  
                                    
                        <?php
                          }
                        }                           
                        ?>                               

                </table>                           
            </div>
          <?php } ?>
    </div>
</div>
</div>
</div>
</div>
</div>
</div><!--container-->
</div><!--body-content-->


