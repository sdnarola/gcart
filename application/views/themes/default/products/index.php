<!-- <script src="<?php echo base_url(); ?>assets/themes/default/js/jquery-1.11.1.min.js"></script> -->
<style>
  .right-arrow-custom:after{
    color: #bababa;
    content: "\f105";
    float: right;
    font-size: 12px;
    height: 20px;
    line-height: 18px;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    width: 10px;
    font-family: "FontAwesome";
    top: 50%;
    position: absolute;
    right: 15px;
    margin-top: -10px;
  }
  span.right-arrow-custom {
    cursor: pointer;
}
a.active {
    font-weight: bold;
}
  .pagination-data .pagination{
    margin: 0;
  }
</style>


<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="<?= site_url() ."Home"; ?>"><?php _el('home');?></a></li>
        <li class='active'><?php _el('category');?></li>
<?php

         if(!empty($category_slug))
          {
  ?>
   <li ><a class="category-title" href="<?= site_url('categories/'.$category_slug); ?>" ><?= ucwords($category_title); ?></a></li>
<?php 
           }
?>
<?php
          if(!empty($subcategory_title))
          {
?>
             <li ><a><?= ucwords($subcategory_title); ?></a></li>
<?php
          }
?>
      </ul>
    </div>
    <!-- /.breadcrumb-inner -->
  </div>
  <!-- /.container -->
</div>
<!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'>
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> <?php _el('categories')?></div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
<?php
              foreach ($main_category as $key => $category_data)
              { 
?>
              <li class="dropdown menu-item menu-item-with-more-category" > <a href="<?= site_url('categories/'.$category_data['slug']); ?>" class="parent_category" id="parent_category" value="<?= $category_data['id'] ?>"  ><i class="icon fa <?=$category_data['icon']; ?>" aria-hidden="true"></i><?= ucwords($category_data['name']); ?></a>
<?php 
                if(!empty($category_data['category_id']) ) 
                {
?>
                <span value="<?= $category_data['id'] ?>" id="parent" class="dropdown menu-item menu-item-with-more-category right-arrow-custom dropdown-toggle customspan" data-toggle="dropdown"> </span>
<?php
               }
?>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">      
                   <div class="row">
                      <div class="col-xs-12 col-sm-12 col-lg-12">  
                       <ul class="links list-unstyled">
                                         
<?php 
                    foreach ($sub_category as $key => $sub_category_data) 
                    {

                      if ($sub_category_data['category_id'] == $category_data['id'])
                      { 
?>           
                              <div class="col-xs-12 col-sm-12 col-lg-3"> 
                              <li  class="subcategory-name"><a class="sub_category" id="sub_category" value="<?= $sub_category_data['id']; ?>" href="<?= site_url('categories/'.$category_data['slug']."/".$sub_category_data['slug']); ?>" ><?= ucwords($sub_category_data['name']);?></a></li>
                             </div>                    
<?php
                        }
                      }
?>
                    
                  </ul>
                    </div>
                  </li>
                </ul>
 
              </li>
<?php
             }
?>
          </ul>
        </nav>
          <!-- /.megamenu-horizontal -->
        </div>
        <!-- /.side-menu -->
        <!-- ================================== TOP NAVIGATION : END ================================== -->
        <div class="sidebar-module-container">
          <div class="sidebar-filter">
            <!-- ============================================== MANUFACTURES============================================== -->
