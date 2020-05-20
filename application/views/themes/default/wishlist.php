
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?= site_url() ."Home"; ?>"><?php _el('home'); ?></a></li>
				<li class='active'><?php _el('wishlist'); ?></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
					<div class="table-responsive">
						<div id="whishlist-data-div">
<?php
						if(!empty($wishlist_data))
						{
?>
						<table class="table">
							<thead>
								<tr>
									<th colspan="4" class="heading-title"><?php _el('my_wishlist');?></th>
								</tr>
							</thead>
							<tbody>
<?php
							foreach ($wishlist_data as $key => $wishlist) 
							{
?>
								<tr id="wishlistdata-<?= $wishlist['product_id']?>"  style="border-top: 1px solid #ddd" >
									<td class="col-md-2"><img src="<?= base_url(); ?><?php echo get_product($wishlist['product_id'], 'thumb_image'); ?>" alt="imga"></td>
									<td class="col-md-7">
										<div class="product-name"><a href="<?= site_url('Products/'.get_product($wishlist['product_id'], 'slug')); ?>"><?= get_product($wishlist['product_id'], 'name') ?></a></div>
<?php 
					                      if(!empty(get_star_rating( $wishlist['product_id']) ))
					                      {
					                        $width =( get_star_rating( $wishlist['product_id']) *70 ) / 5;
?>
										<div class="rating-star rateit-small">
										<button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button><div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width:<?= $width?>px;"></div><div class="rateit-hover" style="height:0px"></div></div>
										</div>
<?php
                   			 				}

                   			 				$hot_deals = get_hot_deals_data();
						            		$price     = get_product($wishlist['product_id'], 'price');
						            		$old_price = get_product($wishlist['product_id'], 'old_price');
						            		
						            		if(!empty($hot_deals))
						            		{
						            			foreach ($hot_deals as $key => $hot_deals_data) 
						            			{
						            				if($hot_deals_data['product_id'] == $wishlist['product_id'] && get_product($wishlist['product_id'], 'quantity') > 0 )
						            				{
						            					if ($hot_deals_data['type'] == 0)
														{
															$price = $price - $hot_deals_data['value'];
															$old_price = get_product($wishlist['product_id'], 'price');
														}
														else
														{	
															$save_amount = ($price*$hot_deals_data['value'])/100;
															$price       = $price-$save_amount;
															$old_price = get_product($wishlist['product_id'], 'price');
														}
						            				}
						            			}
						            		}
?>
										<div class="price"><?php _el('rupees');?><?php echo $price; ?><span><?php _el('rupees');?><?php echo $old_price; ?></span></div>
									</td>
									<td class="col-md-2">		
<?php
									if(get_product($wishlist['product_id'], 'quantity') != 0 )
									{
?>
										<a href="javascript:void(0);" class="btn-upper btn btn-primary" onclick="add_to_cart(<?= $wishlist['product_id']; ?>)"><?php _el('add_to_cart');?></a>
<?php
									}
									else
									{
?>
										<a href="" class="btn-upper btn btn-primary" disabled="disabled"><?php _el('add_to_cart');?></a>
<?php
									}
?>
									</td>
									<td class="col-md-1 close-btn">
										<a href="javascript:void(0);" onclick="delete_wishlist(<?= $wishlist['product_id']; ?>)"><i class="fa fa-times"></i></a>
									</td>
								</tr>
<?php
							}
?>								
							</tbody>
						</table>
<?php
						}
						else
						{
?>
							<div class="text-center">
								<div ><b><?php _el('your_wishlist_is_empty')?></b></div>
								<div><p><?php _el('whishlist_empty_msg')?></p></div>
								<div ><a href="<?= site_url() ."Home"; ?>" class="btn btn-primary"><?php _el('shop_now')?></a></div>
							</div>
<?php
						}
?>
					</div>
					</div>
				</div>			
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div>
</div>

<script type="text/javascript">
	
	function delete_wishlist(id)
	{

		swal({
        title: "<?php _el('single_deletion_alert');?>",
        text: "<?php _el('single_recovery_alert');?>",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "<?php _el('no_cancel_it');?>",
        confirmButtonText: "<?php _el('yes_i_am_sure');?>",
        },
         function ()
        {
		
		$.ajax({
				type:'POST',
				url:SITE_URL+'Wishlist/delete_wishlist_product',
				data:{ product_id:id },
				dataType:"JSON",
				success:function(data)
				{
					if(data.deleted_data == 'success')
					{
						$('#wishlistdata-'+id).remove();
					}

					if(data.wishlist_detail == null)
					{
						var wishlist_empty_title = "<?php _el('your_wishlist_is_empty')?>";
						var wishlist_empty_msg   = "<?php _el('whishlist_empty_msg')?>";
						var url                  = "<?= site_url() ."Home"; ?>";
						var shop_now             = "<?php _el('shop_now')?>";

						var div="<div class='text-center'><div ><b>"+wishlist_empty_title+"</b></div><div><p >"+wishlist_empty_msg+"</p></div><div ><a href='"+url+"' class='btn btn-primary'>"+shop_now+"</a></div></div>"
						$("#whishlist-data-div").html(div);
					}
				}

		});
	});
	}
</script>
	
