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
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="panel-title">
                                <strong><?php _el('product');?></strong>
                            </h3>
                        </div>
                    </div>
                    <div class="heading-elements">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_large">Gallery <i class="icon-gallery position-right"></i></button>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="thumbnail">
                                <div class="thumb">
                                    <img src="<?php echo base_url().$product['thumb_image']; ?>">
                                    <div class="caption-overflow">
                                        <span>
                                            <a href="<?php echo base_url().$product['thumb_image']; ?>" target="_blank" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                                        </span>
                                    </div>
                                </div>
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

<!-- product's image gallery modal -->
<div id="modal_large" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><?php echo ucwords($product['name']); ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">

<?php
	$display = 'display:block';
	$images  = unserialize($product['images']);

	if ($images)
	{
		$count = count($images);

		if ($count == 4)
		{
			$col = 'col-md-3';}
		elseif ($count == 3)
		{
			$col = 'col-xs-6 col-md-4';}
		elseif ($count == 2)
		{
			$col = 'col-md-3 col-md-offset-2';}
		else
		{
			$col = 'col-md-4 col-md-offset-4';}

		foreach ($images as $value)
		{
		?>
                    <div class="<?php echo $col; ?>" style="<?php echo $display ?>">
                        <div class="thumbnail">
                            <div class="thumb">
                                <img src="<?php echo base_url($value); ?>">
                                <div class="caption-overflow">
                                    <span>
                                        <a href="<?php echo base_url($value); ?>" target="_blank" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

    <?php }
    	}
    	else
    	{
    		echo '<center><h4>No Images To Display!</h4></center>';
    	}

    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- product's image gallery modal -->

<script type="text/javascript">
var BASE_URL = "<?php echo base_url(); ?>";
</script>