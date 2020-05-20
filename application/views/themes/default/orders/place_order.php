<?php
$Shipping='';
$Promotion=200;
?>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>"><?php _el('home');?></a></li>
                <li class='active'><?php _el('checkout');?></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div>
<div class="body-content outer-top-xs">
    <div class="container">
    	<div class="col-md-12">
<?php 
				$this->load->view('themes/default/includes/alerts');
 ?>
		</div>
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="panel panel-default">
				    	<div class="panel-heading" style="font-size: 15px; font-weight: bold;"><?php _el('products_detail')?></div>
<?php
				      	if(!empty($Product_data))
				      	{
				      		foreach ($Product_data as $key => $data) 
				      		{	
				      			if($data['quantity'] >= $data['cart_qty'])	
				      			{		      	
?>
				      		<div class="panel-body">
				     			<div class="row">
				      				<div class="col-md-12 col-sm-12">
					      				<div class="col-md-2 col-sm-12">
					      					<div><img class="img-responsive" alt="" src="<?php echo base_url(). $data['thumb_image']; ?>"  /></div>
										</div> 
										<div class="col-md-7 col-sm-12">
											 	<div class="col-md-12 col-sm-12"><div class="name" style="font-size: 15px; font-weight: bold;"><?= ucwords($data['name'])?></div>	</div>
											 	<div class="col-md-12 col-sm-12"><?php _el('rupees');?><?= $data['total_amount']?></div>
											 	<div class="col-md-12 col-sm-12"><?php _el('qty')?><?= $data['cart_qty']?></div>
											 	<div class="col-md-12 col-sm-12"><?php _el('sold_by')?> <?= ucwords(get_vendor_info($data['vendor_id'], 'shop_name'))?></div>
										</div>
										<div class="col-md-2 col-sm-12">
											 	<div class="col-md-12 col-sm-12"><a class="btn btn-primary" href="<?= site_url('Products/'.$data['slug']); ?>"> <?php _el('view_detail')?></a>	</div> 	
										</div>
									</div>		
				    			</div>
                  			</div>	
<?php
					         	}
					        }
				      	}
?>                 
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading" style="font-size: 15px; font-weight: bold;"><?php _el('shipping_address')?> </div>
									<div class="panel-body" style="min-height: 125px;">
										<div class="row">
											<div class="col-md-6 col-sm-12">
<?php 
	      					foreach ($users_address as $key => $address) 
	      					{	
?>
									      		<div class="col-md-12 col-sm-12">
									      			<?= ucwords($address['house_or_village']) .' '.ucwords($address['street_or_society']) .','?>
												</div>
												<div class="col-md-12 col-sm-12" >
													<?=  ucwords($address['landmark']); ?>
												</div>
												<div class="col-md-12 col-sm-12" >
													<?= ucwords(get_city_name($address['city_id'],'name')).' '.ucwords(get_state_name($address['state_id'],'name')) .'  '.$address['pincode'] ?>
												</div>
												<div class="col-md-12 col-sm-12" >
													<?php _el('mobile_number'); ?><?= get_user_info($this->session->userdata('user_id'), 'mobile') ?>
												</div>							
<?php
						}
?>
				      						</div>

				    					</div>
                  					</div>	
               				</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading" style="font-size: 15px; font-weight: bold;"><?php _el('payment_info')?></div>
								<div class="panel-body" style="min-height: 125px;">
									<div class="row">
										<div class="col-md-6 col-sm-12">
											<p><?php _el('cash_on_delivery')?></p>
										</div> 
									</div>
								</div>	
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="panel panel-default">
								<div class="panel-heading" style="font-size: 15px; font-weight: bold;"><?php _el('order_summary')?></div>
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12">
												<div class="row">
													<div class="col-sm-6"><?php _el('item_sub_total')?></div>
													<div class="col-sm-6" style="text-align: right;"><?php _el('rupees');?><?= $total_amount ?></div>
												</div>
												<div class="row">
													<div class="col-sm-6"><?php _el('shipping')?></div>
													<div class="col-sm-6" style="text-align: right;"><?php _el('rupees');?><?= (empty($Shipping))? 0.00 :	number_format($Shipping , 2, '.', '') ;?></div>
												</div>
<?php
					      			if(!empty($coupon_amount))
					      			{
?>					      		
									      		<div class="row"  style="margin-top: 10px;">
									      			<div class="col-sm-6"><?php _el('total')?></div>
									      			<div class="col-sm-6" style="text-align: right;"><?php _el('rupees');?><?= (empty($Shipping))? $total_amount : number_format($total_amount+$Shipping , 2, '.', '')?></div>
									      		</div>
									      		<div class="row">
									      			<div class="col-sm-6"><?php _el('promotion_applied')?></div>
									      			<div class="col-sm-6" style="text-align: right;">&#8722;<?php _el('rupees');?><?= number_format($coupon_amount , 2, '.', '')  ?></div>
									      		</div>
<?php
					      			}
?>
									      		<div class="row" style="margin-top: 10px; font-weight: bold;">
									      			<div class="col-sm-6"><?php _el('grand_total')?></div>
									      			<div class="col-sm-6" style="text-align: right;"><?php _el('rupees');?><?= number_format($grand_total_amount, 2, '.','') ;?></div>
									      		</div>
				      						</div> 
				    					</div>
                 					</div>
                			</div>
						</div>
					</div>
				     <div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
										<a href="<?= site_url('user');?>" class="btn-upper btn btn-primary" ><?php _el('back')?></a>
									</div>
								</div>
<?php
		      				if($grand_total_amount != 0)
		      				{
?>
		      					<div class="col-sm-6">
		      						<div class="form-group">
						  				 <input type="button" name="" id="btn-address" class="btn-upper btn btn-primary" value="<?php _el('confirm_order')?>" onclick="confirm_order();">
									</div>
		      					</div>
<?php
		      				}
		      				else
		      				{
?>
		      					<div class="col-sm-6">
		      						<div class="form-group">
						  				 <input type="button" name="" id="btn-address" disabled="disabled" class="btn-upper btn btn-primary" value="<?php _el('confirm_order')?>" onclick="confirm_order();">
									</div>
		      					</div>
<?php
  							}
?>		
					      	</div>
				      	</div> 
				    </div>
        		</div> <!-- /.row -->  
    		</div>
		</div>
	</div><!-- /.container -->
</div><!-- /.body-content -->
<script type="text/javascript">
	
	function confirm_order()
	 {
	 	window.location = SITE_URL+'Orders/confirm_order_successfully';
	 }
</script>