<style type="text/css">
	table td img {
    max-height: 70px;
    max-width: 70px;
}
</style>
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4></i><span class="text-semibold"><?php _el('dashboard');?></span></h4>
		</div>
	</div>
	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?> </a>
			</li>
		</ul>
	</div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">

	<div class="row">
		<div class="col-md-3">
			<div class="panel bg-teal-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php _el('total_customers')?> ! <span class="label pull-right"><i class="icon-users"></i></span></h3>
					<h4><?php echo $total_users; ?></h4>
					<div class="mt-10"><a href="<?php echo base_url('admin/users') ?>" class="btn btn-sm bg-teal-300"><?php _el('view_all')?><i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel bg-pink-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php _el('total_orders')?>  ! <span class="label pull-right"><i class="icon-list-ordered"></i></span></h3>
					<h4><?php echo $total_orders; ?></h4>
					<div class="mt-10"><a href="<?php echo base_url('admin/orders') ?>" class="btn btn-sm bg-pink-300"><?php _el('view_all')?><i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel bg-blue-400">
				<div class="panel-body">
			        <h3 class="no-margin"><?php _el('total_products')?>  ! <span class="label pull-right"><i class="icon-cart5"></i></span></h3>
					<h4><?php echo $total_products; ?></h4>
					<div class="mt-10"><a href="<?php echo base_url('admin/products') ?>" class="btn btn-sm bg-blue-300"><?php _el('view_all')?><i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel bg-success-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php _el('total_vendors')?>  ! <span class="label pull-right"><i class="icon-user-tie"></i></span></h3>
					<h4><?php echo $total_vendors; ?></h4>
					<div class="mt-10"><a href="<?php echo base_url('admin/vendors') ?>" class="btn btn-sm bg-success-300"><?php _el('view_all')?><i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h6 class="panel-title"><?php _el('recent_orders')?></h6>
					<div class="heading-elements">
						<ul class="icons-list">
					        <li><a data-action="collapse" class=""></a></li>
					        <li><a data-action="reload"></a></li>
					    </ul>
				    </div>
				    <a class="heading-elements-toggle"><i class="icon-more"></i></a>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-sm table-striped rounded">
						<thead>
							<tr class="bg-slate-700">
								<th width="40%"><?php _el('order_number');?></th>
								<th width="54%"><?php _el('order_date');?></th>
								<th width="6%" class="text-center"><?php _el('details');?></th>
							</tr>
						</thead>
						<tbody>
<?php

	foreach ($recent_orders as $order)
	{
	?>
							<tr id="<?php echo $order['id']; ?>">
								<td><?php echo $order['order_number']; ?></td>
								<td><?php echo date('jS F Y  h:i:s A', strtotime($order['order_date'])); ?></td>
								<td class="text-center">
                    				<a data-popup="tooltip" data-placement="top"  title="<?php _el('details')?>" href="<?php echo site_url('admin/orders/details/'.$order['id']); ?>" id="<?php echo $order['id']; ?>" class="text-slate"><i class="icon-info3"></i></a>
                    			</td>
							</tr>
<?php }

?>
						</tbody>
					</table>
			    </div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h6 class="panel-title"><?php _el('recent_customers')?></h6>
					<div class="heading-elements">
						<ul class="icons-list">
					        <li><a data-action="collapse" class=""></a></li>
					        <li><a data-action="reload"></a></li>
					    </ul>
				    </div>
				    <a class="heading-elements-toggle"><i class="icon-more"></i></a>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-sm table-striped rounded">
						<thead>
							<tr class="bg-slate-700">
								<th width="47%"><?php _el('email');?></th>
								<th width="47%"><?php _el('join_date');?></th>
								<th width="6%" class="text-center"><?php _el('details');?></th>
							</tr>
						</thead>
						<tbody>
<?php

	foreach ($recent_customers as $customer)
	{
	?>
							<tr id="<?php echo $customer['id']; ?>">
								<td><a href="mailto:<?php echo $customer['email']; ?>"><?php echo $customer['email']; ?></a></td>
								<td><?php echo $customer['signup_date']; ?></td>
								<td class="text-center">
                    				<a data-popup="tooltip" data-placement="top"  title="<?php _el('details')?>" href="<?php echo site_url('admin/users/details/'.$customer['id']); ?>" id="<?php echo $customer['id']; ?>" class="text-slate"><i class="icon-info3"></i></a>
                    			</td>
							</tr>
<?php }

?>
						</tbody>
					</table>
			    </div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h6 class="panel-title"><?php _el('recent_products')?></h6>
					<div class="heading-elements">
						<ul class="icons-list">
					        <li><a data-action="collapse" class=""></a></li>
					        <li><a data-action="reload"></a></li>
					    </ul>
				    </div>
				    <a class="heading-elements-toggle"><i class="icon-more"></i></a>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-sm table-striped rounded">
						<thead>
							<tr class="bg-slate-700">
								<th width="15%"><?php _el('image')?></th>
								<th width="20%"><?php _el('name')?></th>
								<th width="15%"><?php _el('category')?></th>
								<th width="15%"><?php _el('sub_category')?></th>
								<th width="15%"><?php _el('brand')?></th>
								<th width="15%"><?php _el('price')?></th>
								<th width="5%" class="text-center"><?php _el('details')?></th>
							</tr>
						</thead>
						<tbody>
							<?php

								foreach ($recent_products as $product)
								{
								?>
							<tr id="<?php echo $product['id']; ?>">

								<td style="max-width: 70px;max-height: 70px;">
	                                <div class="thumb">
	                                    <img src="<?php echo base_url().$product['thumb_image']; ?>">
	                                    <div class="caption-overflow">
	                                        <span>
	                                            <a href="<?php echo base_url().$product['thumb_image']; ?>" target="_blank" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
	                                        </span>
	                                    </div>
	                                </div>
								</td>
								<td><?php echo ucwords($product['name']); ?></td>
								<td><?php echo ucwords(get_category($product['category_id'], 'name')) ?></td>
								<td><?php echo ucwords(get_sub_category($product['sub_category_id'], 'name')) ?></td>
								<td><?php echo ucwords(get_brand($product['brand_id'], 'name')) ?></td>
								<td><?php echo _l('currency_symbol').'. '.$product['price']; ?></td>
								<td class="text-center">
                    				<a data-popup="tooltip" data-placement="top"  title="<?php _el('details')?>" href="<?php echo site_url('admin/products/details/'.$product['id']); ?>" id="<?php echo $product['id']; ?>" class="text-slate"><i class="icon-info3"></i></a>
                    			</td>
							</tr>
						<?php }

						?>
						</tbody>
					</table>
			    </div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">

			<!-- Vertical bar chart -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"><?php _el('last_30_day_sale');?></h5>
					<div class="heading-elements">
						<ul class="icons-list">
	                		<li><a data-action="collapse"></a></li>
	                		<li><a data-action="reload"></a></li>
	                		<li><a data-action="close"></a></li>
	                	</ul>
                	</div>
				</div>
				<div class="panel-body">
					<div class="chart-container">
						<div class="chart" id="d3-bar-vertical"></div>
					</div>
				</div>
			</div>
			<!-- /vertical bar chart -->
		</div>
	</div>
</div>
<!-- /Content area -->
<script type="text/javascript">
 var BASE_URL = "<?php echo base_url(); ?>";
</script>
