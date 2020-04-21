<!--<div class="container" style="margin-top:30px;">-->
<?php
	$this->load->view('themes/default/includes/alerts');
	$deals = $this->deals->get_all();
?>

<script>
/**
 * Set timer for hot_deal.
 *
 * @param  string      end_date   enddate of the deal.
 * @param  int         id         id of the deal.
 */
function counter(end_date,id)
{
  var result = '';
  // Set the date we're counting down to
  var countDownDate = new Date(end_date).getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);



    // If the count down is over, write some text
    if (distance < 0)
    {
      clearInterval(x);
      result += "EXPIRED";
    }
    else
    {
    result += '<div class="box-wrapper">';
    result += '<div class="date box"> <span class="key" id="days">'+days+'</span> <span class="value">DAYS</span> </div>';
    result += '</div>';
    result += '<div class="box-wrapper">';
    result += '<div class="hour box"> <span class="key" id="hours">'+hours+'</span> <span class="value">HRS</span> </div>';
    result += '</div>';
    result += '<div class="box-wrapper">';
    result += '<div class="minutes box"> <span class="key" id="minutes">'+minutes+'</span> <span class="value">MINS</span> </div>';
    result += '</div>';
    result += '<div class="box-wrapper hidden-md">';
    result += '<div class="seconds box"> <span class="key" id="seconds">'+seconds+'</span> <span class="value">SEC</span> </div>';
    result += '</div>';
    }

    $('#time_counter_'+id).html(result);
    result='';
  }, 1000);
}
</script>

<?php
	$main_categories   = $this->category->get_header_parent_category(); //returns array of obj
	$sub_categories    = $this->category->get_sub_categories();
	$slider            = $this->sliders->get_slider();
	$banners           = $this->sliders->get_home_banners();
	$hot_deals         = $this->products->get_hot_deals();
	$reviews           = $this->products->get_all_reviews();
	$all_new_products  = $this->products->get_new_products(); //all new arrival products
	$offer_products    = $this->products->get_special_offers(); //special offer  products
	$tags              = $this->products->get_tags(); //to get all tags
	$sellers_products  = $this->products->get_best_sellers();
	$featured_products = $this->products->get_featured_products();
	$special_deal      = $this->products->get_special_deal();
	//var_dump($main_categories);

?>

<!-- ========================== ==================== HEADER : END ============================================== -->

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">

          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">

              <?php

              	foreach ($main_categories as $main_category)
              	{
              	?>
              <li class="dropdown menu-item "> <a href="<?php echo site_url('categories/'.$main_category['slug']);?>" class="dropdown-toggle" data-toggle="dropdown" id="<?php echo ($main_category['id']); ?>"><i class="fa fa"></i><?php echo ucwords($main_category['name']); ?></a>
                <ul class="dropdown-menu mega-menu" >
                  <li class="yamm-content ">
                    <div class="row customli">
                      <?php
                      	$counter = 0;

                      		foreach ($sub_categories as $sub_category)
                      		{
                      	//  var_dump($sub_categories);
                      			if ($sub_category['category_id'] == $main_category['id'])
                      			{
                      			?>
<?php
	if ($counter < 4)
				{
				?>
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="<?php echo site_url('categories/'.$main_category['slug'].'/'.$sub_category['slug']);?>"><?php echo ucwords($sub_category['name']);
				$counter++; ?></a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            <?php
                            	}
                            				elseif ($counter >= 4)
                            				{
                            				?>
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                               <li><a href="<?php echo site_url('categories/'.$main_category['slug'].'/'.$sub_category['slug']);?>"><?php echo ucwords($sub_category['name']);
				$counter++; ?></a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                             <?php
                             	}
                             				else
                             				{
                             				?>
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                               <li><a href="<?php echo site_url('categories/'.$main_category['slug'].'/'.$sub_category['slug']);?>"><?php echo ucwords($sub_category['name']);
				$counter++; ?></a></li>
                              </ul>
                            </div>
                             <?php
                             	}

                             			?>
<?php
	}
		}

	?>
                  </div>
                   </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
              </li>
              <!-- /.menu-item -->
                <?php
                	}

                ?>
            </ul>
            <!-- /.nav -->
          </nav>
          <!-- /.megamenu-horizontal -->

        </div>
        <!-- /.side-menu -->

        <!-- ================================== TOP NAVIGATION : END ================================== -->

        <!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
