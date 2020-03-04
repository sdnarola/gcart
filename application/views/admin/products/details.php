<!-- Page header -->
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/tags/tokenfield.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/pages/form_tags_input.js'); ?>"></script>

<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('product_detail');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/products'); ?>"><?php _el('products');?></a>
            </li>
            <li class="active"><?php _el('detail');?></li>
        </ul>
    </div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Panel -->
            <div class="panel panel-flat">
                <!-- Panel heading -->
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="panel-title">
                                <strong><?php _el('product');?></strong>
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="thumbnail">
                                <img src="<?php echo base_url().$product['thumb_image']; ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <table class="table table-hover table-sm table-striped rounded">
                                <tbody>
                                    <tr> <td width="40%"><?php _el('name');?></td><td width="10%">:</td><td width="40%" class="text-semibold"><?php echo ucwords($product['name']); ?></td> </tr>

                                    <tr> <td width="40%"><?php _el('category');?></td><td width="10%">:</td><td width="40%" class="text-semibold"><?php echo ucwords(get_category_name($product['category_id'])); ?></td> </tr>

                                    <tr> <td width="40%"><?php _el('sub_category');?></td><td width="10%">:</td><td width="40%" class="text-semibold"><?php echo ucwords(get_sub_category_name($product['sub_category_id'])); ?></td> </tr>

                                    <tr> <td width="40%"><?php _el('brand');?></td><td width="10%">:</td><td width="40%" class="text-semibold"><?php echo ucwords(get_brand_name($product['brand_id'])); ?></td> </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-5">
                            <table class="table table-hover table-sm table-striped rounded">
                                <tbody>
                                    <tr> <td width="40%"><?php _el('vendor');?></td><td width="10%">:</td><td width="40%" class="text-semibold"><?php echo ucwords(get_vendor_info($product['vendor_id'], 'shop_name')); ?></td> </tr>

                                    <tr> <td width="40%"><?php _el('price');?></td><td width="10%">:</td><td width="40%" class="text-semibold"><?php echo '&#8377;'.'. '.$product['price']; ?></td> </tr>

                                    <tr> <td width="40%"><?php _el('sku');?></td><td width="10%">:</td><td width="40%" class="text-semibold"><?php echo $product['sku']; ?></td> </tr>

                                    <tr> <td width="40%"><?php _el('quantity');?></td><td width="10%">:</td><td width="40%" class="text-semibold"><?php echo $product['quantity']; ?></td> </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Panel body -->
            </div>
            <!-- /Panel -->
        </div>
    </div>
</div>
<!-- /Content area -->

<script type="text/javascript">
var BASE_URL = "<?php echo base_url(); ?>";
</script>