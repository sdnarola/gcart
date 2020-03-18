
<!-- ============================================== HEADER : END ============================================== -->
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
  
</style>

<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="#">Home</a></li>
        <li class='active'><?php echo $set_page_title ;?></li>
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
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
<?php
     	        foreach ($main_category as $key => $data)
            	{ 
?>
              <li class="dropdown menu-item menu-item-with-more-category" id="parent" value="<?= $data->id ?>"> <a href="<?= base_url() ."Categories/get_parent_category_products/".$data->id; ?>"  ><i class="icon fa <?= $data->icon; ?>" aria-hidden="true"></i><?= ucwords($data->name); ?></a>
<?php 
                if(!empty($data->category_id))
                {
?>
                <span value="<?= $data->id ?>" id="parent" class="dropdown menu-item menu-item-with-more-category right-arrow-custom dropdown-toggle customspan" data-toggle="dropdown"> </span>
<?php
               }
?>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">      
                   <div class="row">
                      <div class="col-xs-12 col-sm-12 col-lg-12">  
                       <ul class="links list-unstyled">
                                         
<?php 
                    foreach ($sub_category as $key => $sub_categories) 
                    {

                      if ($sub_categories->category_id == $data->id)
                      { 
?>           
                              <div class="col-xs-12 col-sm-12 col-lg-3"> 
                              <li value="<?= $sub_categories->category_id; ?>" class="subcategory-name"><a href="<?= base_url() ."Categories/get_sub_category_products/".$sub_categories->id; ?>" ><?= ucwords($sub_categories->name);?></a></li>
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
        if(!empty($all_products))
        {
?>
           <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Manufactures</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
<?php
                foreach ($brands as $key => $brands_data) 
                {   
                  if(!empty($parent_id))
                  {                    
?>
                  <li><a href="<?= base_url() ."Categories/get_parent_categories_brands_products/".$brands_data->id ."/" . $parent_id  ?>" onclick="get_brands_products($brands_data->id)" ><?= ucwords($brands_data->name); 
                  ?></a></li>
                 <!--  <li><a href="javascript:void(0);" onclick="get_brands_products(<?php echo $brands_data->id ?>)" ><?= ucwords($brands_data->name); 
                  ?></a></li> -->
<?php
                  }
                  elseif (!empty($sub_category_id))
                  {
?>
                      <li><a href="<?= base_url() ."Categories/get_sub_categories_brands_products/".$brands_data->id ."/" . $sub_category_id  ?>" onclick="get_brands_products($brands_data->id)" ><?= ucwords($brands_data->name); ?></a></li>
<?php
                  }
                }
 ?>
                </ul>
                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>

            <!-- /.sidebar-widget -->
            <!-- ============================================== MANUFACTURES: END ============================================== -->
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
<?php
          if(!empty($parent_id))
          {
?>
           <form method="POST" action="<?= base_url() ."Categories/get_sub_categories_price_filter_products/".$parent_id ?>">
            <div class="sidebar-widget wow fadeInUp">
              <h3 class="section-title">shop by</h3>

              <div class="widget-header">
               
                <h4 class="widget-title">Category</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">
                  <div class="accordion-group">
<?php
                   foreach ($shop_by_main_category as $key => $shop_by_data)
                   {     
?>
                    <div class="accordion-heading"> <a href="#<?php if(empty($sub_categories->categroy_id)) echo 'one'.$shop_by_data->id; ?>" data-toggle="collapse" class="accordion-toggle collapsed"><?= ucwords($shop_by_data->name);?> </a> </div>         
                    <div class="accordion-body collapse" id="one<?= $shop_by_data->id;?>" style="height: 0px;">
                      <div class="accordion-inner">
 <?php
                         foreach ($shop_by_sub_category as $key => $sub_categories) 
                         {
                            if($sub_categories->category_id == $shop_by_data->id)
                            {
?>   
                       <ul>
                          <li ><input type="checkbox" name="sub_category[]" class="sub_category_checkbox" id="sub_category" value ="<?= $sub_categories->id; ?>" onclick="shope_sub_category(this)" >
                            <a  class="sub-categoriesname" > <?= ucwords($sub_categories->name); ?></a></li>
                        </ul>
<?php                  
                            } 
                          }
?>
                         </div>
                    </div>
<?php                  
                  }
                   
?>
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
         
            <!-- /.sidebar-widget -->
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

            <!-- ============================================== PRICE SILDER============================================== -->
<?php
            foreach ($max_min_price as $key => $slider_price) 
            {
?>
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Price Slider</h4>
              </div>
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left" id="pull-left" value="<?= (int)$slider_price->min_price; ?>"><?= (int)$slider_price->min_price;?> </span> <span class="pull-right" id="pull_right" value="<?= (int)$slider_price->max_price; ?>"><?= (int)$slider_price->max_price; ?></span> </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input type="text" class="price-slider" name="price_slider" value=""  >
                </div>
                <!-- /.price-range-holder -->
                
                <button  class="lnk btn btn-primary" type="submit" name="submit" > Show Now </button>
               <!--  <button  class="lnk btn btn-primary" type="submit" name="submit" id ="show_button" style="display: none"> Show Now </button> -->
               <!--  <a href="#" class="lnk btn btn-primary">Show Now</a>  --></div>
              <!-- /.sidebar-widget-body -->
            </div>
<?php
          }
?>
          </form>
<?php
        }
?>
            <!-- /.sidebar-widget -->
            <!-- ============================================== PRICE SILDER : END ============================================== -->

            <!-- ============================================== COLOR============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Colors</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  <li><a href="#">Red</a></li>
                  <li><a href="#">Blue</a></li>
                  <li><a href="#">Yellow</a></li>
                  <li><a href="#">Pink</a></li>
                  <li><a href="#">Brown</a></li>
                  <li><a href="#">Teal</a></li>
                </ul>
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== COLOR: END ============================================== -->

            <!-- ============================================== PRODUCT TAGS ============================================== -->
<?php
          if(!empty($all_products))
          {
?>
            <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
              <h3 class="section-title">Product tags</h3>
              <div class="sidebar-widget-body outer-top-xs">
                <div class="tag-list"> 
<?php
              foreach ($products_tags as $key => $tags) 
              { 
                if(!empty($parent_id))
                {  
?>
                  <a class="item" title="<?= $tags;?>" href="<?= base_url() ."Categories/get_patent_category_tags_products/".$tags.'/'.$parent_id; ?>"><?= ucwords($tags); ?></a>
<?php
                } 
              }              
              if (!empty($sub_category_id))
              {
                 foreach ($products_tags as $tags) 
                {
?>
                   <a class="item" title="<?= $tags;?>" href="<?= base_url() ."Categories/get_sub_category_tags_products/".$tags.'/'.$sub_category_id; ?>"><?= ucwords($tags) ;?></a>      
<?php
                  }
              }
             
?>
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
            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
              <div id="advertisement" class="advertisement">
                <div class="item">
                  <div class="avatar"><img src="<?= base_url(); ?>assets/themes/default/images/testimonials/member1.png ?>" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">John Doe <span>Abc Company</span> </div>
                  <!-- /.container-fluid -->
                </div>
                <!-- /.item -->

                <div class="item">
                  <div class="avatar"><img src="<?= base_url(); ?>assets/themes/default/images//testimonials/member3.png ?>" alt="Image"></div>
                  <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                </div>
                <!-- /.item -->

                <div class="item">
                  <div class="avatar"><img src="<?= base_url(); ?>assets/themes/default/images/testimonials/member2.png ?>" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                  <!-- /.container-fluid -->
                </div>
                <!-- /.item -->

              </div>
              <!-- /.owl-carousel -->
            </div>

            <!-- ============================================== Testimonials: END ============================================== -->

            <div class="home-banner"> <img src="<?= base_url(); ?>assets/themes/default/images/banners/LHS-banner.jpg ?>" alt="Image"> </div>
          </div>
          <!-- /.sidebar-filter -->
        </div>
        <!-- /.sidebar-module-container -->
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'>
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
<?php 
            if(!empty($banner_detail))
            {
?>
           <div class="image"> <img src="<?= base_url().$banner_detail->banner_image; ?>" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text">  <?= $banner_detail->title;?> </div>
                <div class="excerpt hidden-sm hidden-md"> <?= $banner_detail->sub_title;?> </div>
                <div class="excerpt-normal hidden-sm hidden-md"> <?= $banner_detail->description;?> </div>
              </div>
              <!-- /.caption -->
            </div>
            <!-- /.container-fluid -->
<?php
          }
?>
          </div>
        </div>
<?php
         if(!empty($all_products))
        {
?>
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
<?php
          
            if(!empty($parent_id) && !empty($tags_name))
            {
?>
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_asc_price_tags_products/".$parent_id.'/'.$tags_name;?>" >Price:Low to High</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_desc_price_tags_products/".$parent_id.'/'.$tags_name ?>" >Price:High to Low</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_asc_name_tags_products/".$parent_id.'/'.$tags_name?>">Product Name:A to Z</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_desc_name_tags_products/".$parent_id.'/'.$tags_name;?>">Product Name:Z to A</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>

            </div>
<?php
            }
            elseif (!empty($sub_category_id) && !empty($tags_name)) 
            {
?>
              <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_asc_price_tags_products/".$sub_category_id.'/'.$tags_name;?>" >Price:Low to High</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_desc_price_tags_products/".$sub_category_id.'/'.$tags_name ?>" >Price:High to Low</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_asc_name_tags_products/".$sub_category_id.'/'.$tags_name?>">Product Name:A to Z</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_desc_name_tags_products/".$sub_category_id.'/'.$tags_name;?>">Product Name:Z to A</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>

            </div>
<?php
            }
            elseif(!empty($brand_id) && !empty($parent_id))
            {
?>
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_asc_price_brands_products/".$parent_id.'/'.$brand_id;?>" >Price:Low to High</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_desc_price_brands_products/".$parent_id.'/'.$brand_id ?>" >Price:High to Low</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_asc_name_brands_products/".$parent_id.'/'.$brand_id?>">Product Name:A to Z</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_desc_nam_brands_products/".$parent_id.'/'.$brand_id;?>">Product Name:Z to A</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>

            </div>
<?php
            }
            elseif (!empty($brand_id) && !empty($sub_category_id)) 
            {
?>
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_asc_price_brands_products/".$sub_category_id.'/'.$brand_id;?>" >Price:Low to High</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_desc_price_brands_products/".$sub_category_id.'/'.$brand_id;?>" >Price:High to Low</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_asc_name_brands_products/".$sub_category_id.'/'.$brand_id;?>">Product Name:A to Z</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_desc_name_brands_products/".$sub_category_id.'/'.$brand_id;?>">Product Name:Z to A</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>

            </div>
<?php
            }
            elseif(!empty($filter_sub_category_id))
            { 
?>
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_asc_price_brands_products/"?>" >Price:Low to High</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_desc_price_brands_products/"?>" >Price:High to Low</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_asc_name_brands_products/"?>">Product Name:A to Z</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_desc_name_brands_products/"?>">Product Name:Z to A</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>

            </div>
<?php
            }
            elseif(!empty($parent_id))
            {
?>
              <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_asc_price_products/".$parent_id;?>" >Price:Low to High</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_desc_price_products/".$parent_id ?>" >Price:High to Low</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_asc_name_products/".$parent_id?>">Product Name:A to Z</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_parent_category_desc_name_products/".$parent_id;?>">Product Name:Z to A</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>

            </div>
<?php 
            }

            elseif(!empty($sub_category_id))
            {        
?>
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_asc_price_products/".$sub_category_id;?>" >Price:Low to High</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_desc_price_products/".$sub_category_id;?>" >Price:High to Low</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_asc_name_products/".$sub_category_id;?>">Product Name:A to Z</a></li>
                        <li role="presentation"><a href="<?= base_url()."Categories/get_sub_category_desc_name_products/".$sub_category_id;?>">Product Name:Z to A</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>

            </div>
<?php
          }
?>
            <!-- /.col -->
<?php
            if(count($all_products) > 1)
            {
?>
            <div class="col col-sm-4 col-md-4 text-right">
<?php
            }
            else
            {
?>
               <div class="col col-sm-12 col-md-12 text-right">
<?php              
            }
?>
<?php
              if(isset($link))
              {
                echo $link;
              }
?>
          
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
                foreach ($all_products as $key => $products) 
                {                    
?>
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="<?= base_url() ."Products/show_detail/". $products->id; ?>"><img  src="<?= base_url().$products->thumb_image; ?>" alt=""></a> </div>
                          <!-- /.image -->
<?php 
                        if($products->is_sale== 1)
                        {
?>
                          <div class="tag sale">
                            <?= 'Sale' ;?>
                            <span>
                          </span></div>
<?php 
                        }
                        elseif ($products->is_hot == 1) 
                        {
?>
                          <div class="tag hot"><span><?= 'Hot'; ?></span></div>
<?php
                        }

?>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?= base_url() ."Products/show_detail/". $products->id; ?>"><?= $products->name;?></a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> <?= number_format($products->new_price);?></span> <span class="price-before-discount"><?= number_format($products->old_price);?></span> </div>
                          <!-- /.product-price -->
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon"  type="button" onclick="<?= base_url() ."Products/show_detail/". $products->id; ?>"> <i class="fa fa-shopping-cart" ></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
<?php 
                              if(is_user_logged_in())
                              {
?>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="<?= base_url() ."Products/show_detail/". $products->id; ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
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
<?php               
                    }
                  }
                
                  else
                  {
                    ?>
                     <div class=" filters-container ">
                        <div class="row">
                          <div class="col col-sm-12 col-md-12">
                             <div class="text-center">
                                  No Any Prodcuts
                             </div>
                         </div>
                       </div>
                  </div>
                    
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
              <div class="category-product">
<?php
          
            if(count($all_products) > 0)
            {
              foreach ($all_products as $key => $products) 
              {  

?>
                <div class="category-product-inner wow fadeInUp">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image"> <a href="<?= base_url() ."Products/show_detail/". $products->id; ?>"> <img src="<?= base_url().$products->thumb_image; ?>" alt=""> </a></div>
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name"><a href="<?= base_url() ."Products/show_detail/". $products->id; ?>"><?= $products->name;?></a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"><?= number_format($products->new_price);?></span> <span class="price-before-discount"><?= number_format($products->old_price);?></span> </div>
                            <!-- /.product-price -->
                            <div class="description m-t-10"><?= $products->long_description;?></div>
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
<?php
                                  if(is_user_logged_in())
                                  {
?>
                                  <li class="lnk wishlist"> <a class="add-to-cart" href="<?= base_url() ."Products/show_detail/". $products->id; ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
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
                        if($products->is_sale == 1)
                        {
?>
                          <div class="tag sale">
                            <?= 'Sale' ;?>
                            <span>
                          </span></div>
<?php 
                        }
                        elseif ($products->is_hot ==1) 
                        {
?>
                          <div class="tag hot"><span><?= 'Hot'; ?></span></div>
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
            }
           
?>
              </div>
              <!-- /.category-product -->
            </div>
            <!-- /.tab-pane #list-container -->
<?php
            if(isset($link))
            {
?>
         <!--  <div class="clearfix filters-container"> -->
            <div class="text-right">
<?php 
             
                  echo $link;
?>
             </div>
            <!-- /.text-right -->

         <!--  </div> -->
<?php
            }
?>
          </div>
          <!-- /.tab-content -->
         
          <!-- /.filters-container -->

        </div>
        <!-- /.search-result-container -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  <!-- /container -->
  </div>
<!-- /body-content -->
</div>


<script type="text/javascript">

  function shope_sub_category()
  {
    var id=[];
    $(".sub_category_checkbox:checked").each(function(e){

      id.push($(this).val());

    });

    if(id.length >0)
    {
      $.ajax({

            type:"POST",
            url:"<?php echo base_url(); ?>"+"Categories/shope_category/",
            dataType:'JSON',
            data:{ sub_category_id:id },
            success:function(data)
            {
              
            }

      });
    }

  }

// $(document).ready(function(){

//   $("span").click(function(){

//   });
//   // var parent_id=$("#parent").attr("value");
//   // var sub_category_id=document.getElementsByClassName("subcategory-name").value;

//   // console.log(parent_id);
// });




function get_brands_products(id) {
 
 $.ajax({

        url:"Categories/get_brands_products/",
        type:"POST",
        data:{ brands_id:id },
        success: function(data){
          alert('hello');
        }
 });
}

function display_show_now_button()
{
  var checkBox = document.getElementById("sub_category");
  var show_button=document.getElementById("show_button");

  if (checkBox.checked == true)
  {
    show_button.style.display = "block";
  } 
  else
  {
     show_button.style.display = "none";
  }
}



// $(function(){
//   $( ".price-slider" ).slider({

//       range: true,
//       min: 0,
//       max: 500,
//       values: [ 100, 300 ],
//       slide: function( event, ui ) {

//           $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
//           $( ".pull-left" ).val(ui.values[ 0 ]);
//           $( ".pull-right" ).val(ui.values[ 1 ]);
//       }
//     });
//     $( "#amount" ).html( "$" + $( ".price-slider" ).slider( "values", 0 ) +
//      " - $" + $( ".price-slider" ).slider( "values", 1 ) );

// });



  // function filter_price_product(id)
  // {
  //   alert('hello');
  //   // document.write("hello");
  //   $.ajax({
  //           url: 'Categories/get_asc_parent_category_price_products',
  //           type: 'POST',
  //           dataType:'JSON',
  //           data: { category_id : id },
  //           success: function(response) { 
  //               alert(response);
  //               console.log(response.all_products);
  //               console.log(response.parent_id);
               
  //           },
  //       });
   
  // }

 </script>