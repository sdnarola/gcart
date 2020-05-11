<script src="<?php echo base_url(); ?>assets/themes/default/js/jquery-1.11.1.min.js"></script>
<!--                                 <?php
                                 	$ipaddress = $_SERVER['REMOTE_ADDR'];
                                 echo $ipaddress;
                                 ?> -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?php echo site_url().'Home'; ?>"><?php _el('home');?></a></li>
				<li><a href="<?php echo site_url('categories/'.$category_slug); ?>"><?php echo ucwords($category_name); ?></a></li>
				<li class='active'><?php echo ucwords($products_name); ?></li>
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
					<form method="POST">
<?php

	if (!empty($hot_deals_products))
	{
		// echo $this->input->ip_address();
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
											<img src="<?php echo base_url().$hot_deals['thumb_image']; ?>" alt="">
										</div>
<?php

			if (!empty($hot_deals['off_percentage']))
			{
			?>
										<div class="sale-offer-tag"><span><?php echo $hot_deals['off_percentage'].'%'; ?><br>off</span></div>
<?php
	}

		?>
<!--------------------------------------------------------------------- Timer counter ------------------------------------------------------------------------------------>
									<script type="text/javascript">
										time_counter("<?php echo $end_date; ?>",<?php echo $hot_deals['id'] ?>);
									</script>
										<div class="timing-wrapper" id="time_counter_<?php echo $hot_deals['id'] ?>" data-end-date="<?php echo $end_date; ?>">

										</div>
									</div><!-- /.hot-deal-wrapper -->
<!--------------------------------------------------------------------- END Timer counter -------------------------------------------------------------------------------------->
									<div class="product-info text-left m-t-20">
										<h3 class="name"><a href="<?php echo site_url('Products/'.$hot_deals['slug']); ?>"><?php echo $hot_deals['name']; ?></a></h3>
<?php

			if (!empty(get_star_rating($hot_deals['id'])))
			{
				$width = (get_star_rating($hot_deals['id']) * 70) / 5;

			?>
											<div class="rating-star rateit-small">
												<button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button><div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width:<?php echo $width ?>px;"></div><div class="rateit-hover" style="height:0px"></div></div>
											</div>
<?php
	}

		?>

										<div class="product-price">
											<span class="price"><?php echo $hot_deals['price']; ?></span>
										    <span class="price-before-discount"><?php echo $hot_deals['old_price']; ?></span>
										</div><!-- /.product-price -->
									</div><!-- /.product-info -->

									<div class="cart clearfix animate-effect">
										<div class="action">
											<div class="add-cart-button btn-group">
												<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
													<i class="fa fa-shopping-cart" onclick="add_to_cart(<?php echo $hot_deals['product_id']; ?>)"></i>
												</button>
												<button class="btn btn-primary cart-btn" onclick="add_to_cart(<?php echo $hot_deals['product_id']; ?>)" type="button"><?php _el('add_to_cart');?></button>
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

			<form id="fromproductsdetail">
                  <input type="hidden" name="newletter_email" value="" id="newletter_email"/>
                 <!--  <input type="hidden" name="list-container"  id="list-container"/> -->
                 <!--  <input type="hidden" name="sort" value="<?php echo $sort; ?>" id="sort"/>
                  <input type="hidden" name="order" value="<?php echo $order; ?>" id="order"/>
                  <input type="hidden" name="tags" value="<?php echo $tags_data; ?>" id="tags"/>
                  <input type="hidden" name="manufacture" value="<?php echo $manufacture; ?>" id="manufacture"/>
                  <input type="hidden" name="subcategory" value="<?php echo $subcategory; ?>"  id="subcategory"/>
                  <input type="hidden" name="pricerange" value="<?php echo $pricerange; ?>" id="pricerange"/> -->
            </form>


<!-- ============================================== HOT DEALS: END ============================================== -->

<!-- ============================================== NEWSLETTER ============================================== -->
					<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
						<h3 class="section-title"><?php _el('newsletters');?></h3>
						<div class="sidebar-widget-body outer-top-xs">
							<p><?php _el('sign_up_for_our_newsletter');?></p>
					        <form id="newsletter-subscribe">

					           <div class="newletter-span-sucess">

					           </div>
					        	 <div class="form-group">
								    <label class="sr-only" for="exampleInputEmail1"><?php _el('email_address');?></label>
								    <input type="email" name="news_letter" class="form-control txt" id="exampleInputEmail1" placeholder="Subscribe to our newsletter" required="required">
								     <div class="newletter-span-exits" style="color: red; font-weight: bold;">
					          		 </div>

								  </div>

								<button class="btn btn-primary newsletter-subscribe"><?php _el('subscribe');?></button>
							</form>
						</div><!-- /.sidebar-widget-body -->`
					</div><!-- /.sidebar-widget -->
		<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->
					<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
						<div id="advertisement" class="advertisement">
					        <div class="item">
					            <div class="avatar"><img src="<?php echo base_url(); ?>assets/themes/default/images/testimonials/member1.png" alt="Image"></div>
								<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
								<div class="clients_author">John Doe<span>Abc Company</span></div><!-- /.container-fluid -->
					        </div><!-- /.item -->

		         			<div class="item">
		         				<div class="avatar"><img src="<?php echo base_url(); ?>assets/themes/default/images/testimonials/member3.png" alt="Image"></div>
								<div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
								<div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>
		        			</div><!-- /.item -->

		        			<div class="item">
		            			<div class="avatar"><img src="<?php echo base_url(); ?>assets/themes/default/images/testimonials/member2.png" alt="Image"></div>
								<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
								<div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
		       				</div><!-- /.item -->
		    			</div><!-- /.owl-carousel -->
					</div>
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
	$products_images = unserialize($products_detail['images']);

	if (!empty($products_images))
	{
		foreach ($products_images as $key => $images)
		{
			if (!empty($images))
			{
			?>
						            <div class="single-product-gallery-item" id="slide<?php echo $key ?>">
						                <a data-lightbox="image-1" data-title="Gallery" href="<?php echo base_url().$images; ?>">
						                     <img class="img-responsive" alt="" src="<?php echo base_url().$images; ?>" data-echo="<?php echo base_url().$images; ?>" />
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

	$products_images = unserialize($products_detail['images']);

	if (!empty($products_images))
	{
		foreach ($products_images as $key => $images)
		{
			if (!empty($images))
			{
			?>
						                <div class="item">
						                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?php echo $key ?>" href="#slide<?php echo $key ?>">
						                        <img class="img-responsive" width="85" alt="" src="<?php echo base_url().$images; ?>" data-echo="<?php echo base_url().$images; ?>"/>
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
								<h1 class="name"><?php echo ucwords($products_detail['name']); ?></h1>

								<div class="rating-reviews m-t-20">
									<div class="row">
										<div class="col-sm-3">
<?php

	if (!empty(get_star_rating($products_detail['id'])))
	{
		$width = (get_star_rating($products_detail['id']) * 70) / 5;
	?>
											<div class="rating-star rateit-small">
												<button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button><div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width:<?php echo $width ?>px;"></div><div class="rateit-hover" style="height:0px"></div></div>
											</div>
<?php
	}

?>
										</div>
<?php

	if ($reviews > 0)
	{
	?>
										<div class="col-sm-8">
											<div class="reviews">
												<a href="#" class="lnk"><?php echo '('.$reviews.' Reviews)' ?></a>
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
												<span class="label"><?php _el('availability');?></span>
											</div>
										</div>
<?php

	if ($products_detail['quantity'] > 0)
	{
	?>
										<div class="col-sm-9">
											<div class="stock-box">
												<span class="value"><?php _el('in_stock');?></span>
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
								</div><!-- /.stock-container -->

								<div class="description-container m-t-20">
									<?php echo $products_detail['short_description']; ?>
								</div><!-- /.description-container -->

								<div class="price-container info-container m-t-20">
									<div class="row">
										<div class="col-sm-6">
											<div class="price-box">
												<span class="price"><?php echo $products_detail['price']; ?></span>
												<span class="price-strike"><?php echo $products_detail['old_price']; ?></span>
											</div>
										</div>

										<div class="col-sm-6">
											<div class="favorite-button m-t-10">
<?php

	if (is_user_logged_in() == TRUE)
	{
	?>
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" onclick="add_wishlist_products(<?php echo $products_detail['id']; ?>)" href="javascript:void(0);">
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

	if ($products_detail['quantity'] > 0)
	{
	?>
									                <div class="arrows">
									                	<div class="arrow plus gradient" ><span class="ir" ><i class="icon fa fa-sort-asc" onclick="increment_quntity('<?php echo $products_detail['quantity']; ?>')"></i></span></div>
									                	<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc" onclick="decrement_quntity()"></i></span></div>
									                </div>

									                <input type="text" id="procuct-quantity" value="1">
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

	if ($products_detail['quantity'] > 0)
	{
	?>
										<div class="col-sm-7">
											<a href="javascript:void(0);" id="add_cart" onclick="add_to_cart(<?php echo $products_detail['id']; ?> )" class="btn btn-primary" ><i class="fa fa-shopping-cart inner-right-vs"></i><?php _el('add_to_cart');?></a>
										</div>
<?php
	}
	else
	{
	?>
										<div class="col-sm-7">
											<a href="#" class="btn btn-primary" disabled="disabled"><i class="fa fa-shopping-cart inner-right-vs"></i><?php _el('add_to_cart');?></a>
										</div>
<?php
	}

?>
									</div><!-- /.row -->
								</div><!-- /.quantity-container -->
							</div><!-- /.product-info -->
						</div><!-- /.col-sm-7 -->
					</div><!-- /.row -->
                </div><!-- /detail-block -->

				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description"><?php _el('description');?></a></li>
<?php

	if (is_user_logged_in())
	{
	?>
									<li><a data-toggle="tab" href="#review"><?php _el('review');?></a></li>
<?php
	}

?>
								<li><a data-toggle="tab" href="#tags"><?php _el('tags');?></a></li>
								<li><a data-toggle="tab" href="#comments"><?php _el('comments');?></a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">

								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"><?php echo $products_detail['long_description']; ?> </p>
									</div>
								</div><!-- /.tab-pane -->
								<div id="review" class="tab-pane">
<?php

	if (is_user_logged_in())
	{
	?>
									<div class="product-tab">

										<div class="product-reviews">
											<h4 class="title"><?php _el('customer_reviews');?></h4>

											<div class="reviews">
<?php
	$user_id           = '';
		$review_product_id = '';

		if (!empty($reviews_data))
		{
			foreach ($reviews_data as $reviews_msg)
			{
				$user_id           = $reviews_msg['user_id'];
				$review_product_id = $reviews_msg['product_id'];
				$to_date           = strtotime(date('Y-m-d h:i:sa'));
				$date              = $reviews_msg['add_date'];
				$review_date       = strtotime($date);
				$distance          = $to_date - $review_date;

				$years  = floor($distance / (365 * 60 * 60 * 24));
				$months = floor(($distance - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
				$days   = floor(($distance - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

			?>
												<div class="review">
													<div class="review-title"><span class="summary"><?php echo $reviews_msg['review']; ?></span>
<?php

				if ($days > 0)
				{
				?>
														<span class="date"><i class="fa fa-calendar"></i><span><?php echo $days ?><?php _el('days_ago');?></span>
<?php
	}

			?>
													</span></div>
													<!-- <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div> -->
												</div>
<?php	# code...
			}
		}

	?>

											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->

								<?php

										if (!in_array($user_id, $user_review_use_id) && !in_array($products_id, $user_review_products_id))
										{
										?>
									<form  id="frm_review">
										<div class="product-add-review">
											<h4 class="title"><?php _el('write_your_own_review');?></h4>
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
																<td class="cell-label"><?php _el('quality');?></td>
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
																	<label for="exampleInputName"><?php _el('your_name');?> <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="name" name="name" placeholder="enter name">

																</div><!-- /.form-group -->
																<!-- <div class="form-group">
																	<label for="exampleInputSummary"><?php _el('summary');?><span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="summary" name="summary" placeholder="enter summary">

																</div> --><!-- /.form-group -->
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
										<div class="alert alert-success alert-block fade in"><span class="add-review-success"><?php _el('review_submit_successfully');?></span></div>
									</div>
<?php
	}
		else
		{
		?>
									<div class="product-add-review">

										<div  class="alert alert-success alert-block fade in"><?php _el('review_submit_successfully');?></div>

									</div>
<?php
	}

	?>
							        </div><!-- /.product-tab -->
<?php
	}

?>
								</div><!-- /.tab-pane -->
								<!-- =================================================================================== -->
								<div id="comments" class="tab-pane">
									<div class="product-tab">

										<div class="product-reviews">
											<h4 class="title"><?php _el('customer_comments');?></h4>

											<div class="reviews">
												<?php

													if (!empty($comments_data))
													{
														foreach ($comments_data as $key => $comments)
														{
															$to_date     = strtotime(date('Y-m-d h:i:sa'));
															$date        = $comments['add_date'];
															$review_date = strtotime($date);
															$distance    = $to_date - $review_date;

															$years  = floor($distance / (365 * 60 * 60 * 24));
															$months = floor(($distance - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
															$days   = floor(($distance - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
														?>

												<div class="review">
													<div class="review-title"><!-- <span class="summary"><?php echo $comments['comment']; ?></span> -->
														<div class="text summary">"<?php echo $comments['comment']; ?>"
<?php

			if ($days > 0)
			{
			?>
														<span class="date"><i class="fa fa-calendar"></i><span><?php echo $days; ?><?php _el('days_ago');?></span>
<?php
	}

		?>
													</span></div>
													</div>
												</div>
												<?php
													}
													}

												?>

											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->


										<form id="frm_comments">
											<div class="comment-success-msg"></div>
										<div class="product-add-comment">
											<div class="review-form">
												<div class="form-container">

													<form role="form" class="cnt-form">

														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="name"><?php _el('your_name');?><span class="astk">*</span></label>
																	<input type="text" name="name" class="form-control txt" id="name" placeholder="">
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

							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->
								<div id="tags" class="tab-pane">
									<div class="product-tag">

										<h4 class="title"><?php _el('product_tags');?></h4>
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
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

<!-- ============================================== UPSELL PRODUCTS ============================================== -->
				<section class="section featured-product wow fadeInUp">
					<h3 class="section-title"><?php _el('upsell_products');?></h3>
					<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

<?php

	foreach ($upsell_products as $key => $upsell)
	{
	?>
						<div class="item item-carousel">
							<div class="products">
								<div class="product">
									<div class="product-image">
										<div class="image">
												<a href="<?php echo site_url('Products/'.$upsell->slug); ?>"><img  src="<?php echo base_url().$upsell->thumb_image; ?> " alt=""></a>
						    			</div><!-- /.image -->
										<div class="tag sale"><span>sale</span></div>
									</div><!-- /.product-image -->
									<div class="product-info text-left">
										<h3 class="name"><a href="<?php echo site_url('Products/'.$upsell->slug); ?>"><?php echo ucwords($upsell->name); ?></a></h3>
<?php

		if (!empty(get_star_rating($upsell->id)))
		{
			$width = (get_star_rating($upsell->id) * 70) / 5;
		?>
											<div class="rating-star rateit-small">
												<button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button><div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width:<?php echo $width ?>px;"></div><div class="rateit-hover" style="height:0px"></div></div>
											</div>
<?php
	}

	?>
										<div class="description"></div>
										<div class="product-price">
											<span class="price"><?php echo $upsell->price; ?></span>
											<span class="price-before-discount"><?php echo $upsell->old_price; ?></span>
										</div><!-- /.product-price -->
									</div><!-- /.product-info -->
									<div class="cart clearfix animate-effect">
										<div class="action">
											<ul class="list-unstyled">
												<li class="add-cart-button btn-group">
													<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
														<i class="fa fa-shopping-cart" onclick="add_to_cart(<?php echo $upsell->id ?>);"></i>
													</button>
													<button class="btn btn-primary cart-btn" type="button" onclick="add_to_cart(<?php echo $upsell->id ?>)"><?php _el('add_to_cart');?></button>
								        		</li>
<?php

		if (is_user_logged_in())
		{
		?>
				                				<li class="lnk wishlist">
													<a class="add-to-cart" href="<?php echo site_url('Products/'.$upsell->slug); ?>" title="Wishlist">
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

?>
					</div><!-- /.home-owl-carousel -->
				</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			</form>
			</div><!-- /col-md-9 -->
		</div><!-- /row single-product-->
	</div><!-- /container -->
</div> <!-- /body-content -->
<!-- ================================== BODY Content : END ========================================================= -->

<script type="text/javascript">


	let products_id="<?php echo $products_id; ?>";

	$(document).ready(function(){

	$.validator.addMethod("alphabetsnspace", function(value, element) {
					return this.optional(element) || /^[a-zA-Z][\sa-zA-Z]*/.test(value);
				});

	$.validator.addMethod("notspace", function(value, element) {
					return this.optional(element) || /^[a-zA-Z][a-zA-Z]$/.test(value);
				});

	$("#newsletter-subscribe").validate
    ({
        rules: {
            email: {
                required: true,
                email: true,
                emailExists: true
            },
        },
        messages: {
            email: {
                required:"<?php _el('please_enter_', _l('email'))?>",
                email:"<?php _el('please_enter_valid_', _l('email'))?>"
            },
        }
    });

    $('#newsletter-subscribe').on('submit',function(e){
    	e.preventDefault();
    	var email=$('#exampleInputEmail1').val();
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
    					$("#exampleInputEmail1").val("");
    				}
    				else if(msg == 'success')
    				{

    					var msg="<?php _el('email_subscribe_successfully');?>";
    					var div="<div class='alert alert-success alert-block fade in ' style='color: green'> <button data-dismiss='alert' class='close close-sm' type='button' style='line-height: 0.5;'><i class='fa fa-times' style='font-size:12px'></i></button>"+msg+"</div>";

    					$('.newletter-span-sucess').html(div);
    					$("#exampleInputEmail1").val("");
    				}
    			}
    		});
    	}
    });

	$("#frm_review").validate
    ({
        rules: {
            name: {
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
            name: {
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

    $("#frm_review").on('submit',function(e){
    	e.preventDefault();

    	var star='';
    	if(!$("input[name='quality']:checked").val())
    	{
    		var php_msg="<?php _el('please_select_star');?>";
    		$(".reviewstar").html("<p style='color:red'>"+php_msg+"</p>");
    	}
    	else
    	{
    		$(".reviewstar").html("");
    		star=$("input[name='quality']:checked").val();
    		var name=$("#name").val();
	    	// var summary=$("#summary").val();
	    	var review=$.trim($("#reviews").val());

	    	$.ajax({
	    			type:'POST',
	    			url: SITE_URL+'Review/add_products_review',
	    			data:{ star:star,name:name,review:review,products_id:products_id },
	    			success:function(msg)
	    			{
	    				if(msg)
	    				{
	    					$('.product-add-review').html("");
	    					$('.product-add-review-success').css('display','block');

	    				}
	    			}
	    		});
    	}
    });

    $("#frm_comments").validate
    ({
        rules: {
           name: {
            	required:true,
            	alphabetsnspace:true,
            },

            email:{
            	required: true,
                email: true,
            },
            comments:{
            	required: true,
            	alphabetsnspace:true,
            	minlength: 10,
            },

        },
        messages: {
            name: {
            	required:"<?php _el('please_enter_', _l('name'))?>",
            	alphabetsnspace:"<?php _el('only_letter_enter');?>",
            },
            email: {
                required:"<?php _el('please_enter_', _l('email'))?>",
                email:"<?php _el('please_enter_valid_', _l('email'))?>"
            },
            comments:{
            	required:"<?php _el('please_enter_', _l('comments'))?>",
            	alphabetsnspace:"<?php _el('not_start_space');?>",
            	minlength:"<?php _el('min_length_required')?>",
            },

        },

    });

    $("#frm_comments").on('submit',function(e){
    	e.preventDefault();
    	var name=$("#name").val();
    	var email=$("#email").val();
    	var comments=$.trim($("#idcomments").val());
    	// alert(name + email +comments);
    	if(comments != "" && email != "" && name != "")
    	{
    		$.ajax({
			type:'POST',
			url: SITE_URL+'Comments/add_products_comments',
			data:{ name:name,email:email,comments:comments,products_id:products_id },
			success:function(msg)
			{
				$("#name").val("");
				$("#email").val("");
				$("#idcomments").val("");
				var msg="<?php _el('comments_success_msg')?>";
				var div="<div class='alert alert-success alert-block fade in'><button data-dismiss='alert' class='close close-sm' type='button' style='line-height: 0.5;'><i class='fa fa-times' style='font-size:12px'></i></button>"+msg+"</div>"
				$(".comment-success-msg").html(div);
			}

		});
    	}
    });


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


    $("#frm_tags").on('submit',function(e){
    	e.preventDefault();
    	var tags=$("#exampleInputTag").val();
    	var spaceCount = (tags.split(" ").length - 1);
    	var len= tags.length;
    	if(len >= 3 && spaceCount == 0)
    	{
    		$.ajax({
			type:'POST',
			url: SITE_URL+'Products/',
			data:{ tags:tags,products_id:products_id },
			success:function(msg)
			{
				if(msg == 'exits')
				{
					$(".errorTxt").html(" ");
					var msg="<?php _el('tags-exits');?>";
					var div = "<div class='tags-success-msg'><div class='alert alert-danger alert-block fade in'><button data-dismiss='alert' class='close close-sm' type='button' style='line-height: 0.5;'><i class='fa fa-times' style='font-size:12px'></i></button>"+msg+"</div></div>";
					$("#exampleInputTag").val("");
					$(".tags-success-msg").html(div);
				}
				else if(msg == 'success')
				{
					$(".errorTxt").html("");
					var msg="<?php _el('tags-sucess');?>";
					var div = "<div class='tags-success-msg'><div class='alert alert-success alert-block fade in'><button data-dismiss='alert' class='close close-sm' type='button' style='line-height: 0.5;'><i class='fa fa-times' style='font-size:12px'></i></button>"+msg+"</div></div>";
					$("#exampleInputTag").val("");
					$(".tags-success-msg").html(div);
				}
			}
			});
    	}
    });

});
	var i = 1;
    function increment_quntity(limit)
    {
    	if(i < limit)
    	{
    		 i++;
       		document.getElementById('procuct-quantity').value = i;
       		document.getElementById("procuct-quantity").setAttribute("value", i);
    	}

    }

    function decrement_quntity()
    {
    	if(i > 1 )
    	{
    		i--;
    		document.getElementById('procuct-quantity').value = i;
    		document.getElementById("procuct-quantity").setAttribute("value", i);
    	}
    }
    function add_wishlist_products(id)
    {
		$.ajax({
			type:'POST',
			url:SITE_URL+"Wishlist/add_wishlist_products",
			data:{ products_id:id },
			success:function(data){
			}

		});
    }
</script>