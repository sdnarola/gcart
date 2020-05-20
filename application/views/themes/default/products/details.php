
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?= site_url() ."Home"; ?>"><?php _el('home'); ?></a></li>
				<li><a href="<?= site_url('categories/'.$category_slug); ?>"><?= ucwords($category_name); ?></a></li>
				<li class='active'><?= ucwords($products_name); ?></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<!-- ================================== BODY Content========================================================= -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
					<div class="home-banner outer-top-n">
						<img src="<?php echo base_url().$category_banner['banner']; ?>" alt="Image" height="265" width="262" >
					</div>
<!-- ============================================== HOT DEALS ============================================== -->
				
<?php
					if(!empty($hot_deals_products))
					{
?>
					<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
						<h3 class="section-title"><?php _el('hot_deals');?></h3>
						<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
<?php
						foreach ($hot_deals_products as $hot_deals) 
						{

							 $end_date = date('M d, Y  h:i:s', strtotime($hot_deals['end_date']));		
?>
							<div class="item">
								<div class="products">
									<div class="hot-deal-wrapper">
										<div class="image">
											<img src="<?= base_url().$hot_deals['thumb_image']; ?>" alt="">
										</div>
										<div class="sale-offer-tag"><span>
<?php

							if ($hot_deals['type'] == 0)
							{
								echo '&#8377;'.'. '.$hot_deals['value'];

								$price = $hot_deals['price']-$hot_deals['value'];
							}
							else
							{
								echo $hot_deals['value'].' &#37;';
								$save_amount = ($hot_deals['price']*$hot_deals['value'])/100;
								$price       = $hot_deals['price']-$save_amount;
							}
 ?>
 											<br><?php _el('off')?></span>
 										</div>

<!--------------------------------------------------------------------- Timer counter ------------------------------------------------------------------------------------>
										<script type="text/javascript">
											time_counter("<?= $end_date;?>",<?= $hot_deals['id']?>);
										</script>
										<div class="timing-wrapper" id="time_counter_<?= $hot_deals['id'] ?>" data-end-date="<?= $end_date;?>"></div>
									</div><!-- /.hot-deal-wrapper -->
<!--------------------------------------------------------------------- END Timer counter -------------------------------------------------------------------------------------->
									<div class="product-info text-left m-t-20">
										<h3 class="name"><a href="<?= site_url('Products/'. $hot_deals['slug']); ?>"><?= ucwords($hot_deals['name']) ;?></a></h3>
<?php 
							if(!empty(get_star_rating( $hot_deals['id']) ))
							{
								$width =(get_star_rating( $hot_deals['id']) *70 ) / 5;
?>
												<div class="rating-star rateit-small">
													<button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button>
													<div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;">
														<div class="rateit-selected" style="height: 14px; width:<?= $width?>px;"></div>
														<div class="rateit-hover" style="height:0px"></div>
													</div>
												</div>
<?php
							 }
?>
										<div class="product-price">
											<span class="price" ><?php _el('rupees');?><?= sprintf('%0.2f',$price);?></span>
										    <span class="price-before-discount"><?php _el('rupees');?><?= $hot_deals['price'] ;?></span>
										</div><!-- /.product-price -->
									</div><!-- /.product-info -->
									<div class="cart clearfix animate-effect">
										<div class="action">
											<div class="add-cart-button btn-group">
												<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
													<i class="fa fa-shopping-cart" onclick="add_to_cart(<?= $hot_deals['product_id']; ?>)"></i>
												</button>
												<button class="btn btn-primary cart-btn" onclick="add_to_cart(<?= $hot_deals['product_id']; ?>)" type="button"><?php _el('add_to_cart');?></button>
											</div>
									    </div><!-- /.action -->
								    </div><!-- /.cart -->
							    </div><!-- /products -->
						    </div><!-- /items -->
<?php
						}
?>  
		    			</div><!-- /.owl-carousel -->
					</div><!-- /sidebar-widget -->
<?php
					}
?> 	
<!-- ============================================== HOT DEALS: END ============================================== -->

<!-- ============================================== NEWSLETTER ============================================== -->
					<form id="frm_newsletter">
						<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
							<h3 class="section-title"><?php _el('newsletters');?></h3>
							<div class="sidebar-widget-body outer-top-xs">
								<p><?php _el('sign_up_for_our_newsletter');?></p>
								<div class="newletter-span-sucess"></div>
								<div class="form-group">
									<label class="sr-only" for="news_letter_email"><?php _el('email_address'); ?></label>
									<input type="email" name="news_letter_email" class="form-control txt" id="news_letter_email" placeholder="Subscribe to our newsletter" required="required">
									 <div class="newletter-span-exits" style="color: red; font-weight: bold;"></div>
								</div>
								<button class="btn btn-primary"><?php _el('subscribe')?></button>
							</div><!-- /.sidebar-widget-body -->
						</div><!-- /.sidebar-widget -->
					</form>
		<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->