<?php 
            if(!empty($products))
            {
?>  
           <div class="sidebar-widget wow fadeInUp manufactures">
              <div class="widget-header">
                <h4 class="widget-title"><?php _el('manufactures');?></h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  <?php 
                  if(!empty($brands)) 
                  { 
?>
<?php 
                    foreach($brands as $brand) 
                    { 
?>
                      <li><a href="#" class="<?php echo ($brand->id==$manufacture) ? 'active' : 'manufacture';?>" data-manufacture="<?php echo $brand->id; ?>"><?php echo ucwords($brand->name); ?></a></li>
<?php 
                    } 
?>
<?php
                  } 
?>
                </ul>
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
      <!-- ============================================== MANUFACTURES: END ============================================== -->
<?php 
            if(!empty($categoriesfilters)) 
            {
?>   
              <div class="sidebar-widget wow fadeInUp shop-category" >
                <h3 class="section-title"><?php _el('shop_by');?></h3>
                <div class="widget-header">
                  <h4 class="widget-title"><?php _el('category');?></h4>
                </div>
                <div class="sidebar-widget-body">
                  <div class="accordion">
                    <div class="accordion-group">
                      <?php
                        foreach ($parent_categoriesfilter as $key => $parent_category) {
                        
                       
                      ?>
                      <div class="accordion-heading"><a href="#collapseOne<?= $parent_category['id']?>" data-toggle="collapse" class="accordion-toggle collapsed"><?= ucwords($parent_category['name'])?></a> </div> 
                       <div class="accordion-body collapse" id="collapseOne<?= $parent_category['id']?>" style="height: 0px;">
                        <div class="accordion-inner">
                          <ul>
                             
<?php 
                                  foreach($categoriesfilters as $key => $item) 
                                  { 
?>
                                    <li><input  
<?php 

                                    if(!empty($subcategory))
                                    {
                                      
                                      if(strstr($subcategory,$item->id))
                                      {
                                        echo "checked";
                                      }
                                     
                                    }
?>
                                     type="checkbox" name="multiple_sub_category[]" value="<?= $item->id; ?>" id="multiple_sub_category" class="multiple_sub_category" data-subcategory="<?php echo $item->id; ?>" ><a  class="<?php echo ($item->id==$subcategory) ? 'active' : 'subcategory'; ?> sub-categoriesname" data-subcategory="<?php echo $item->id; ?>"><?php echo ucwords($item->name); ?></a></li>
<?php 
                                } 
                                 }
?>

                            </ul>
                           </div>
                      </div>
                    </div>
                    <!-- /.accordion-group -->
                  </div>
                  <!-- /.accordion -->
                </div>
                <!-- /.sidebar-widget-body -->
              </div>
<?php 
                            }
?>       
<!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

            <!-- ============================================== PRICE SILDER============================================== -->
            
              <div class="sidebar-widget wow fadeInUp price_slider_block">
                <div class="widget-header">
                  <h4 class="widget-title"><?php _el('price_slider');?></h4>
                </div>
                <div class="sidebar-widget-body m-t-10">
                  <div class="price-range-holder"> <span class="min-max"> <span class="pull-left price-min" data-value="200.00">$<?php echo $default_min_max['min']; ?></span> <span class="pull-right price-max" data-value="800.00">$<?php echo $default_min_max['max']; ?></span> </span>
                    <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                    <input type="text" id="price-slider-val" class="price-slider" name="price_slider" value=""  >
                  </div>
                  <!-- /.price-range-holder -->
                  <button  class="lnk btn btn-primary" id="btnprice" type="button" name="submit" > Show Now </button>
                </div>
                <!-- /.sidebar-widget-body -->
              </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== PRICE SILDER : END ============================================== -->

            <!-- ============================================== PRODUCT TAGS ============================================== -->

            <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
              <h3 class="section-title"><?php _el('product_tags');?></h3>
              <div class="sidebar-widget-body outer-top-xs">
                <div class="tag-list"> 
                  <ul class="list">
<?php 
                      if(!empty($products_tags)) 
                      { 
?>
<?php 
                        foreach($products_tags as $tags) 
                        { 
?>
                         <a class="<?php if($tags_data == $tags){ echo "item active" ; }else { echo "item";}  ?>" data-tags="<?= $tags; ?>" ><?= ucwords( $tags); ?></a>
<?php
                         } 
?>
<?php
                         } 
?>
                    </ul>
                </div>
                <!-- /.tag-list -->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
<?php
              } 
?>
            <!-- /.sidebar-widget -->
          <!----------- Testimonials------------->
<?php
          if(!empty($vendors_data))
          {
?>          
            <div class="sidebar-widget  wow fadeInUp outer-top-vs">
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
              </div>
              <!-- /.owl-carousel -->
            </div>
<?php      }  ?>            

            <!-- ============================================== Testimonials: END ============================================== -->
<?php 
        if(!empty($category)) 
        { 
?>
            <div class="home-banner"> <img src="<?php echo base_url(); ?>/<?php echo $category['banner']; ?>" alt="Image" height="265px" width="262px"> </div>
<?php
         } 
?>
          </div>
          <!-- /.sidebar-filter -->
        </div>
        <!-- /.sidebar-module-container -->
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'>
        <!-- ========================================== SECTION – HERO ========================================= -->
<?php 
        if(!empty($category)) 
        { 
?>
        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
           <div class="image"> <img src="<?php echo base_url(); ?>/<?php echo $category['banner']; ?>" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text"><?php echo $category['title']; ?></div>
                <div class="excerpt hidden-sm hidden-md"><?php echo $category['sub_title']; ?></div>
                <div class="excerpt-normal hidden-sm hidden-md"><?php echo $category['description']; ?></div>
              </div>
            </div>
        </div>
      </div>
<?php
         } 