<?php

	if ($deals)
	{
		foreach ($deals as $deal)
		{
			$end_date = date('M d, Y  h:i:s', strtotime($deal['end_date']));
		?>
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"> <img src="<?php echo base_url().get_product($deal['product_id'], 'thumb_image'); ?>" alt="image" style="max-width: 223px;max-height:190px"> </div>
                  <div class="sale-offer-tag"><span>
                    <?php

                    			if ($deal['type'] == 0)
                    			{
                    				echo '&#8377;'.'. '.$deal['value'];
                    			}
                    			else
                    			{
                    				echo $deal['value'].' &#37;';
                    			}

                    		?><br>
                    off</span></div>
                    <script type="text/javascript">
                      counter("<?php echo $end_date; ?>",<?php echo $deal['id']; ?>);
                    </script>
                  <div class="timing-wrapper" id="time_counter_<?php echo $deal['id']; ?>">

                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->

                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="<?php echo site_url('Products/'.get_product($deal['product_id'], 'slug'));?>"><?php echo ucwords(get_product($deal['product_id'], 'name')); ?></a></h3>

                  <div class="product-price"> <span class="price"><?php echo get_product($deal['product_id'], 'price'); ?></span> <span class="price-before-discount"><?php echo get_product($deal['product_id'], 'old_price'); ?></span> </div>
                  <!-- /.product-price -->
                    <?php
                    	foreach ($reviews as $review)
                    			{
                    				if ($review['product_id'] == $deal['id'])
                    				{
                    					$i = 1;

                    					for ($i; $i <= $review['star_ratings']; $i++)
                    					{
                    					?>
                            <div class="fa fa-star" style="color: orange"></div>
                          <?php
                          	}

                          					for ($i = $i; $i <= 5; $i++)
                          					{
                          					?>
                           <div class="fa fa-star-o"></div>
                            <?php
                            	}
                            				}
                            			}

                            		?>

                </div>
                <!-- /.product-info -->

                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <a href="<?php echo base_url('cart/add/').$deal['product_id']; ?>">
                      <button  type="button" class="btn btn-primary cart-btn" ><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add to cart</button></a>
                    </div>
                  </div>
                  <!-- /.action -->
                </div>
                <!-- /.cart -->
              </div>
            </div>
<?php
	}
	}