<?php
					if(!empty($vendors_data))
					{
?>
					<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
						<div id="advertisement" class="advertisement">
<?php
						foreach ($vendors_data as $key => $vendors) 
						{						
?>
					        <div class="item">
					            <div class="avatar"><img src="<?php echo base_url().$vendors['logo'] ?>"  alt="Image"></div>
								<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
								<div class="clients_author"><?= ucwords($vendors['firstname'] .' '. $vendors['lastname']) ?><span><?= ucwords($vendors['shop_name'])?></span></div><!-- /.container-fluid -->
					        </div><!-- /.item -->
<?php
						}
?>	
		    			</div><!-- /.owl-carousel -->
					</div>
				<?php } ?>
				</div><!-- /sidebar-module-container -->
			</div><!-- /.sidebar -->
<!-- ============================================== Testimonials: END ============================================== -->
			<div class='col-md-9'>
            	<div class="detail-block">
					<div class="row  wow fadeInUp">
					    <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
   							<div class="product-item-holder size-big single-product-gallery small-gallery">
        						<div id="owl-single-product">
						            <div class="single-product-gallery-item" id="slide11">
						                <a data-lightbox="image-1" data-title="Gallery" href="<?php echo base_url().$products_detail['thumb_image']; ?>">
						                    <img class="img-responsive" alt="" src="<?php echo base_url().$products_detail['thumb_image']; ?>" data-echo="<?php echo base_url().$products_detail['thumb_image']; ?>" />
						                </a>
						            </div>
						           
<?php
										

										$whishlist_data = get_wishlist_data($products_detail['id']);
					                    $product_id='';
					                    
					                    $wishlist_li_class='btn btn-primary';
					                    if(!empty($whishlist_data))
					                    {
					                      foreach ($whishlist_data as $key => $value) 
					                      {
					                        $product_id=$value['product_id'];
					                      }

					                      $wishlist_li_class= ($product_id == $products_detail['id'] )? 'btn btn-primary inwishlist' : 'btn btn-primary';
					                      
					                    }
?>
<?php
										$products_images =unserialize($products_detail['images']);

										if(!empty($products_images))
										{
											foreach ($products_images as $key => $images) 
											{
												if(!empty($images))
												{
?>
						            <div class="single-product-gallery-item" id="slide<?= $key ?>">
						                <a data-lightbox="image-1" data-title="Gallery" href="<?= base_url().$images; ?>">
						                     <img class="img-responsive" alt="" src="<?= base_url().$images; ?>" data-echo="<?= base_url().$images; ?>" />
						                </a>
						            </div><!-- /.single-product-gallery-item -->
<?php
												}
								            }
						            	}	
?>
        						</div><!-- /.single-product-slider -->
        						<div class="single-product-gallery-thumbs gallery-thumbs">
            						<div id="owl-single-product-thumbnails">
						                <div class="item">
						                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="11" href="#slide11">
						                        <img class="img-responsive" width="85" alt="" src="<?php echo base_url().$products_detail['thumb_image']; ?>" data-echo="<?php echo base_url().$products_detail['thumb_image']; ?>" />
						                    </a>
						                </div>
<?php
									$products_images =unserialize($products_detail['images']);
									if(!empty($products_images))
									{
										foreach ($products_images as $key => $images) 
										{
											if(!empty($images))
											{
										
?>
						                <div class="item">
						                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?= $key ?>" href="#slide<?= $key ?>">
						                        <img class="img-responsive" width="85" alt="" src="<?= base_url().$images; ?>" data-echo="<?= base_url().$images; ?>"/>
						                    </a>
						                </div>
<?php
											}
						            	}
						            }	
?>
          							</div><!-- /#owl-single-product-thumbnails -->
        						</div><!-- /.gallery-thumbs -->
   							</div><!-- /.single-product-gallery -->
						</div><!-- /.gallery-holder -->
						<div class='col-sm-6 col-md-7 product-info-block'>
							<div class="product-info">
								<h1 class="name"><?= ucwords($products_detail['name']);?></h1>
								<div class="rating-reviews m-t-20">
									<div class="row">
										<div class="col-sm-3">