?>
<?php 
        if(!empty($products))
        {
?>
        <div class="clearfix filters-container m-t-10" style="">
          <div class="row">
            <div class="col col-sm-2 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" class="grid-container" href="#grid-container"><i class="icon fa fa-th-large"></i><?php _el('grid');?></a> </li>
                  <li><a data-toggle="tab" href="#list-container" class="list-container" data-list="list-container"><i class="icon fa fa-th-list"></i><?php _el('list');?></a></li>
                </ul>
              </div>
              <!-- /.filter-tabs -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-6">
              <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt" style=""> <span class="lbl"><?php _el('sort_by');?></span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 
                     
                        <?php _el('position');?><span class="caret"></span>  </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#" class="sort" data-sort="price" data-order="asc"><?php _el('price_low_to_high'); ?></a></li>
                        <li role="presentation"><a href="#" class="sort" data-sort="price" data-order="desc"><?php _el('price_high_to_low');?></a></li>
                        <li role="presentation"><a href="#" class="sort" data-sort="name" data-order="asc"><?php _el('product_name_a_to_z'); ?></a></li>
                        <li role="presentation"><a href="#" class="sort" data-sort="name" data-order="desc"><?php _el('product_name_z_to_a'); ?></a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>
            </div>
            <!-- /.col -->
            <form id="frmCategoryfilter">
                  <input type="hidden" name="page" value="<?php echo $page; ?>" id="page"/>
                  <!-- <input type="hidden" name="list_container" value="<?= $list_container; ?>" id="list"/> -->
                  <input type="hidden" name="sort" value="<?php echo $sort; ?>" id="sort"/>
                  <input type="hidden" name="order" value="<?php echo $order; ?>" id="order"/>
                  <input type="hidden" name="tags" value="<?php echo $tags_data; ?>" id="tags"/>
                  <input type="hidden" name="manufacture" value="<?php echo $manufacture; ?>" id="manufacture"/>
                  <input type="hidden" name="subcategory" value="<?php echo $subcategory; ?>"  id="subcategory"/>
                  <input type="hidden" name="pricerange" value="<?php echo $pricerange; ?>" id="pricerange"/>
            </form>
<?php
              if($total > $limit)
              {
?>
            <div class="col col-sm-6 col-md-4 text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <?php
                    if($page >1)
                    {
                  ?>
                  <li class="prev"><a href="#" class="pagination_link" data-pageno="<?php if($page > 1){ echo $page-1;}else{ echo $page;}?>"><i class="fa fa-angle-left"></i></a></li>
                <?php } ?>
<?php 
                  // $page_size=6;
                  $page_data= $page_size-1;
                  $page_data3=$page_size-2;
                  $totalpages=floor($total/$limit);
                   if($total%$limit!=0) 
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
                    <li><a  href="javascript:void(0);" class="<?php echo ($i==$page)? 'active' : 'pagination_link'; ?>" data-pageno="<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    
<?php 
               
                   }
                   if($page !=  $totalpages)
                   {
?>
                  <li class="next"><a href="#" class="pagination_link" data-pageno="<?php if($page < $totalpages){ echo $page + 1;}else{ echo $totalpages;}?>"><i class="fa fa-angle-right"></i></a></li>
                <?php } ?>
                </ul>
              
                <!-- /.list-inline --> 
              </div>
              <!-- /.pagination-container --> </div>
<?php
            }
?>
            <!-- /.col --> 
            <!-- /.row -->
          </div>
          </div>
<?php
       } 
?>
          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list" style="">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row products-data">