?>
          </div>
          <!-- /.sidebar-widget -->
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== -->

        <!-- ============================================== SPECIAL OFFER ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Offer</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
               <?php
               	$offer_products = array_chunk($offer_products, 2);
               	foreach ($offer_products as $offer_products)
               	{
               	?>
              <div class="item">
                <div class="products special-product">
                <?php
                	foreach ($offer_products as $offer_product)
                		{
                		?>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo site_url('Products/'.$offer_product['slug']);?>"> <img src="<?php echo base_url().$offer_product['thumb_image'] ?>" alt="image"style="max-width: 90px;max-height: 90px"> </a> </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo site_url('Products/'.$offer_product['slug']);?>>"><?php echo ucwords($offer_product['name']); ?></a></h3>
                            <div class="product-price"> <span class="price"><?php echo $offer_product['price']; ?></span> </div>
                            <!-- /.product-price -->
                       <?php
                       	foreach ($reviews as $review)
                       			{
                       				if ($review['product_id'] == $offer_product['id'])
                       				{
                       					$i = 1;

                       					for ($i; $i <= $review['star_ratings']; $i++)
                       					{
                       					?>
                            <div class="fa fa-star" style="color: orange"></div>
                          <?php
                          	}

                          					for ($i = $i; $i <= 5; $i++)
                          					{
                          					?>
                           <div class="fa fa-star-o"></div>
                            <?php
                            	}
                            				}
                            			}

                            		?>

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  <?php
                  	}

                  	?>
                </div>
              </div>
            <?php
            	}

            ?>
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL OFFER : END ============================================== -->
        <!-- ============================================== PRODUCT TAGS ============================================== -->
        <div class="sidebar-widget product-tag wow fadeInUp">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list">
              <?php
              	$product_tags = implode(',', array_map(function ($entry)
              	{
              		return $entry['tags'];
              	}, $tags));

              	$product_tags = implode(',', array_unique(explode(',', $product_tags)));
              	$product_tags = explode(',', $product_tags);
              	$count        = 0;
              	foreach ($product_tags as $tag)
              	{
              		if ($count < 11)
              		{
              		?>
                   <a class="<?php echo ($count == 2) ? 'item active' : 'item'; ?>"  title="Phone" href="<?php echo base_url().'products/show_detail/'.'1' ?>"><?php echo '#'.ucfirst($tag);
		$count++ ?></a>
                  <?php
                  	}
                  	}

                  ?>
           </div>
            <!-- /.tag-list -->
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== PRODUCT TAGS : END ============================================== -->
        <!-- ============================================== SPECIAL DEALS ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            <?php
            	$special_deal = array_chunk($special_deal, 3);
            	foreach ($special_deal as $deal_product)
            	{
            	?>
            <div class="item">
                <div class="products special-product">
                <?php

                		foreach ($deal_product as $deal_product)
                		{
                			if ($deal_product['old_price'] > $deal_product['price'])
                			{
                				$percentage = ceil((($deal_product['old_price'] - $deal_product['price']) / $deal_product['price']) * 100);
                			}
                			else
                			{
                				$percentage = 0;
                			}

                		?>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">

                          <div class="product-image">
                            <div class="image"> <a href="<?php echo site_url('Products/'.$deal_product['slug']);?>"> <img src="<?php echo base_url().$deal_product['thumb_image'] ?>" style="max-width: 90px;max-height: 90px"  alt="product-image"> </a> </div>
                            <!-- /.image -->

                            <div class="tag hot" style="height: 35px; width:40px;"><span>
                            <?php echo round($percentage); ?>%OFF
                              </span></div>
                          </div>

                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo site_url('Products/'.$deal_product['slug']);?>>"><?php echo ucwords($deal_product['name']); ?></a></h3>
                            <div class="product-price"> <span class="price"><?php echo $deal_product['price']; ?></span> </div>
                            <!-- /.product-price -->
                      <?php
                      	foreach ($reviews as $review)
                      			{
                      				if ($review['product_id'] == $deal_product['id'])
                      				{
                      					$i = 1;

                      					for ($i; $i <= $review['star_ratings']; $i++)
                      					{
                      					?>
                            <div class="fa fa-star" style="color: orange"></div>
                          <?php
                          	}

                          					for ($i = $i; $i <= 5; $i++)
                          					{
                          					?>
                           <div class="fa fa-star-o"></div>
                         <?php
                         	}
                         				}
                         			}

                         		?>

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
               <?php
               	}

               	?>
              </div>
              </div>

            <?php
            	}

            ?>
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL DEALS : END ============================================== -->
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form action="<?php echo base_url('news_letters'); ?>" id="login_form" method="POST">
              <div class="form-group">
                <label class="sr-only" for="Subscribe_id">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter"  required>
              </div>
              <button type="submit" id="newsletter"  class="btn btn-primary">Subscribe</button>

            </form>
          </div>

          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== NEWSLETTER: END ============================================== -->

        <!-- ============================================== Testimonials============================================== -->
        <!--
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="assets/themes/default/images/testimonials/member1.png" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">John Doe <span>Abc Company</span> </div>
      /.container-fluid
            </div>
      /.item

            <div class="item">
              <div class="avatar"><img src="assets/themes/default/images/testimonials/member3.png" alt="Image"></div>
              <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
            </div>
    /.item

            <div class="item">
              <div class="avatar"><img src="assets/themes/default/images/testimonials/member2.png" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
    /.container-fluid
            </div>
    /.item

          </div>
/.owl-carousel
        </div>
-->
        <!-- ============================================== Testimonials: END ============================================== -->