<?php 
											if(!empty(get_star_rating($products_detail['id']) ))
											{
												$width =(get_star_rating($products_detail['id']) *70 ) / 5;
?>
											<div class="rating-star rateit-small">
												<button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button>
												<div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;">
													<div class="rateit-selected" style="height: 14px; width:<?= $width?>px;"></div>
													<div class="rateit-hover" style="height:0px"></div>
												</div>
											</div>
<?php
										}
?>
										</div>
<?php
									if($total_reviews > 0)
									{
?>
										<div class="col-sm-8">
											<div class="reviews">
												<a  class="lnk"><?= "(".$total_reviews ?> <?php _el('review') ?><?= ")" ?></a>
											</div>
										</div>
<?php
									}
?>
									</div><!-- /.row -->
								</div><!-- /.rating-reviews -->
								<div class="stock-container info-container m-t-10">
									<div class="row">
										<div class="col-sm-2">
											<div class="stock-box">
												<span class="label"><?php _el('availability'); ?></span>
											</div>
										</div>
<?php 
									if($products_detail['quantity'] > 0)
									{
?>
										<div class="col-sm-9">
											<div class="stock-box">
												<span class="value"><?php _el('in_stock'); ?></span>
											</div>
										</div>
<?php
									}
									else
									{
?>
										<div class="col-sm-9">
											<div class="stock-box">
												<span class="value"><?php _el('out_of_stock');?></span>
											</div>
										</div>
<?php
									}
?>
									</div><!-- /.row -->
<?php
						            		$hot_deals = get_hot_deals_data();
						            		$price     = $products_detail['price'];
						            		$old_price = $products_detail['old_price'];
						            		if(!empty($hot_deals))
						            		{
						            			foreach ($hot_deals as $key => $hot_deals_data) 
						            			{
						            				if($hot_deals_data['product_id'] == $products_detail['id'] && $products_detail['quantity'] > 0 )
						            				{
						            					if ($hot_deals_data['type'] == 0)
														{
															$price = $products_detail['price'] - $hot_deals_data['value'];
															$old_price = $products_detail['price'];
														}
														else
														{	
															$save_amount = ($products_detail['price']*$hot_deals_data['value'])/100;
															$price       = $products_detail['price']-$save_amount;
															$old_price = $products_detail['price'];
														}
						            				}
						            			}
						            		}
?>
								</div><!-- /.stock-container -->
								<div class="description-container m-t-20">
									<?php echo $products_detail['short_description'];?>
								</div><!-- /.description-container -->
								<div class="price-container info-container m-t-20">
									<div class="row">
										<div class="col-sm-6">
											<div class="price-box">
												<span class="price"><?php _el('rupees');?><?= $price;?></span>
												<span class="price-strike"><?php _el('rupees');?><?= $old_price;?></span>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="favorite-button m-t-10">
<?php 
												if(is_user_logged_in() == TRUE)
												{
?>
												<a class="<?= $wishlist_li_class ?>"  id="lnk-wishlist-<?= $products_detail['id'] ?>"data-toggle="tooltip" data-placement="right" title="Wishlist" onclick="add_wishlist_products(<?= $products_detail['id']; ?>)" href="javascript:void(0);">
												    <i class="fa fa-heart"></i>
												</a>
<?php
												}
?>
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
												    <i class="fa fa-envelope"></i>
												</a>
											</div>
										</div>
									</div><!-- /.row -->
								</div><!-- /.price-container -->
								<div class="quantity-container info-container">
									<div class="row">
										<div class="col-sm-2">
											<span class="label"><?php _el('qty');?></span>
										</div>
										<div class="col-sm-2">
											<div class="cart-quantity">
												<div class="quant-input">
<?php
								                if( $products_detail['quantity'] > 0)
								               	{
?>
									                <div class="arrows">
														<div class="arrow plus gradient" ><span class="ir" ><i class="icon fa fa-sort-asc" onclick="increment_quntity('<?php  echo $products_detail['quantity']; ?>')"></i></span></div>
														<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc" onclick="decrement_quntity()"></i></span></div> 
									                </div>
									                <input type="text" id="procuct-quantity" value="1" onchange="products_update_qty(this);">
<?php
								                }
								                else
								                {
?>
									               	<input type="text" value="0" disabled="disabled">
<?php
								            	}
?>
								              	</div>
								            </div>
										</div>
<?php
									if( $products_detail['quantity'] > 0)
								    { 
?>
										<div class="col-sm-7">
											<a href="javascript:void(0);" id="add_cart" onclick="add_to_cart(<?= $products_detail['id'];?> )" class="btn btn-primary" ><i class="fa fa-shopping-cart inner-right-vs"></i> <?php _el('add_to_cart'); ?></a><!--  -->
										</div>
										 
<?php
									}
									else
									{
?>
										<div class="col-sm-7">
											<a href="#" class="btn btn-primary" disabled="disabled"><i class="fa fa-shopping-cart inner-right-vs"></i><?php _el('add_to_cart'); ?></a>
										</div>
<?php
									}