<?php 
                  if(empty($products)) 
                  { 
?>
                    <p class="text-center"><?php _el('no_products');?></p>
<?php 
                  } 
                  else 
                  {
?>
<?php 
                  foreach($products as $product)
                  { 
                    $whishlist_data = get_wishlist_data($product['id']);
                    $product_id='';
                    $wishlist_class='';
                    if(!empty($whishlist_data))
                    {
                      foreach ($whishlist_data as $key => $value) 
                      {
                        $product_id=$value['product_id'];
                      }

                      if($product_id == $product['id'] )
                      {
                        $wishlist_class='background: #f80a6c; border-color: #f80a6c;';
                      }
                      else
                      {
                        $wishlist_class='';
                      }
                    }
?>      
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="<?= site_url('Products/'.$product['slug']); ?>"><img  src="<?php echo base_url(); ?><?php echo $product['thumb_image']; ?>" alt=""></a> </div>
                          <!-- /.image -->
                          
<?php
                      if($product['is_sale'] == 1)
                      {
?>
                      <div class="tag sale"><span><?php _el('sale')?></span></div>
<?php
                    }
                    elseif($product['is_hot'] == 1)
                    {
?>
                       <div class="tag hot"><span><?php _el('hot')?></span></div>
<?php
                    }
?>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?= site_url('Products/'.$product['slug']); ?>"><?= ucwords($product['name']); ?></a></h3>

<?php 
                       $width=0;
                      if(!empty(get_star_rating( $product['id']) ))
                      {
                        $width =( get_star_rating( $product['id']) *70 ) / 5;
                      }

?>
                      <div class="rating-star rateit-small">
                        <button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button><div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width:<?= $width?>px;"></div><div class="rateit-hover" style="height:0px"></div></div>
                      </div>
<?php
                            $hot_deals = get_hot_deals_data();
                            $price     = $product['price'];
                            $old_price = $product['old_price'];
                            if(!empty($hot_deals))
                            {
                              foreach ($hot_deals as $key => $hot_deals_data) 
                              {
                                if($hot_deals_data['product_id'] == $product['id'])
                                {
                                  if ($hot_deals_data['type'] == 0)
                                  {
                                    $price = $product['price'] - $hot_deals_data['value'];
                                    $old_price = $product['price'];
                                  }
                                  else
                                  { 
                                    $save_amount = ($product['price']*$hot_deals_data['value'])/100;
                                    $price       = $product['price']-$save_amount;
                                    $old_price   = $product['price'];
                                  }
                                }
                              }
                            }
?>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price">&#36;<?= $price; ?> </span> <span class="price-before-discount">&#36;<?= $old_price; ?></span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart" onclick="add_to_cart(<?= $product['id']; ?>)"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button"><?php _el('add_to_cart');?></button>
                              </li>
<?php
                              if(is_user_logged_in())
                              {
?>
                              <li class="lnk wishlist" id="lnk-wishlist-<?= $product['id']?>" style="<?= $wishlist_class ?>"> <a class="add-to-cart" href="javascript:void(0);" title="Wishlist"   onclick="add_wishlist_products(<?= $product['id']; ?>)"> <i class="icon fa fa-heart"></i> </a> </li>
<?php
                            }
?>
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
                }
?>
<?php 
             } 
?>
                  </div>
                <!-- /.row -->
                </div>
              <!-- /.category-product -->
              </div>
            <!-- /.tab-pane -->
              <div class="tab-pane "  id="list-container">
                <div class="category-product products-list-data">  