<!--
        <div class="home-banner"> <img src="assets/themes/default/images/banners/LHS-banner.jpg" alt="Image"> </div>
      -->
      </div>

      <!-- /.sidemenu-holder -->
      <!-- ============================================== SIDEBAR : END ============================================== -->

      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
          <?php

          	foreach ($slider as $slider)
          	{
          	?>
              <div class="item" style="background-image: url(<?php echo base_url();
	echo $slider['image']; ?>)">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1"><?php echo ucwords($slider['title']); ?></div>
                  <div class="big-text fadeInDown-1"><?php echo ucwords($slider['sub_title']); ?></div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span><?php echo ucwords($slider['description']); ?></span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="#<?php echo base_url(); ?>index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption -->
              </div>
              <!-- /.container-fluid -->
            </div>
           <!-- /.owl-carousel -->
        <?php
        	}

        ?>
       </div>
        </div>

        <!-- ========================================= SECTION – HERO : END ========================================= -->

        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over $99</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra $5 off on all items </h6>
                </div>
              </div>
              <!-- .col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.info-boxes-inner -->

        </div>
        <!-- /.info-boxes -->
        <!-- ============================================== INFO BOXES : END ============================================== -->
        <!-- ============================================== SCROLL TABS ============================================== -->

         <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <form method="post" action="<?php echo base_url('home'); ?>">
            <h3 class="new-product-title pull-left">New Products</h3>
            <div><?php echo '</br>'; ?></div>
            <div><?php echo '</br>'; ?></div>
            <div><?php echo '</br>'; ?></div>

            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="6" id="new-products-1">

            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
            <li class="active"><a data-transition-type="backSlide" data-id="" name=""  data-toggle="tab">All</a></li>
            </ul>
               <?php
               	foreach ($main_categories as $main_category)
               	{
               	?>
                <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                <li class="item"><a  id="cat_id" data-transition-type="backSlide"  data-id="<?php echo $main_category['id']; ?>" name="<?php echo $main_category['id']; ?>" data-toggle="tab"><?php echo ucwords($main_category['name']); ?></a></li>
                </ul>
                <?php
                	}

                ?>
          </div>

          </form>
            <!-- /.nav-tabs -->
          </div>

          <div class="tab-content outer-top-xs">
              <div class="tab-pane in active" id="all">
              <div  class="product-slider">
              <div id="newone"></div>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme " data-item="4"  id='arrival_products'>
           <?php
           	foreach ($all_new_products as $product)
           	{
           		$created = date_create($product['add_date']);
           		$today   = date_create(date('Y-m-d h:i:sa'));
           		$daydiff = date_diff($today, $created);

           		$days = $daydiff->format(' %a ');

           	//if(sizeof($all_new_products)>7)

           	//{

           	// if($days<30)
           		// {
           	?>

              <div class="item item-carousel" >
                    <div class="products" >
                      <div class="product">
                        <div class="product-image">

                          <div class="image"> <a href="<?php echo site_url('Products/'.$product['slug']);?>"><img  src="<?php echo base_url().$product['thumb_image']; ?>" alt="product-image" style="max-width: 189px;max-height: 170px"></a> </div>
                          <!-- /.image -->
                         <?php
                         	if ($product['is_hot'] == 1)
                         		{
                         		?>
                          <div class="tag hot"><span>
                            HOT
                              </span></div>
                            <?php }
                            		elseif ($product['is_hot'] == 1 || $product['is_sale'] == 1)
                            		{
                            		?>
                          <div class="tag sale"><span>
                            SALE
                              </span></div>
                            <?php }
                            		else
                            		{
                            		?>
                             <div class="tag new"><span>
                            NEW
                              </span></div>
                            <?php }

                            	?>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?php echo site_url('Products/'.$product['slug']);?>"><?php echo ucwords($product['name']); ?></a></h3>
                           <div class="description"></div>
                          <div class="product-price"> <span class="price">                                                                           <?php echo ucwords($product['price']); ?></span> <span class="price-before-discount"><?php echo ucwords($product['old_price']); ?></span> </div>
                          <!-- /.product-price -->
                        </div>
                    <?php

                    		foreach ($reviews as $review)
                    		{
                    			if ($review['product_id'] == $product['id'])
                    			{
                    				$i = 1;

                    				for ($i; $i <= $review['star_ratings']; $i++)
                    				{
                    				?>
                          <div class="fa fa-star" style="color: orange"></div>
                          <?php
                          	}

                          				for ($i; $i <= 5; $i++)
                          				{
                          				?>
                         <div class="fa fa-star-o"></div>
                          <?php
                          	}
                          			}
                          		}

                          	?>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                      </div>
                      <!-- /.product -->
                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.item -->
                  <?php
                  	// }
                  		//}
                  	}

                  ?>
                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->
           </div>
        </div>
        <!-- ============================================== SCROLL TABS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">

            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">

              <div class="item" style="background-image: url(<?php echo base_url() ?><?php echo $banners[0]['banner']; ?>)">
               </div>
           <!-- /.owl-carousel -->
                <div class="image"> <img class="img-responsive" src="<?php echo base_url() ?><?php echo $banners[0]['banner']; ?>"alt="banner-imae">
                </div>
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="<?php echo base_url() ?><?php echo $banners[1]['banner']; ?>" alt="banner-image"> </div>
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->

        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Featured products</h3>

          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
       <?php

       	foreach ($featured_products as $product)
       	{
       	?>
            <div class="item item-carousel">

              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="<?php echo site_url('Products/'.$product['slug']);?>"><img  src="<?php echo base_url().$product['thumb_image']; ?>" style="max-height: 170px;max-width:189px;" alt="featured image"></a> </div>
                    <!-- /.image -->

                        <?php

                        		if ($product['is_hot'] == 1)
                        		{
                        		?>
                            <div class="tag hot"><span>
                            HOT
                              </span></div>
                            <?php }
                            		elseif ($product['is_hot'] == 1 || $product['is_sale'] == 1)
                            		{
                            		?>
                            <div class="tag sale"><span>
                            SALE
                              </span></div>
                            <?php }
                            		else
                            		{
                            		?>
                            <div class="tag new"><span>
                            NEW
                              </span></div>
                            <?php }

                            	?>
                        </div>

                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="<?php echo site_url('Products/'.$product['slug']);?>"><?php echo ucwords($product['name']); ?></a></h3>
                          <div class="description"></div>
                    <div class="product-price"> <span class="price">                                                                     <?php echo $product['price']; ?> </span> <span class="price-before-discount"><?php echo $product['old_price']; ?></span> </div>
                    <!-- /.product-price -->
                    <?php

                    		foreach ($reviews as $review)
                    		{
                    			if ($review['product_id'] == $product['id'])
                    			{
                    				$i = 1;

                    				for ($i; $i <= $review['star_ratings']; $i++)
                    				{
                    				?>
                          <div class="fa fa-star" style="color: orange"></div>
                           <?php
                           	}

                           				for ($i; $i <= 5; $i++)
                           				{
                           				?>
                         <div class="fa fa-star-o"></div>
                          <?php
                          	}
                          			}
                          		}

                          	?>

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="<?php echo base_url(); ?>detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="<?php echo base_url(); ?>detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->
              </div>
           </div>

        <?php }
        ?>
       </div>

          <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="<?php echo base_url().$banners[2]['banner']; ?>" alt="banner3"> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right"><?php echo ucwords($banners[2]['title']); ?><br>
                      <span class="shopping-needs"><?php echo ucwords($banners[2]['sub_title']); ?></span></h2>
                      <h5 style="color: orange;font-family: 'Montserrat', sans-serif;font-weight: normal;" class="text-right">
                      <span class="shopping-needs"><?php echo ucwords($banners[2]['description']); ?></span></h5>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== BEST SELLER ============================================== -->

        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Best seller</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
             <?php
             	$sellers_products = array_chunk($sellers_products, 2);

             	foreach ($sellers_products as $product)
             	{
             	?>
              <div class="item">
                <div class="products best-product">
                  <?php

                  		foreach ($product as $product)
                  		{
                  		?>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url().$product['thumb_image']; ?>"> <img src="<?php echo base_url().$product['thumb_image']; ?>" alt="best sellers product" style="max-width: 95px;max-height:95px"> </a> </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo site_url('Products/'.$product['slug']);?>"><?php echo ucwords($product['name']); ?></a></h3>
                            <div class="product-price"> <span class="price"><?php echo $product['price']; ?> </span> </div>
                            <!-- /.product-price -->
                            <?php

                            			foreach ($reviews as $review)
                            			{
                            				if ($review['product_id'] == $product['id'])
                            				{
                            					$i = 1;

                            					for ($i; $i <= $review['star_ratings']; $i++)
                            					{
                            					?>
                                <div class="fa fa-star" style="color: orange"></div>
                               <?php
                               	}

                               					for ($i; $i <= 5; $i++)
                               					{
                               					?>
                               <div class="fa fa-star-o"></div>
                              <?php
                              	}
                              				}
                              			}

                              		?>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>

                    <?php
                    	}

                    	?>

                </div>
              </div>
               <?php
               	}

               ?>

          </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->

        <!-- ============================================== BEST SELLER : END ============================================== -->
      </div>
      <!-- /.homebanner-holder -->
      <!-- ============================================== CONTENT : END ============================================== -->
    </div>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/core/libraries/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/validation/validate.min.js'); ?>"></script>