?>
									</div><!-- /.row -->
								</div><!-- /.quantity-container -->
							</div><!-- /.product-info -->
						</div><!-- /.product-info-block -->
					</div><!-- /.row -->
                </div><!-- /detail-block -->
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description"><?php _el('description'); ?></a></li>
<?php
							 if($total_reviews > 0 || in_array($products_id, $orders_products_id))
							{
?>
								<li><a data-toggle="tab" href="#review"><?php _el('review'); ?></a></li>
<?php 
							} 
?>
					<?php if(in_array($products_id, $orders_products_id))	{?><li><a data-toggle="tab" href="#tags"><?php _el('tags'); ?></a></li><?php } ?>
<?php
							 if($total_comments > 0 || in_array($products_id, $orders_products_id))
							{
?>					
								<li><a data-toggle="tab" href="#comments"><?php _el('comments'); ?></a></li>
<?php 
							} 
?>								
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">
							<div class="tab-content">
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"><?php echo $products_detail['long_description'];?> </p>
									</div>
								</div><!-- /.tab-pane -->
								<div id="review" class="tab-pane">
<?php
								// if (is_user_logged_in())
								// {
?>
									<div class="product-tab">
										<div class="product-reviews">
											<h4 class="title"><?php _el('customer_reviews'); ?></h4>
											<div class="reviews">