<?php 
                if(empty($products)) 
                { 
?>
                    <p><?php _el('no_products')?></p>
<?php 
                }
                else 
                { 
?>
<?php 
                foreach($products as $product)
                { 
                  $whishlist_data = get_wishlist_data($product['id']);
                    $product_id='';
                    $wishlist_class='';
                    if(!empty($whishlist_data))
                    {
                      foreach ($whishlist_data as $key => $value) 
                      {
                        $product_id=$value['product_id'];
                      }

                      if($product_id == $product['id'] )
                      {
                        $wishlist_class='background: #f80a6c; border-color: #f80a6c;';
                      }
                      else
                      {
                        $wishlist_class='';
                      }
                    }
?>  
                <div class="category-product-inner">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image"> <img src="<?php echo base_url(); ?>/<?php echo $product['thumb_image']; ?>" alt=""> </div>
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name"><a href="<?= site_url('Products/'.$product['slug']); ?>"><?= ucwords($product['name']); ?></a></h3>

<?php 
                      if(!empty(get_star_rating( $product['id']) ))
                      {
                        $width =(get_star_rating( $product['id']) *70 ) / 5;

?>
                      <div class="rating-star rateit-small">
                        <button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button><div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width:<?= $width?>px;"></div><div class="rateit-hover" style="height:0px"></div></div>
                      </div>
<?php
                    }
?>
<?php
                            $hot_deals = get_hot_deals_data();
                            $price     = $product['price'];
                            $old_price = $product['old_price'];
                            if(!empty($hot_deals))
                            {
                              foreach ($hot_deals as $key => $hot_deals_data) 
                              {
                                if($hot_deals_data['product_id'] == $product['id'])
                                {
                                  if ($hot_deals_data['type'] == 0)
                                  {
                                    $price = $product['price'] - $hot_deals_data['value'];
                                    $old_price = $product['price'];
                                  }
                                  else
                                  { 
                                    $save_amount = ($product['price']*$hot_deals_data['value'])/100;
                                    $price       = $product['price']-$save_amount;
                                    $old_price   = $product['price'];
                                  }
                                }
                              }
                            }
?>
                            <div class="product-price"> <span class="price">&#36;<?= $price; ?> </span> <span class="price-before-discount">&#36;<?= $old_price; ?></span> </div>
                            <!-- /.product-price -->
                            <div class="description m-t-10"><?php echo $product['short_description']; ?></div>
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button" > <i class="fa fa-shopping-cart" onclick="add_to_cart(<?= $product['id']; ?>)"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button" onclick="add_to_cart(<?= $product['id']; ?>);"><?php _el('add_to_cart');?></button>
                                  </li>
<?php
                                  if(is_user_logged_in())
                                  {
?>
                                  <li class="lnk wishlist" id="lnk-wishlists-<?= $product['id']?>" style="<?= $wishlist_class ?>"> <a class="add-to-cart" href="javascript:void(0);" title="Wishlist" onclick="add_wishlist_products(<?= $product['id']; ?>)"> <i class="icon fa fa-heart"></i> </a> </li>
<?php
                                  }
?>
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
                      if($product['is_sale'] == 1)
                      {
?>
                      <div class="tag sale"><span><?php _el('sale'); ?></span></div>
<?php
                    }
                    elseif($product['is_hot'] == 1)
                    {
?>
                       <div class="tag hot"><span><?php _el('hot'); ?></span></div>
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
<?php 
            } 
?>
                </div>
              <!-- /.category-product -->
              </div>
            <!-- /.tab-pane #list-container -->
            
            </div>    
          </div>
        <!-- /.search-result-container -->
      <!-- /.col -->

      </div>
    <!-- /.row -->
  <!-- /container -->
    </div>
<!-- /body-content -->
</div>

<script type="text/javascript">
 
$(document).ready(function(){

  
  // $("a.list-container").click(function(){
  //     var list= $(this).attr('href');
  //     $("#page").val();
  //     $("#list").val(list);
  //     $("#frmCategoryfilter").submit();
  //     return false;
  // });
  $("a.pagination_link").click(function(){
    var page=$(this).attr('data-pageno');
    $("#page").val(page);
    $("#frmCategoryfilter").submit();
    return false;
  });
  $("a.sort").click(function(){frmCategoryfilter
    var sort=$(this).attr('data-sort');
    var order=$(this).attr('data-order');
    $("#page").val(1);
    $("#sort").val(sort);
    $("#order").val(order);
    $("#frmCategoryfilter").submit();
    return false;
  });
  $("a.manufacture").click(function(){
    var manufacture=$(this).attr('data-manufacture');
    $("#page").val(1);
    $("#manufacture").val(manufacture);
    $("#frmCategoryfilter").submit();
    return false;
  });
  
  $("input.multiple_sub_category").click(function(){
     var id= [];

     $('#multiple_sub_category:checked').each(function(i){

        id.push($(this).val());

    }); 
    $("#page").val(1);
    $("#subcategory").val(id);
    $("#frmCategoryfilter").submit();
    
    return false;
    
  });
  // $("#multiple_sub_category:checked").each(function(e){
  //   alert('hello');
  // });
  $("a.item").click(function(){
    var tags=$(this).attr('data-tags');
    $("#page").val(1);
    $("#tags").val(tags);
    $("#frmCategoryfilter").submit();
  });
  $("#btnprice").click(function(){
    var pricerange=$("#price-slider-val").val();
    $("#page").val(1);
    $("#pricerange").val(pricerange);
    $("#frmCategoryfilter").submit();
  });

// $('#btnprice').pagination({
//     dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 195],
//     callback: function(data, pagination) {
//         // template method of yourself
//         // var html = template(data);
//         // dataContainer.html(html);
//     }
// });

  $('.price-slider').slider({
        min: <?php echo $default_min_max['min']; ?>,
        max: <?php echo $default_min_max['max']; ?>,
        step: 10,
        <?php if(!empty($pricerange)) { $min_max=explode(',',$pricerange); ?>
        value: [<?php echo $min_max[0]; ?>, <?php echo $min_max[1]; ?>],
        <?php } else { ?>
        value: [<?php echo $default_min_max['min']; ?>, <?php echo $default_min_max['max']; ?>],
        <?php } ?>
        handle: "square"

    });
});
</script>