<!-- Page header -->
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
                <a href="<?php echo base_url('vendor/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li>
                <a href="<?php echo base_url('vendor/products'); ?>"><?php _el('products');?></a>
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
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="pull-right">
                                <a href="javascript:window.history.back();" class="btn btn-default"><i class="icon-undo2 position-left"></i><?php _el('back');?></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail">
                                <div class="thumb">
                                    <img src="<?php echo base_url().$product['thumb_image']; ?>">
                                    <div class="caption-overflow">
                                        <span>
                                            <a href="<?php echo base_url().$product['thumb_image']; ?>" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <table class="table table-hover table-framed table-sm table-striped rounded">
                                <tbody>
                                    <tr> <td width="40%" class="text-semibold"><?php _el('name');?></td><td width="10%">:</td><td width="40%"><?php echo ucwords($product['name']); ?></td> </tr>

                                    <tr> <td width="40%" class="text-semibold"><?php _el('category');?></td><td width="10%">:</td><td width="40%" ><?php echo ucwords(get_category($product['category_id'], 'name')); ?></td> </tr>

                                    <tr> <td width="40%" class="text-semibold"><?php _el('sub_category');?></td><td width="10%">:</td><td width="40%" ><?php echo ucwords(get_sub_category($product['sub_category_id'], 'name')); ?></td> </tr>

                                    <tr> <td width="40%" class="text-semibold"><?php _el('brand');?></td><td width="10%">:</td><td width="40%" ><?php echo ucwords(get_brand($product['brand_id'], 'name')); ?></td> </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-5">
                            <table class="table table-hover table-framed table-sm table-striped rounded">
                                <tbody>
                                    <tr> <td width="40%" class="text-semibold"><?php _el('vendor');?></td><td width="10%">:</td><td width="40%" ><a data-popup="tooltip" data-placement="top"  title="<?php _el('vendor')?>" href="<?php echo base_url('home/store/').$product['vendor_id']; ?>"><?php echo ucwords(get_vendor_info($product['vendor_id'], 'shop_name')); ?>
                                        </a></td> </tr>

                                    <tr> <td width="40%" class="text-semibold"><?php _el('price');?></td><td width="10%">:</td><td width="40%" ><?php echo _l('currency_symbol').' '.$product['price']; ?></td> </tr>

                                    <tr> <td width="40%" class="text-semibold"><?php _el('sku');?></td><td width="10%">:</td><td width="40%" ><?php echo $product['sku']; ?></td> </tr>

                                    <tr> <td width="40%" class="text-semibold"><?php _el('quantity');?></td><td width="10%">:</td><td width="40%" ><?php echo $product['quantity']; ?></td> </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <!-- multiple images of product -->
                    <div class="row">
<?php
	$images = unserialize($product['images']);

	if ($images)
	{
		foreach ($images as $image)
		{
		?>
                        <div class="col-md-2">
                            <div class="thumbnail">
                                <div class="thumb">
                                    <img src="<?php echo base_url($image); ?>">
                                    <div class="caption-overflow">
                                        <span>
                                            <a href="<?php echo base_url($image); ?>" target="_blank" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php }
	}

?>
                    </div>
                    <!-- /multiple images of product -->
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