<?php
										$user_id='';
										$review_product_id='';
										if(!empty($reviews_data))
										{	
											foreach ($reviews_data as $key => $reviews_msg) 
											{
												if($key < 3 )
												{
													$user_id=$reviews_msg['user_id'];
													$review_product_id=$reviews_msg['product_id'];
													$to_date     = strtotime(date("Y-m-d h:i:sa"));
													$date        = $reviews_msg['add_date'];
													$review_date = strtotime($date);
													$distance    = $to_date - $review_date;
													
													$years  = floor($distance/(365*60*60*24));
													$months = floor(($distance - $years * 365*60*60*24) / (30*60*60*24));
													$days   = floor(($distance - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

?>
												<div class="review">
													<div class="review-title"><span class="summary"><?= $reviews_msg['review'];?></span>
<?php
													if($days >0)
													{
?>
														<span class="date"><i class="fa fa-calendar"></i><span><?= $days ?> <?php _el('days_ago');?></span>
<?php
													}
?>
														</span>
													</div>
												</div>
<?php	# code...
												}
											}
?>
<?php
													if($total_reviews > 3)
													{
														

?>
													<div style="margin-bottom: 15px; text-align: right;"><a href="<?= site_url('Review/'.$product_slug);?>"><?php _el('see_more')?></a></div>
<?php
													}
												}
?>

											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->
<?php
								if (is_user_logged_in())
								{

									if(!in_array($user_id,$user_review_use_id ) && ! in_array($products_id, $user_review_products_id))
									{
										if(in_array($products_id, $orders_products_id))
										{
?>
										<form  id="frm_review">
											<div class="product-add-review">
												<h4 class="title"><?php _el('write_your_own_review'); ?></h4>
												<div class="review-table">
													<div class="table-responsive">
														<table class="table">
															<span class="reviewstar"></span>
															<thead>
																<tr>
																	<th class="cell-label">&nbsp;</th>
																	<th><?php _el('1_star');?></th>
																	<th><?php _el('2_stars');?></th>
																	<th><?php _el('3_stars');?></th>
																	<th><?php _el('4_stars');?></th>
																	<th><?php _el('5_stars');?></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="cell-label"><?php _el('quality'); ?></td>
																	<td><input type="radio" name="quality" class="radio" value="1"></td>
																	<td><input type="radio" name="quality" class="radio" value="2"></td>
																	<td><input type="radio" name="quality" class="radio" value="3"></td>
																	<td><input type="radio" name="quality" class="radio" value="4"></td>
																	<td><input type="radio" name="quality" class="radio" value="5"></td>
																</tr>
															</tbody>
														</table>
														<!-- /.table .table-bordered -->
													</div><!-- /.table-responsive -->
												</div><!-- /.review-table -->
												<div class="review-form">
													<div class="form-container">
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName"><?php  _el('your_name');?> <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="reviwe_name" name="reviwe_name" placeholder="enter name">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview"><?php _el('review');?> <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="reviews" name="reviews" rows="4" placeholder="enter review"></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														<div class="action text-right">
															<button class="btn btn-primary btn-upper"><?php _el('submit_review');?></button>
														</div><!-- /.action -->
														<!-- </form> --><!-- /.cnt-form -->
													</div><!-- /.form-container -->
												</div><!-- /.review-form -->
											</div><!-- /.product-add-review -->
										</form>
										<div class="product-add-review-success" style="display: none;">
											<div class="alert alert-success alert-block fade in"><span class="add-review-success"><?php _el('review_submit_successfully');?></span>
											</div>
										</div>
<?php
									}
								}
								else
								{
?>
										<div class="product-add-review">
											<div  class="alert alert-success alert-block fade in"><?php _el('review_submit_successfully');?></div>
										</div>
<?php
								}
							}
?>
							    	</div><!-- /.product-tab -->

								</div><!-- /.tab-pane -->
								<!-- =================================================================================== -->

								<div id="comments" class="tab-pane">
									<div class="product-tab">
										<div class="product-reviews">
											<h4 class="title"><?php _el('customer_comments');?></h4>
											<div class="reviews">
<?php
										if(!empty($comments_data))
										{
											foreach ($comments_data as $key => $comments) 
											{
												if($key < 3)
												{
													$to_date     = strtotime(date("Y-m-d h:i:sa"));
													$date        = $comments['add_date'];
													$review_date = strtotime($date);
													$distance    = $to_date - $review_date;
													
													$years  = floor($distance/(365*60*60*24));
													$months = floor(($distance - $years * 365*60*60*24) / (30*60*60*24));
													$days   = floor(($distance - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
?>

												<div class="review">
													<div class="review-title">
														<div class="text"><span class="summary">"<?= $comments['comment'];?>"</span>
<?php
													if($days >0)
													{
?>
															<span class="date"><i class="fa fa-calendar"></i><span><?= $days;?> <?php _el('days_ago');?></span>
<?php
													}
?>
															</span>
														</div>
													</div>	
												</div>
<?php
												}
											}
														
											if($total_comments > 3)
											{

?>
													<div style="margin-bottom: 15px; text-align: right;"><a href="<?= site_url('Comments/'.$product_slug);?>"><?php _el('see_more')?></a></div>
<?php
											}
													
										}
?>
											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->
<?php
								if (is_user_logged_in())
								{
									
?>										
										<form id="frm_comments">
											<div class="comment-success-msg"></div>
											<div class="product-add-comment">
												<div class="review-form">
													<div class="form-container">
														<form role="form" class="cnt-form">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="name"><?php _el('your_name'); ?><span class="astk">*</span></label>
																		<input type="text" name="comment_name" class="form-control txt" id="comment_name" placeholder="">
																	</div><!-- /.form-group -->
																	<div class="form-group">
																		<label for="email"><?php _el('email');?><span class="astk">*</span></label>
																		<input type="email" name="email" class="form-control txt" id="email" placeholder="">
																	</div><!-- /.form-group -->
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="idcomments"><?php _el('comments');?> <span class="astk">*</span></label>
																		<textarea class="form-control txt txt-review" name="comments" id="idcomments" rows="4" placeholder=""></textarea>
																	</div><!-- /.form-group -->
																</div>
															</div><!-- /.row -->
															<div class="action text-right">
																<button class="btn btn-primary btn-upper"><?php _el('submit_comments');?></button>
															</div><!-- /.action -->
														</form><!-- /.cnt-form -->
													</div><!-- /.form-container -->
												</div><!-- /.review-form -->
											</div><!-- /.product-add-review -->
										</form>
<?php
										
									}
?>										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->
								<div id="tags" class="tab-pane">
									<div class="product-tag">
										<h4 class="title"><?php _el('product_tags'); ?></h4>
										<form id="frm_tags" role="form" class="form-inline form-cnt">
											<div class="form-container">
												<div class="tags-success-msg"></div>
												<div class="form-group">
													<label for="exampleInputTag"><?php _el('add_your_tags');?></label>
													<input type="text" name="tags_name" id="exampleInputTag" class="form-control txt">
												</div>
												<button class="btn btn-upper btn-primary" type="submit"><?php _el('add_tags');?></button>
											</div><!-- /.form-container -->
											<div class="errorTxt text col-md-offset-2" style="display: none;"></div>
										</form><!-- /.form-cnt -->
										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3"><?php _el('tags_msg');?></span>
											</div>
										</form><!-- /.form-cnt -->
									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->
							</div><!-- /.tab-content -->
						</div><!-- /.col-sm-9 -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

<!-- ============================================== UPSELL PRODUCTS ============================================== -->
				<section class="section featured-product wow fadeInUp">
					<h3 class="section-title"><?php _el('upsell_products');?></h3>
					<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
<?php
					foreach ($upsell_products as $key => $upsell)
					{	
						if($products_id != $upsell['id'])
						{
							$whishlist_data = get_wishlist_data($upsell['id']);
		                    $product_id='';
		                    
		                    $wishlist_li_class='lnk wishlist';
		                    if(!empty($whishlist_data))
		                    {
		                      foreach ($whishlist_data as $key => $value) 
		                      {
		                        $product_id=$value['product_id'];
		                      }

		                      $wishlist_li_class= ($product_id == $upsell['id'] )? 'lnk wishlist inwishlist' : 'lnk wishlist';
		                      
		                    }					
?>
						<div class="item item-carousel">
							<div class="products">
								<div class="product">
									<div class="product-image">
										<div class="image">
												<a href="<?= site_url('Products/'. $upsell['slug']); ?>"><img  src="<?php echo base_url(). $upsell['thumb_image']; ?> " alt=""></a>
						    			</div><!-- /.image -->
										<div class="tag sale"><span>sale</span></div>
									</div><!-- /.product-image -->
									<div class="product-info text-left">
										<h3 class="name"><a href="<?= site_url('Products/'. $upsell['slug']); ?>"><?= ucwords($upsell['name']); ?></a></h3>
<?php 
											if(!empty(get_star_rating( $upsell['id']) ))
											{
												$width =(get_star_rating( $upsell['id']) *70 ) / 5;
?>
											<div class="rating-star rateit-small">
												<button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button>
												<div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;">
													<div class="rateit-selected" style="height: 14px; width:<?= $width?>px;"></div>
													<div class="rateit-hover" style="height:0px"></div>
												</div>
											</div>
<?php
											}
?>
<?php
											$hot_deals = get_hot_deals_data();
						            		$price     = $upsell['price'];
						            		$old_price = $upsell['old_price'];
						            		if(!empty($hot_deals))
						            		{
						            			foreach ($hot_deals as $key => $hot_deals_data) 
						            			{
						            				if($hot_deals_data['product_id'] == $upsell['id'] && $upsell['quantity'] > 0 )
						            				{
						            					if ($hot_deals_data['type'] == 0)
														{
															$price = $upsell['price'] - $hot_deals_data['value'];
															$old_price = $upsell['price'];
														}
														else
														{	
															$save_amount = ($upsell['price']*$hot_deals_data['value'])/100;
															$price       = $upsell['price']-$save_amount;
															$old_price = $upsell['price'];
														}
						            				}
						            			}
						            		}

?>
										<div class="description"></div>
										<div class="product-price">
											<span class="price"><?php _el('rupees');?><?= $price; ?></span>
											<span class="price-before-discount"><?php _el('rupees');?><?= $old_price; ?></span>
										</div><!-- /.product-price -->
									</div><!-- /.product-info -->
									<div class="cart clearfix animate-effect">
										<div class="action">
											<ul class="list-unstyled">
												<li class="add-cart-button btn-group">
													<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
														<i class="fa fa-shopping-cart" onclick="add_to_cart(<?= $upsell['id'] ?>);"></i>
													</button>
													<button class="btn btn-primary cart-btn" type="button" onclick="add_to_cart(<?= $upsell['id'] ?>)"><?php _el('add_to_cart'); ?></button>
								        		</li>
<?php
						        			if(is_user_logged_in())
						        			{
?>
				                				<li class="<?= $wishlist_li_class ?>" id="lnk-wishlist-<?= $upsell['id'] ?>" >
													<a class="add-to-cart" href="javascript:void(0);"  onclick="add_wishlist_products(<?= $upsell['id']; ?>);" title="Wishlist">
														 <i class="icon fa fa-heart"></i>
													</a>
												</li>
<?php
											}
?>
											</ul>
										</div><!-- /.action -->
									</div><!-- /.cart -->
								</div><!-- /.product -->
							</div><!-- /.products -->
						</div><!-- /.item -->
<?php
						}
					}
?>
					</div><!-- /.home-owl-carousel -->
				</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /col-md-9 -->
		</div><!-- /row single-product-->
	</div><!-- /container -->
</div> <!-- /body-content -->
<!-- ================================== BODY Content : END ========================================================= -->

<script type="text/javascript">
		
	
	let products_id="<?= $products_id;?>";
	
	$(document).ready(function(){

	$.validator.addMethod("alphabetsnspace", function(value, element) {
					return this.optional(element) || /^[a-zA-Z][\sa-zA-Z]*/.test(value);
				});

	$.validator.addMethod("notspace", function(value, element) {
					return this.optional(element) || /^[a-zA-Z][a-zA-Z]$/.test(value);
				});

	// =================================Newsletters validation===============================================
	$("#frm_newsletter").validate({
        rules: {
            news_letter_email: {
                required: true,
                email: true,
                
            },
           
        },
        messages: {
           news_letter_email: {
                required:"<?php _el('please_enter_', _l('email'))?>",
                email:"<?php _el('please_enter_valid_', _l('email'))?>",
            },
           
        },
    });
// ================================= END Newsletters validation===============================================
 // ================================= Newsletters submit ===============================================
    $('#frm_newsletter').on('submit',function(e){
    	e.preventDefault();
    	var email=$('#news_letter_email').val();
    	$("#newsletter-subscribe span").html(" ");
    	$('.newletter-span-exits').html("");

    	if(email != "")
    	{
    		$.ajax({
    			type:'POST',
    			url: SITE_URL+'News_letters/news_letters_subscribe',
    			data:{ email:email },
    			success:function(msg)
    			{
    				if(msg == 'exit')
    				{	
    					var msg="<?php _el('email_exists');?>";
    					$('.newletter-span-exits').html(msg);
    					$("#news_letter_email").val(" ");
    				}
    				else if(msg == 'success')
    				{
    					jGrowlAlert("<?php _el('email_subscribe_successfully');?>", 'success');
    					$("#news_letter_email").val(" ");
    				}
    				
    			}

    		});
    	}


    });
// ================================= END Newsletters submit ===============================================
// =================================Review validation===============================================
	$("#frm_review").validate
    ({
        rules: {
            reviwe_name: {
            	required:true,
            	alphabetsnspace:true,
            },
            
            reviews:{
            	  required: true,
            	  alphabetsnspace:true,
		          minlength: 10,
            },
           
        },
        messages: {
            reviwe_name: {
            	required:"<?php _el('please_enter_', _l('name'))?>",
            	alphabetsnspace:"<?php _el('only_letter_enter')?>",
            },
            
            reviews:{
            	required:"<?php _el('please_enter_', _l('review'))?>",
            	alphabetsnspace:"<?php _el('only_letter_enter')?>",
            	minlength: "<?php _el('min_length_required')?>",

            },
           
        },
       
    });
// ================================= END Review validation===============================================
// ================================= Review submit ===============================================    
    $("#frm_review").on('submit',function(e){
    	e.preventDefault();



    	var star='';
    	if(!$("input[name='quality']:checked").val())
    	{
    		var review_star_msg="<?php _el('please_select_star');?>";
    		$(".reviewstar").html("<p style='color:red'>"+review_star_msg+"</p>");
    	}
    	else
    	{
    		$(".reviewstar").html("");
    		star=$("input[name='quality']:checked").val();
	    	
	    	var review=$.trim($("#reviews").val());
	    	
	    	if( star != '' && review != '')
	    	{
	    		
	    		$.ajax({
	    			type:'POST',
	    			url: SITE_URL+'Review/',
	    			data:{ star:star,review:review,products_id:products_id },
	    			success:function(msg)
	    			{
	    				console.log('success revire');
	    				if(msg)
	    				{

	    					$('.product-add-review').html("");
	    					$('.product-add-review-success').css('display','block');
	    				
	    				}		
	    			}
	    		});
	    	}
    	}		
    });
// ================================= END Review submit ===============================================
// ================================= comments validation===============================================
    $("#frm_comments").validate
    ({
        rules: {
           comment_name: {
            	required:true,
            	alphabetsnspace:true,
            },
           
            email:{
            	required: true,
            	alphabetsnspace:true,
                email: true,
            },
            comments:{
            	required: true,
            	alphabetsnspace:true,
            	minlength: 10,
            },
           
        },
        messages: {
            comment_name: {
            	required:"<?php _el('please_enter_', _l('name'))?>",
            	alphabetsnspace:"<?php _el('only_letter_enter');?>",
            },
            email: {
                required:"<?php _el('please_enter_', _l('email'))?>",
                alphabetsnspace:"<?php _el('only_letter_enter');?>",
                email:"<?php _el('please_enter_valid_', _l('email'))?>"
            },
            comments:{
            	required:"<?php _el('please_enter_', _l('comments'))?>",
            	alphabetsnspace:"<?php _el('not_start_space');?>",
            	minlength:"<?php _el('min_length_required')?>",
            },
           
        },
       
    });
// ================================= END comments validation===============================================
// ================================= comments submit ===============================================

    $("#frm_comments").on('submit',function(e){
    	e.preventDefault();
    	var name=$("#comment_name").val();
    	var email=$("#email").val();
    	var comments=$.trim($("#idcomments").val());
    	// alert(name + email +comments);
    	if(comments != "" && email != "" && name != "")
    	{
    		$.ajax({
				type:'POST',
				url: SITE_URL+'Comments/',
				data:{ name:name,email:email,comments:comments,products_id:products_id },
				success:function(msg)
				{
					$("#name").val("");
					$("#email").val("");
					$("#comment_name").val("");
					$("#idcomments").val("");
					var msg="<?php _el('comments_success_msg')?>";
					var div="<div class='alert alert-success alert-block fade in'><button data-dismiss='alert' class='close close-sm' type='button' style='line-height: 0.5;'><i class='fa fa-times' style='font-size:12px'></i></button>"+msg+"</div>"
					$(".comment-success-msg").html(div);
				}

			});
    	}
    });

// =================================END  comments submit ===============================================
// ================================= END tags validation===============================================
    $("#frm_tags").validate
    ({
    	rules:{
    		tags_name:{
    			required: true,
    			notspace: true,
      			minlength: 3
 				 },
    	},
    	messages:{
    		tags_name:{
    			required:"<?php _el('please_enter_tags')?>",
    			notspace:"<?php _el('no_space_allowed')?>",
      			minlength:"<?php _el('tags_min_lenght')?>",

    		},
    	},
    	errorElement : 'div',
    	errorLabelContainer: '.errorTxt',
    });
// ================================= END tags validation===============================================
// ================================= tags submit ===============================================
    $("#frm_tags").on('submit',function(e){
    	e.preventDefault();


    	var tags=$("#exampleInputTag").val();
    	var spaceCount = (tags.split(" ").length - 1);
    	var len= tags.length;

    	if(len >= 3 && spaceCount == 0)
    	{
    		$.ajax({
				type:'POST',
				url: SITE_URL+'Products/products-tags',
				data:{ tags:tags,products_id:products_id },
				success:function(msg)
				{
					
					if(msg == 'exits')
					{
						$(".errorTxt").html(" ");
						var msg="<?php _el('tags-exits'); ?>";
						var div = "<div class='tags-success-msg'><div class='alert alert-danger alert-block fade in'><button data-dismiss='alert' class='close close-sm' type='button' style='line-height: 0.5;'><i class='fa fa-times' style='font-size:12px'></i></button>"+msg+"</div></div>";
						$("#exampleInputTag").val("");
						$(".tags-success-msg").html(div);
					}
					else if(msg == 'success')
					{
						$(".errorTxt").html("");
						var msg="<?php _el('tags-sucess'); ?>";
						var div = "<div class='tags-success-msg'><div class='alert alert-success alert-block fade in'><button data-dismiss='alert' class='close close-sm' type='button' style='line-height: 0.5;'><i class='fa fa-times' style='font-size:12px'></i></button>"+msg+"</div></div>";
						$("#exampleInputTag").val("");
						$(".tags-success-msg").html(div);
						
					}
				}
			});
    	} 
    });
 // ================================= END tags submit ===============================================

   
});
	
	/**
	 * [products_update_qty description]
	 *
	 */
	function products_update_qty(obj)
	{
		var qty = parseInt($('#procuct-quantity').val());
		var limit = "<?php echo  get_product($products_id, 'quantity'); ?>";

		if(limit < qty)
		{
			swal({
                    title: '<?php _el('max_quantity_is')?>  '+limit + ' <?php _el('unit')?>',
                    type: "warning",
                });
			document.getElementById('procuct-quantity').value = limit;
       		document.getElementById("procuct-quantity").setAttribute("value", limit);
		}
	}

	var i = 1;

	/**
	 * [increment_quntity ]
	 * @param  int limit products quantity limit
	 * 
	 */
    function increment_quntity(limit) 
    {
    	if(i < limit)
    	{
    		 i++;
       		document.getElementById('procuct-quantity').value = i;
       		document.getElementById("procuct-quantity").setAttribute("value", i);

    	}
    	else if (i == limit)
        {
            swal({
                    title: '<?php _el('max_quantity_is')?>  '+limit + ' <?php _el('unit')?>',
                    type: "warning",
                });
        }
      
    }

    /**
     * [decrement_quntity ]
     */
    function decrement_quntity()
    {
    	i= $('#procuct-quantity').val();
    	if(i > 1 )
    	{
    		i--;
    		document.getElementById('procuct-quantity').value = i;
    		document.getElementById("procuct-quantity").setAttribute("value", i);
    	}
    }
    

   
</script>
