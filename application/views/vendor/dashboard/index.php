<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4></i> <span class="text-semibold"><?php _el('dashboard');?></span></h4>
		</div>
	</div>
	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url('vendor/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?> </a>
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
			        <h3 class="no-margin"><?php _el('total_products')?>  ! <span class="label pull-right"><i class="icon-cart5"></i></span></h3>
					<h4><?php echo $total_products; ?></h4>
					<div class="mt-10"><a href="<?php echo base_url('vendor/products') ?>" class="btn btn-sm bg-teal-300"><?php _el('view_all')?><i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel bg-pink-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php _el('total_orders')?>  ! <span class="label pull-right"><i class="icon-list-ordered"></i></span></h3>
					<h4><?php echo $total_orders; ?></h4>
					<div class="mt-10"><a href="<?php echo base_url('vendor/orders') ?>" class="btn btn-sm bg-pink-300"><?php _el('view_all')?><i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel bg-blue-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php _el('total_earnings')?> ! <span class="label pull-right"><i class="icon-coins"></i></span></h3>
					<h4><?php echo '&#8377;'.'. '.$total_earnings['total_amount']; ?> </h4>
					<div class="mt-10"><a href="<?php echo base_url('vendor/orders') ?>" class="btn btn-sm bg-blue-300"><?php _el('view_all')?><i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel bg-success-400">
				<div class="panel-body">
			        <h3 class="no-margin"><?php _el('items_sold')?> ! <span class="label pull-right"><i class="icon-bag"></i></span></h3>
					<h4><?php echo $items_sold['quantity']; ?></h4>
					<div class="mt-10"><a href="<?php echo base_url('vendor/orders') ?>" class="btn btn-sm bg-success-300"><?php _el('view_all')?><i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Content area -->