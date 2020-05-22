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

<!-- ========================== ==================== HEADER : END ============================================== -->

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">

          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i><?php _el('categories');?></div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">

              <?php
                if($main_categories){
                foreach ($main_categories as  $main_category)
                {
                ?>
              <li class="dropdown menu-item "> <a href="<?= site_url('categories/'. $main_category['slug']); ?>" class="dropdown-toggle" data-toggle="dropdown" id="<?php echo ($main_category['id']); ?>"><i class="fa fa"></i><?php echo ucwords($main_category['name']); ?></a>
                <ul class="dropdown-menu mega-menu" >
                  <li class="yamm-content ">
                    <div class="row customli">
                      <?php
                        $counter = 0;
                       if($sub_categories){
                       foreach ($sub_categories as  $sub_category)
                       {
                        if ($sub_category['category_id']== $main_category['id'])
                        {
                              ?>
                              <?php
                             if ($counter < 4)
                             {
                            ?>
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="<?= site_url('categories/'.$main_category['slug']."/".$sub_category['slug']); ?>"><?php echo ucwords($sub_category['name']); $counter++; ?></a></li>
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
                               <li><a href="<?= site_url('categories/'.$main_category['slug']."/".$sub_category['slug']); ?>"><?php echo ucwords($sub_category['name']); $counter++; ?></a></li>
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
                               <li><a href="<?= site_url('categories/'.$main_category['slug']."/".$sub_category['slug']); ?>"><?php echo ucwords($sub_category['name']); $counter++; ?></a></li>
                              </ul>
                            </div>
                             <?php
                              }
                              ?>
                         <?php
                         }
                        
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
                 } }
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
          <h3 class="section-title"><?php _el('hot_deals');?></h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
<?php  
  if ($deals)
  {
    foreach ($deals as $deal)
    {
      $end_date = date('M d, Y  h:i:s', strtotime($deal['end_date']));
      $t = time();
      $current_time = date("M d, Y h:i:s",$t);

     if($current_time < $end_date){
    ?>
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"> <img src="<?php echo base_url().get_product($deal['product_id'], 'thumb_image'); ?>" alt="Image" style="max-width: 223px;max-height:190px"> </div>
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
                    <?php _el('off');?></span></div>
                    <script type="text/javascript">
                      counter("<?php echo $end_date; ?>",<?php echo $deal['id']; ?>);
                    </script>
                  <div class="timing-wrapper" id="time_counter_<?php echo $deal['id']; ?>">

                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->

                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="<?= site_url('Products/'.get_product($deal['product_id'], 'slug')); ?>"><?php echo ucwords(get_product($deal['product_id'], 'name')); ?></a></h3>
                  
                  <div class="product-price"> <span class="price"><?php echo get_product($deal['product_id'], 'price'); ?></span> <span class="price-before-discount"><?php echo get_product($deal['product_id'], 'old_price'); ?></span> </div>
                  <!-- /.product-price -->
                    <?php
                       display_product_ratings($deal['id']);
                       ?> 
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"  onclick="add_to_cart(<?= $deal['id']; ?>)"><i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button"  onclick="add_to_cart(<?= $deal['id']; ?>)"><?php _el('add_to_cart');?></button>
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
}
?>
          </div>
          <!-- /.sidebar-widget -->
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== -->

        <!-- ============================================== SPECIAL OFFER ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title"><?php _el('Special_Offer');?></h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
               <?php
               if($offer_products){
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
                            <div class="image"> <a href="<?= site_url('Products/'.$offer_product['slug']); ?>"> <img src="<?php echo base_url().$offer_product['thumb_image']?>" alt="Image"style="max-width: 90px;max-height: 90px"> </a> </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?= site_url('Products/'.$offer_product['slug']); ?>"><?php echo ucwords($offer_product['name']);?></a></h3>
                            <div class="product-price"> <span class="price"><?php echo $offer_product['price'];?></span> </div>
                            <!-- /.product-price -->
                       <?php
                       display_product_ratings($offer_product['id']);
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
             } }
              else{
                echo '<div class="no_products" style="padding-left: 30%;margin-top:40px;margin-bottom:40px;">No Products</br></div>';
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
          <h3 class="section-title"><?php _el('Product_tags');?></h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list"> 
              <?php 
              if(!empty($tags)){
               $product_tags = implode(',', array_map(function ($entry)
                {
                  return $entry['tags'];
                }, $tags));

               $product_tags = implode(',', array_unique(explode(',', $product_tags)));
               $product_tags = explode(',', $product_tags);
               $count=0;
             
               foreach ($product_tags as $tag) { 

               if($count<11){         
                  ?>
                   <a class="<?php echo ($count==2) ? "item active" : "item"; ?>"  title="Phone" href="<?php echo base_url().'products/search?tags='.$tag?>"><?php echo ucfirst($tag);$count++?></a>
                  <?php
                }              
              }
            }
            else{
                echo '<div class="no_products" style="padding-left: 30%;margin-top:40px;margin-bottom:40px;">No tags</br></div>';
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
          <h3 class="section-title"><?php _el('special_deals');?></h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
            
            <?php
            if(!empty($special_deal))
            {
            $special_deal = array_chunk($special_deal, 3); 
            foreach ($special_deal as $deal_product)
             {           
            ?>  
            <div class="item">
                <div class="products special-product">
                <?php

                foreach ($deal_product as $deal_product) 
                { 
                 if($deal_product['old_price']>$deal_product['price'])
                   {
                     $percentage = ceil((($deal_product['old_price'] - $deal_product['price']) / $deal_product['price']) * 100);
                   }
                   else
                   {
                    $percentage=0;
                   }
               ?>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">

                          <div class="product-image">
                            <div class="image"> <a href="<?= site_url('Products/'.$deal_product['slug']); ?>"> <img src="<?php echo base_url().$deal_product['thumb_image']?>" style="max-width: 90px;max-height: 90px"  alt="Image"> </a> </div>
                            <!-- /.image -->

                            <div class="tag hot" style="height: 35px; width:40px;"><span>
                            <?php echo round($percentage); ?>%<?php _el('off');?>
                              </span></div>                              
                          </div>

                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?= site_url('Products/'.$deal_product['slug']); ?>"><?php echo ucwords($deal_product['name']);?></a></h3>
                            <div class="product-price"> <span class="price"><?php echo $deal_product['price'];?></span> </div>
                            <!-- /.product-price -->

                      <?php
                       display_product_ratings($deal_product['id']);
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
            }
            else
            {
              echo '<div class="no_products" style="padding-left: 30%;margin-top:30px;margin-bottom:60px;">No products</br></div>';
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
       
          <form id="frm_newsletter">
          <div class="sidebar-widget-body outer-top-xs">
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
             
          if(!empty($sliders))
          {
            foreach ($sliders as $slider)
            {
            ?>
              <div class="item" style="background-image: url(<?php echo base_url(); echo $slider['image']; ?>)">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1"><?php echo ucwords($slider['title']); ?></div>
                  <div class="big-text fadeInDown-1"><?php echo ucwords($slider['sub_title']); ?></div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span><?php echo ucwords($slider['description']); ?></span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="<?php echo base_url(); ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button"><?php _el('shop_now');?></a> </div>
                </div>
                <!-- /.caption -->
              </div>
              <!-- /.container-fluid -->
            </div>
           <!-- /.owl-carousel -->
        <?php
          }
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
                      <h4 class="info-box-heading green"><?php _el('money_back'); ?></h4>
                    </div>
                  </div>
                  <h6 class="text"><?php _el('30_Days_Money_Back_Guarantee');?></h6>
                </div>
              </div>
              <!-- .col -->

              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green"><?php _el('free_shipping'); ?></h4>
                    </div>
                  </div>
                  <h6 class="text"><?php _el('shipping_on_orders_over_$99'); ?></h6>
                </div>
              </div>
              <!-- .col -->

              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green"><?php _el('special_sale');?></h4>
                    </div>
                  </div>
                  <h6 class="text"><?php _el('extra_$5_off_on_all_items'); ?> </h6>
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
            <form method="post" action="<?php  echo base_url('home'); ?>">
            <h3 class="new-product-title pull-left"><?php _el('new_product'); ?></h3>
            <div><?php echo "</br>";?></div>
            <div><?php echo "</br>";?></div>
            <div><?php echo "</br>";?></div>

            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="6" id="new_arrival_products"> 
       
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new_arrival_products">
            <li class="active"><a data-transition-type="backSlide" data-id="" name=""  data-toggle="tab"><?php _el('all');?></a></li>
            </ul>
               <?php
               if(!empty($main_categories)){
                foreach ($main_categories as $main_category)
                {

                ?> 
                <ul class="nav nav-tabs nav-tab-line pull-right" id="new_arrival_products">
                <li class="item"><a  id="cat_id" data-transition-type="backSlide"  data-id="<?php echo $main_category['id']; ?>" name="<?php echo $main_category['id']; ?>" data-toggle="tab"><?php echo ucwords($main_category['name']); ?></a></li>
                </ul>    
                <?php                    
                } }
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
          if(!empty($all_new_products))
          {
          foreach ($all_new_products as $product)
           {
            $created      = date_create($product['add_date']);
            $today        = date_create(date("Y-m-d h:i:sa"));
            $daydiff      = date_diff($today, $created);

            $days= $daydiff->format(' %a ') ;  
            //if(sizeof($all_new_products)>7)
            //{ 
               // if($days<30)
               // {                   
          ?>                  
              <div class="item item-carousel" >
                    <div class="products" >
                      <div class="product">
                        <div class="product-image">
                         
                          <div class="image"> <a href="<?= site_url('Products/'.$product['slug']); ?>"><img  src="<?php echo base_url().$product['thumb_image'];?>" alt="Image" style="max-width: 189px;max-height: 170px"></a> </div>
                          <!-- /.image -->
                         <?php if($product['is_hot']==1){?> 
                          <div class="tag hot"><span>
                            <?php _el('hot')?>
                              </span></div>
                            <?php }
                            elseif ($product['is_hot']==1 || $product['is_sale']==1){?> 
                          <div class="tag sale"><span>
                            <?php _el('sale');?>
                              </span></div>
                            <?php }
                            else{?>
                             <div class="tag new"><span>
                            <?php _el('new');?>
                              </span></div>
                            <?php }
                            ?>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?= site_url('Products/'.$product['slug']); ?>"><?php echo ucwords($product['name']);?></a></h3>
                           <div class="description"></div>
                          <div class="product-price"> <span class="price"> <?php echo ucwords($product['price']);?></span> <span class="price-before-discount"><?php echo ucwords($product['old_price']);?></span> </div>
                          <!-- /.product-price -->                           
                        </div>

                      <?php
                       display_product_ratings($product['id']);
                       ?>                       
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart" onclick="add_to_cart(<?= $product['id']; ?>)"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button" onclick="add_to_cart(<?= $product['id']; ?>)"><?php _el('add_to_cart');?></button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" <?php  if (!is_user_logged_in())
                               { ?>href="<?php echo site_url('authentication'); ?>" <?php }else{ ?>href="javascript:void(0);"  onclick="add_wishlist_products(<?= $product['id']; ?>)"<?php }?> title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
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
             }
             else
             {
              echo '<div class="no_products" style="padding-left: 60%;margin-top:30px;margin-bottom:60px;">No products</br></div>';
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
               <?php 
                if(!empty($banners[0]['banner'])){
                ?>
              <div class="item" style="background-image: url(<?php echo base_url().$banners[0]['banner']; ?>)">
               </div>
           <!-- /.owl-carousel -->
                <div class="image"> <img class="img-responsive" src="<?php echo base_url().$banners[0]['banner']; ?>"alt="banner-image">
                </div>
                <?php } ?>
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                 <?php 
                if(!empty($banners[1]['banner'])){
                ?>
                <div class="image"> <img class="img-responsive" src="<?php echo base_url().$banners[1]['banner']; ?>" alt="banner-image"> </div>
                <?php } ?>

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

          <h3 class="section-title"><?php _el('featured_product');?></h3>
         
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
       <?php
       if(!empty($featured_products))
       {
        foreach ($featured_products as $product)
        {               
        ?>
            <div class="item item-carousel">
 
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="<?= site_url('Products/'.$product['slug']); ?>"><img  src="<?php echo base_url().$product['thumb_image'];?>" style="max-height: 170px;max-width:189px;" alt="Image"></a> </div>
                    <!-- /.image -->

                        <?php 
                            if($product['is_hot']==1){?>                   
                            <div class="tag hot"><span>
                            <?php _el('hot');?>
                              </span></div>
                            <?php }
                            elseif ($product['is_hot']==1 || $product['is_sale']==1){?> 
                            <div class="tag sale"><span>
                           <?php _el('sale');?>
                              </span></div>
                            <?php }
                            else{?>
                            <div class="tag new"><span>
                            <?php _el('new');?>
                              </span></div>
                            <?php }
                         ?>
                        </div>
                                        
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="<?= site_url('Products/'.$product['slug']); ?>"><?php echo ucwords($product['name']);?></a></h3>
                          <div class="description"></div>
                    <div class="product-price"> <span class="price"> <?php echo $product['price'];?> </span> <span class="price-before-discount"><?php echo $product['old_price'];?></span> </div>
                    <!-- /.product-price -->
                   
                       <?php
                       display_product_ratings($product['id']);
                       ?> 
                  
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button" onclick="add_to_cart(<?= $product['id']; ?>)"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button" onclick="add_to_cart(<?= $product['id']; ?>)"><?php _el('add_to_cart');?></button>
                        </li>
                        <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" <?php  if (!is_user_logged_in())
                               { ?>href="<?php echo site_url('authentication'); ?>" <?php }else{ ?>href="javascript:void(0);"  onclick="add_wishlist_products(<?= $product['id']; ?>)"<?php }?> title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                             
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
      }
      else{
        echo '<div class="no_products" style="padding-left: 60%;margin-top:30px;margin-bottom:60px;">No products</br></div>';
      }?>
       </div>

          <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <?php if(!empty($banners[2])){
          ?>
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
                  <div class="text"><?php _el('new');?></div>
                </div>
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        <?php } ?>
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== BEST SELLER ============================================== -->

        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title"><?php _el('best_seller');?></h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
             <?php 
             if(!empty($sellers_products))
             {
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
                            <div class="image"> <a href="<?= site_url('Products/'.$product['slug']); ?>"> <img src="<?php echo base_url().$product['thumb_image'];?>" alt="Image" style="max-width: 95px;max-height:95px"> </a> </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?= site_url('Products/'.$product['slug']); ?>"><?php echo ucwords($product['name']); ?></a></h3>
                            <div class="product-price"> <span class="price"><?php echo $product['price'];?> </span> </div>
                            <!-- /.product-price -->                           
                             <?php
                             display_product_ratings($product['id']);
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
              } 
              else{
                echo '<center><div class="no_products" style="padding-left: 60%;margin-top:30px;margin-bottom:60px;">No products</br></div></center>';
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

<script type="text/javascript">
// =================================Newsletters validation=============================
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
// ================================= END Newsletters validation=============================
 // ================================= Newsletters submit ===================================
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
// ================================= END Newsletters submit =====================================
//=======================header  parent categories if empty then hide container==================
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

//==================get new_arrival products by category id===================================
         
       $("#new_arrival_products a").on("click", function()
       {
       
         $('#newone').html('<div id="arrival" class="owl-carousel home-owl-carousel custom-carousel owl-theme"></div>');

        var category_id = $(this).attr("data-id");
      
        $.ajax({
          url:BASE_URL+'products/get_new_arrivals',
            type: 'POST',
            data: {category_id:category_id},
            dataType: 'json',
            success: function(response)
            {
            if(response)
            {
              $('#arrival_products').hide();
            }
              var new_products = response['new_products'];
              var ratings      = response['reviews'];
             
              $('#newone').html('<div id="arrival" class="owl-carousel"></div>');
                var p='';
               
                if(new_products.length === 0)
                {
                  p+='<center><div class="no_products" style="padding-left: 60%;margin-top:30px;margin-bottom:60px;">No products</br></div></center>';
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
                  
                  p+='<div class="image" id="image"> <a href="<?= site_url('Products/'); ?>'+ new_products[i].slug+'"><img  src="'+ new_products[i].thumb_image+'" alt="Image" style="max-width: 189px;max-height:170px"></a> </div>';
                  p+='</div>';
          
                  p+='<div class="product-info text-left">';
                  p+='<h3 class="name"><a id="n1" href="<?= site_url('Products/'); ?>'+ new_products[i].slug+'">'+ new_products[i].name+'</a></h3>';
                  p+='<div class="description"></div>';
                  p+='<div class="product-price"> <span class="price">'+ new_products[i].price+' </span> <span class="price-before-discount">'+ new_products[i].old_price+'</span> </div>';
                  p+='<?php $pr_id = "<script>document.writeln(new_products[i].id);</script>"?>';

                  if(ratings[i] != null)
                  {
                    var width = (ratings[i] *70 ) / 5;

                    p+='<div class="rating-star rateit-small"><button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button><div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width:'+width+'px;"></div><div class="rateit-hover" style="height:0px"></div></div> </div>';
                  }
                  else
                  {
                    for (var k = 1; k <= 5; k++)
                    {
                      p+='<div class="fa fa-star-o"></div>';
                    }
                  }
                  p+='<div class="cart clearfix animate-effect"><div class="action"><ul class="list-unstyled"><li class="add-cart-button btn-group"><button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart" onclick="add_to_cart( '+new_products[i].id+')"> <i class="fa fa-shopping-cart"></i> </button><button class="btn btn-primary cart-btn" type="button">Add to cart</button> </li><li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" <?php  if (!is_user_logged_in())
                               { ?>href="<?php echo site_url('authentication'); ?>" <?php }else{ ?>href="javascript:void(0);"  onclick="add_wishlist_products('+new_products[i].id+')"<?php }?> title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li></ul> </div></div>'; 
                  p+='</div>';
                  p+="</div>";
                  p+="</div>";
                  p+="</div>";                 
                  p+='<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/home.css">'; 
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