<script type="text/javascript">
//news letters
 var BASE_URL = "<?php echo base_url(); ?>";

$.validator.addMethod("emailExists", function(value, element)
{
    var mail_id = $(element).val();
    var ret_val = '';
    $.ajax({
        url:BASE_URL+'news_letters/email_exists',
        type: 'POST',
        data: { email: mail_id },
        async: false,
        success: function(msg)
        {
            if(msg==1)
            {
                ret_val = false;

            }
            else
            {
                ret_val = true;

            }
        }
    });

    return ret_val;
    console.log(ret_val);

}, "<?php _el('email_exists')?>");

$("#login_form").validate
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

</script>
<script type="text/javascript">

          var temp = document.querySelectorAll('.customli');
          var t = document.querySelector('.yamm-content');
         temp.forEach((e)=>{
          if(e.children.length === 0)
          {
          e.style.display='none';
          e.parentNode.style.display='none'
          var p = e.parentNode;
          p.parentNode.style.display='none'
          }
         })

//get new_arrival products
     // $(document).ready(function()
     // {
       $("#new-products-1 a").on("click", function()
       {

         $('#newone').html('<div id="arrival" class="owl-carousel home-owl-carousel custom-carousel owl-theme"></div>');

        var category_id = $(this).attr("data-id");
        console.log(category_id);
        $.ajax({
          url:BASE_URL+'products/get_new_arrivals',
            type: 'POST',
            data: {category_id:category_id},
            dataType: 'json',
            success: function(response)
            {
            console.log(response);
            if(response)
            {
              $('#arrival_products').hide();
            }
              var new_products = response['new_products'];
              $('#newone').html('<div id="arrival" class="owl-carousel"></div>');
                var p='';

                if(new_products.length === 0)
                {
                  p+='<center><div class="no_products" style="padding-left: 60%;">No products</br></div></center>';
                }

                  for(var i=0; i<new_products.length; i++)
                  {
                  p+='<div class="item item-carousel">';

                  p+='<div class="products">';
                  p+='<div class="product">';

                  p+='<div class="product-image">';
                  if(( new_products[i].is_hot)==1)
                  {
                  p+='<div class="tag hot"><span>HOT</span></div>';
                  }
                  else if(( new_products[i].is_sale)==1 ||( new_products[i].is_hot)==1)
                  {
                    p+='<div class="tag sale"><span>SALE</span></div>';
                  }
                  else
                  {
                    p+='<div class="tag new"><span> NEW</span></div>';
                  }

                  p+='<div class="image" id="image"> <a href="detail.html"><img  src="'+ new_products[i].thumb_image+'" alt="new_product image" style="max-width: 189px;max-height: 142px"></a> </div>';
                  p+='</div>';

                  p+='<div class="product-info text-left">';
                  p+='<h3 class="name"><a id="n1" href="detail.html">'+ new_products[i].name+'</a></h3>';
                  console.log(new_products[i].name);
                  p+='<div class="description"></div>';
                  p+='<div class="product-price"> <span class="price">'+ new_products[i].price+' </span> <span class="price-before-discount">'+ new_products[i].old_price+'</span> </div>';
                  p+='</div>';
                  p+="</div>";
                  p+="</div>";
                  p+="</div>";
                  p+='<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/main1.css">';
                  }

                  $("#arrival").append(p);

                  var owl = $("#arrival");
                  owl.owlCarousel({
                  items: 4,
                  itemsTablet:[768,2],
                  navigation : true,
                  pagination : false,
                  navigationText: ["",""],
                     });

            }
        });
      });

 </script>
    <!-- /.row -->
