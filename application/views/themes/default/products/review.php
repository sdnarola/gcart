<style> 
a.active {
    font-weight: bold;
} 
</style>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?= site_url() ."Home"; ?>"><?php _el('home');?></a></li>
				<li class='active'><a href="<?= site_url('Products/'.$products_slug)?>"><?= ucwords($products_name);?></a></li>
				<li><a><?php _el('review')?></a></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
					<div class="detail-block">
						<div class="row  wow fadeInUp">
						    <div class="col-xs-12  gallery-holder">
	   							<div class="product-item-holder size-big single-product-gallery small-gallery">
	        						<div id="owl-single-product">
							            <div class="single-product-gallery-item" id="slide11">
							                <a data-lightbox="image-1" data-title="Gallery" href="<?php echo base_url().$products_detail['thumb_image']; ?>">
							                    <img class="img-responsive" alt="" src="<?php echo base_url().$products_detail['thumb_image']; ?>" data-echo="<?php echo base_url().$products_detail['thumb_image']; ?>" />
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
							<div class='col-sm-12  product-info-block'>
								<div class="product-info">
									<h1 class="name" style="font-size: 20px ;"><a href="<?= site_url('Products/'.$products_detail['slug']); ?>" style=" color: #000;"><?= ucwords($products_detail['name']);?></a></h1>
									<div class="rating-reviews m-t-20">
										<div class="row">
											<div class="col-sm-4">
<?php 
											if(!empty(get_star_rating($products_detail['id']) ))
											{
												$width =(get_star_rating($products_detail['id']) *70 ) / 5;
?>
												<div class="rating-star rateit-small">
													<button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button><div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width:<?= $width?>px;"></div><div class="rateit-hover" style="height:0px"></div></div>
												</div>
<?php
										}
?>
											</div>
<?php
									if($reviews > 0)
									{
?>
											<div class="col-sm-5">
												<div class="reviews">
													<a href="#" class="lnk"><?= "(".$reviews ?> <?php _el('review') ?><?= ")" ?></a>
												</div>
											</div>
<?php
									}
?>
										</div><!-- /.row -->
									</div><!-- /.rating-reviews -->
								</div><!-- /.product-info -->
							</div><!-- /.col-sm-7 -->
						</div><!-- /.row -->
	                </div><!-- /detail-block -->
				</div>
			</div>
			<div class="col-md-9">
				<div  class="product-tabs inner-bottom-xs  wow fadeInUp" style="margin-top: 0;">
					<div class="tab-content">
						<div class="col-sm-12">
							<div class='product-info-block'>
								<div class="">
									<div class="product-info">
										<h1 class="name" style="font-size: 20px; margin-top: 20px"><?= ucwords($products_detail['name']);?></h1>
									</div>
								</div>
							</div>
							<div id="review" class="tab-pane" style="display: block; padding: 0;">
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
<?php	
											}		
										}
?>

										</div><!-- /.reviews -->
									</div><!-- /.product-reviews -->
						       	</div><!-- /.product-tab -->
							</div><!-- /.tab-pane -->
								<!-- =================================================================================== -->
							<form id="frmpagenation">
								<input type="hidden" name="page" value="<?= $page ?>" id="page">
							</form>
							<div >
<?php		
							if($reviews > $limit)
							{
?>
								<div class="filters-container row">
						            <div class="col-sm-12 text-right">
						              	<div class="pagination-container">
											<ul class="list-inline list-unstyled">
<?php
			                    if($page >1)
			                    {
?>
                 								<li class="prev"><a href="#" class="pagination_link" data-pageno="<?php if($page > 1){ echo $page-1;}else{ echo $page;}?>"><i class="fa fa-angle-left"></i></a></li>
 <?php 
								} 
?>
<?php 

			                   $page_data= $page_size-1;
                  $page_data3=$page_size-2;
                  
                  $totalpages=floor($reviews/$limit);
                   if($reviews%$limit!=0) 
                    { $totalpages++; }
                     // 
                  if($totalpages <= $page_size)
                  {    
                         $page_no=1;   
                  }
                  else
                  {
                     if($page == $totalpages)
                    {
                      $page_no=$page-$page_data;
                    }
                    elseif(($totalpages - $page) <  $page_data3)
                    {
                      $page_no=$page- $page_data3;
                    }
                    elseif($page == 1)
                    {
                      $page_no = 1; 
                    }
                    else
                    {
                      $page_no=$page-1;
                    }
                  }
                 
// ===========================================
                  if($totalpages < $page_size)
                  {
                    $page_item=$totalpages;
                  }
                  else
                  {
                     if($page == $totalpages)
                    {
                       $page_item=$totalpages;
                    }
                    elseif($totalpages - $page <   $page_data3)
                    {
                      $page_item=$page + 1;
                    }
                    elseif($page == 1)
                    {
                      $page_item= $page + $page_data;
                    }
                    else
                    {
                         $page_item=$page +   $page_data3;
                    }     
                  }
?>
<?php 
			                  for($i=$page_no;$i<= $page_item;$i++)
			                  {  
?>
                    							<li><a  class="<?php echo ($i==$page)? 'active' : 'pagination_link'; ?>" data-pageno="<?php echo $i; ?>"><?php echo $i; ?></a></li>                   
<?php 
			                   }
			                   if($page !=  $totalpages)
			                   {
?>
                  								<li class="next"><a href="#" class="pagination_link" data-pageno="<?php if($page < $totalpages){ echo $page + 1;}else{ echo $totalpages;}?>"><i class="fa fa-angle-right"></i></a></li>
                		<?php  } ?>
                							</ul>											              		
		              					</div>
		         					</div>
		        				</div>
<?php
		            }
?>
                 			</div>
						</div>
					</div><!-- /.tab-content -->	
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	 $("a.pagination_link").click(function(){
    var page=$(this).attr('data-pageno');
    $("#page").val(page);
    $("#frmpagenation").submit();
    return false;
  });
</script>
	
