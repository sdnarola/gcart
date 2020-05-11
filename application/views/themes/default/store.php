<style type="text/css">
    .logo_img
    {
        border-radius: 4px;
        padding: 5px;
    }

    .logo_img:hover
    {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }

</style>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>"><?php _el('home');?></a></li>
                <li class='active'><?php _el('store');?></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content ">
    <div class="container my-wishlist-page">
        <div class="row ">
            <div class="col-md-3 logo-holder">
                <div class="logo" style="width: 170px; "><a href="<?php echo base_url($vendor['logo']); ?>" target="_blank"><img src="<?php echo base_url($vendor['logo']); ?>" class="logo_img" alt=""></a> </div>
            </div>
            <div class="col-md-6">
                <h2><?php echo ucwords($vendor['shop_name']); ?></h2>
            </div>
            <div class="col-md-3">
                <div class="pull-right">
                    <div class="sidebar-widget-body ">
                        <div class="media">
                            <div class="pull-left">
                                <span class="icon fa-stack fa-lg">
                                    <i class="fa fa-phone"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h5><a href="tel:<?php echo $vendor['mobile']; ?>"><?php echo $vendor['mobile']; ?></a></h5>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <span class="icon fa-stack fa-lg">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h5><a href="mailto:<?php echo $vendor['email']; ?>"><?php echo $vendor['email']; ?></a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-sm-2">
                                    <i class="icon fa fa-truck"></i>
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="info-box-heading green">free shipping</h4>
                                    <h6 class="text">Shipping On All Orders</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .col -->
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-sm-2">
                                    <i class="icon fa fa-rupee"></i>
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="info-box-heading green">payment method</h4>
                                    <h6 class="text">Cash On Delivery</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .col -->
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-sm-2">
                                    <i class="icon fa fa-refresh"></i>
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="info-box-heading green">30 day returns</h4>
                                    <h6 class="text">30-Day Return Policy</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .col -->
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-sm-2">
                                    <i class="icon fa fa-user-secret"></i>
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="info-box-heading green">help center</h4>
                                    <h6 class="text">24/7 Support System</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.info-boxes-inner -->
        </div>
        <!-- /.info-boxes -->
        <br>
        <h2>Products</h2>
        <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-2">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                  </ul>
                </div>
                <!-- /.filter-tabs -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-12 col-md-6">

              </div>
              <!-- /.col -->
              <div class="col col-sm-3 col-md-6 no-padding">

            </div>
            <!-- /.col -->
          <!-- </div> -->
          <!-- /.col -->
          <div class="col col-sm-6 col-md-4 text-right">
            <div class="pagination-container">
              <?php echo $link; ?>
              <!-- /.list-inline -->
            </div>
            <!-- /.pagination-container --> </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                  <?php

                    foreach ($products as $product)
                    {
                    ?>
                    <div class="col-sm-6 col-md-3 wow fadeInUp">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"><a href="<?php echo base_url($product['thumb_image']); ?>" target="_blank"><img  src="<?php echo base_url($product['thumb_image']); ?>" alt=""></a> </div>
                            <!-- /.image -->

                           <?php

                                if ($product['is_sale'] == 1)
                                {
                                ?>
                                <div class="tag sale"><span><?php _el('sale');?></span></div>
                                <?php
                                    }

                                        if ($product['is_hot'] == 1)
                                        {
                                        ?>
                                <div class="tag hot"><span><?php _el('hot');?></span></div>
                                <?php
                                    }

                                    ?>

                          </div>
                          <!-- /.product-image -->

                          <div class="product-info text-left">
                            <h3 class="name"><a href="<?php echo base_url('Products/').$product['slug']; ?>"><?php echo ucwords($product['name']); ?></a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"><?php echo '&#8377;'.'. '.$product['price']; ?></span> <span class="price-before-discount"><?php echo '&#8377;'.'. '.$product['old_price']; ?></span> </div>
                            <!-- /.product-price -->

                          </div>
                          <!-- /.product-info -->
                          <?php
                            $disabled = '';

                                if (!is_user_logged_in())
                                {
                                    $disabled = ' disabled ';
                                }

                            ?>
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                    <a onclick="add_to_cart(<?php echo $product['id']; ?>)"class="btn btn-primary icon"><i class="fa fa-shopping-cart"></i></a>

                                </li>
                                <li class="wishlist-button btn-group">
                                    <a href="<?php echo base_url('wishlist/add/').$product['id']; ?>"<?php echo $disabled; ?>class="btn btn-primary icon"><i class="icon fa fa-heart"></i></a>
                                </li>
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
                      <?php
                        }

                      ?>

                  <!-- /.item -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.category-product -->

            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane "  id="list-container">
              <div class="category-product">

                <?php

                    foreach ($products as $product)
                    {
                    ?>
                  <div class="category-product-inner wow fadeInUp">
                    <div class="products">
                      <div class="product-list product">
                        <div class="row product-list-row">
                          <div class="col col-sm-4 col-lg-4">
                            <div class="product-image">
                              <div class="image"> <img  src="<?php echo base_url($product['thumb_image']); ?>"> </div>
                            </div>
                            <!-- /.product-image -->
                          </div>
                          <!-- /.col -->
                          <div class="col col-sm-8 col-lg-8">
                            <div class="product-info">
                              <h3 class="name"><a href="<?php echo base_url('Products/').$product['slug']; ?>"><?php echo ucwords($product['name']); ?></a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"><?php echo '&#8377;'.'. '.$product['price']; ?></span> <span class="price-before-discount"><?php echo '&#8377;'.'. '.$product['old_price']; ?></span> </div>
                              <!-- /.product-price -->
                              <div class="description m-t-10"><?php echo ucfirst($product['long_description']) ?></div>
                              <?php
                                $disabled = '';

                                    if (!is_user_logged_in())
                                    {
                                        $disabled = ' disabled ';
                                    }

                                ?>
                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <a onclick="add_to_cart(<?php echo $product['id']; ?>)"><button class="btn btn-primary cart-btn" type="button" title="Cart">Add to cart</button></a>
                                    </li>
                                    <li class="lnk wishlist"> <a class="add-to-cart" href="<?php echo base_url('wishlist/add/').$product['id']; ?>"<?php echo $disabled; ?> title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                  </ul>
                                </div>
                                <!-- /.action -->
                              </div>
                              <!-- /.cart -->

                            </div>
                            <!-- /.product-info -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.product-list-row -->
                        <?php

                                if ($product['is_sale'] == 1)
                                {
                                ?>
                            <div class="tag sale"><span><?php _el('sale');?></span></div>
                            <?php
                                }

                                    if ($product['is_hot'] == 1)
                                    {
                                    ?>
                            <div class="tag hot"><span><?php _el('hot');?></span></div>
                            <?php
                                }

                                ?>
                      </div>
                      <!-- /.product-list -->
                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.category-product-inner -->
                 <?php
                    }

                 ?>



              </div>
              <!-- /.category-product -->
            </div>
            <!-- /.tab-pane #list-container -->
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">
              <div class="pagination-container">
                <?php echo $link; ?>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container --> </div>
              <!-- /.text-right -->

            </div>
            <!-- /.filters-container -->

          </div>
          <!-- /.search-result-container -->

        </div>
        <!-- /.col -->

        <!-- /.cointainer -->
<!-- /.body-cointainer -->