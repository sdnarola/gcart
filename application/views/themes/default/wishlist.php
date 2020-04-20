
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
						<table class="table">
							<thead>
								<tr>
									<th colspan="4" class="heading-title">My Wishlist</th>
								</tr>
							</thead>
							<tbody>
<?php
						if(!empty($whishlist_data))
						{
							foreach ($whishlist_data as $key => $whishlist) 
							{
?>
								<tr id="wishlistdata-<?= $whishlist['id']?>" >
									<td class="col-md-2"><img src="<?= base_url(); ?><?= $whishlist['thumb_image']; ?>" alt="imga"></td>
									<td class="col-md-7">
										<div class="product-name"><a href=""><?= $whishlist['name']; ?></a></div>
<?php 
		                      if(!empty(get_star_rating( $whishlist['id']) ))
		                      {
		                        $width =( get_star_rating( $whishlist['id']) *70 ) / 5;

?>
			                      <div class="rating-star rateit-small">
			                        <button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button><div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width:<?= $width?>px;"></div><div class="rateit-hover" style="height:0px"></div></div>
			                      </div>
<?php
                   			 }
?>
										<div class="price">
											<?= $whishlist['price']; ?>
											<span><?= $whishlist['old_price']; ?></span>
										</div>
									</td>
									<td class="col-md-2">
										<a href="javascript:void(0);" class="btn-upper btn btn-primary" onclick="add_to_cart(<?= $whishlist['id']; ?>)"><?php _el('add_to_cart');?></a>
									</td>
									<td class="col-md-1 close-btn">
										<a href="javascript:void(0);" class=""><i class="fa fa-times"></i></a>
									</td>
								</tr>
<?php
							}
						}
						else
						{
							?>
								<tr>
									<td class="col-md-7">no any data</td>
								</tr>

							<?php
						}
?>
								
							</tbody>
						</table>
					</div>
				</div>			
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div>
</div>
	
