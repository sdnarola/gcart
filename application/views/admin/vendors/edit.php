<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4>
				<span class="text-semibold"><?php _el('edit');?><?php _el('vendor');?></span>
			</h4>
		</div>
	</div>
	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
			</li>
			<li>
				<a href="<?php echo base_url('admin/vendors'); ?>"><?php _el('vendors');?></a>
			</li>
			<li class="active"><?php _el('edit');?></li>
		</ul>
	</div>
</div>
<!-- Page header -->
<!-- Content area -->
<div class="content">
<?php

	if ($vendor)
	{
	?>
					<div class="col-md-8 col-md-offset-2">
						<!-- Panel -->
						<div class="panel panel-flat">
							<!-- Panel heading -->
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-10">
										<h5 class="panel-title">
											<strong><?php _el('vendor');?></strong>
										</h5>
									</div>
								</div>
							</div>
							<!-- /Panel heading -->
							<!-- Panel body -->
							<div class="panel-body">
								<form action="<?php echo base_url('admin/vendors/edit/').$vendor['id']; ?>" id="vendor_edit_form" name="vendor_edit_form" method="POST">
								<div class="row">
									<div class="col-md-6">
										<fieldset>
											<legend class="text-semibold"><i class="icon-reading position-left"></i><?php _el('vendor')?><?php _el('details')?></legend>
<?php

		$file = basename($vendor['profile_image']);
	?>
											<div class="form-group">
												<label><?php _el('profile');?><?php _el('image');?>:</label>
										         <div>
													<img src="<?php echo base_url().'assets/Uploads/vendors/profile/'.$file; ?>" alt="<?php _el('img_alt_msg')?>" height="226" width="226" border="2" class="img-circle"></img>
												</div>
											</div>
											<div class="form-group">
												<small class="req text-danger">* </small>
												<label><?php _el('firstname');?>:</label>
												<input type="text" class="form-control" placeholder="<?php _el('firstname');?>" id="firstname" name="firstname" value="<?php echo ucfirst($vendor['firstname']); ?>">
											</div>
											<div class="form-group">
												<small class="req text-danger">* </small>
												<label><?php _el('lastname');?>:</label>
												<input type="text" class="form-control" placeholder="<?php _el('lastname');?>" id="lastname" name="lastname" value="<?php echo ucfirst($vendor['lastname']); ?>">
											</div>
											<div class="form-group">
												<small class="req text-danger">* </small>
												<label><?php _el('email');?>:</label>
												<input type="text" class="form-control" placeholder="<?php _el('email');?>" id="email" name="email" class="email"value="<?php echo $vendor['email']; ?>">
											</div>
											<div class="form-group">
												<small class="req text-danger">* </small>
												<label><?php _el('mobile_no');?>:</label>
												<input type="text" class="form-control" placeholder="<?php _el('mobile_no');?>" id="mobile" name="mobile" value="<?php echo $vendor['mobile']; ?>">
											</div>
											<div class="form-group">
												<small class="req text-danger">* </small>
												<label><?php _el('address');?>:</label>
												<input type="text" class="form-control" placeholder="<?php _el('address');?>" id="address" name="address" value="<?php echo ucfirst($vendor['address']); ?>">
											</div>
											<div class="form-group">
												<small class="req text-danger">* </small>
												<label><?php _el('pincode');?>:</label>
												<input type="text" class="form-control" placeholder="<?php _el('pincode');?>" id="pincode" name="pincode" value="<?php echo $vendor['pincode']; ?>">
											</div>
											<div class="form-group">
												<small class="req text-danger">* </small>
												<label><?php _el('city');?>:</label>
												<input type="text" class="form-control" placeholder="<?php _el('city');?>" id="city" name="city" value="<?php echo ucfirst($vendor['city']); ?>">
											</div>
<?php
	$readonly = '';
	?>
											<div class="form-group">
											<label><?php _el('status');?>:</label>
											<input type="checkbox" class="switchery" name="is_active" id="<?php echo $vendor['id']; ?>"<?php

		if ($vendor['is_active'] == 1)
		{
			echo 'checked';}

	?><?php echo $readonly; ?>>
											</div>
										</fieldset>
									</div>
									<div class="col-md-6">
										<fieldset>
							                <legend class="text-semibold"><i class="icon-store position-left"></i><?php _el('shop')?><?php _el('details')?></legend>
<?php
	$file = basename($vendor['logo']);
	?>
													<div class="form-group">
														<label><?php _el('shop');?>&nbsp<?php _el('logo');?>:</label>
										                <div>
															 <img src="<?php echo base_url().'assets/Uploads/vendors/logo/'.$file; ?>" alt="<?php _el('img_alt_msg')?>" alt="<?php _el('img_alt_msg')?>" height="226" width="226" border="10" class="img-circle"></img>
														</div>
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('owner');?>&nbsp<?php _el('name');?>:</label>
														<input type="text" class="form-control" placeholder="<?php _el('owner');?><?php _el('name');?> " id="owner_name" name="owner_name" value="<?php echo ucfirst($vendor['owner_name']); ?>">
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('shop');?>&nbsp<?php _el('name');?>:</label>
														<input type="text" class="form-control" placeholder="<?php _el('shop');?><?php _el('name');?>" id="shop_name" name="shop_name" value="<?php echo ucfirst($vendor['shop_name']); ?>">
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('shop');?>&nbsp<?php _el('number');?>:</label>
														<input type="text" class="form-control" placeholder="<?php _el('shop');?><?php _el('number');?>" id="shop_number" name="shop_number" value="<?php echo ucfirst($vendor['shop_number']); ?>">
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('shop');?>&nbsp<?php _el('details');?>:</label>
														<textarea  rows="9" cols="50" class="form-control" placeholder="<?php _el('shop')?><?php _el('details')?>" id="shop_details" name="shop_details"><?php echo ucfirst($vendor['shop_details']); ?></textarea>
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('total');?>&nbsp<?php _el('products');?>:</label>
														<input type="text" class="form-control" placeholder="<?php _el('total');?><?php _el('products');?>" id="total_products" name="total_products" value="<?php echo ucfirst($vendor['total_products']); ?>">
													</div>
										</fieldset>
									</div>
								</div>
<?php
	}

?>
								<div class="row">
			                        <div class="form-group col-md-12">
			                            <div class="pull-right">
			                                <button type="submit" class="btn btn-primary"><i class="icon-checkmark3 position-left"></i><?php _el('save');?></button>
			                                <a href="javascript:window.history.back();" class="btn btn-default"><i class="icon-undo2 position-left"></i><?php _el('back');?></a>
			                            </div>
			                        </div>
			                    </div>
                    			</form>
						    </div>
						    <!-- /Panel body -->
					    </div>
				   </div>
				<!-- /Panel -->
</div>

<!-- /Content area -->

<script type="text/javascript">
$("#vendor_edit_form").validate({
	rules: {
		firstname: {
			required: true,
		},
		lastname: {
			required: true,
		},
		email: {
			required: true,
			email: true,
		},
		mobile: {
			required: true,
            number: true,
            minlength:10,
		},
		address: {
			required: true,
		},
		pincode: {
			required: true,
		},
		city: {
			required: true,
		},
		owner_name: {
			required: true,
		},
		shop_name: {
			required: true,
		},
		shop_number: {
			number: true,
			required: true,
		},
		shop_details: {
			required: true,
		},
		total_products: {
			number: true,
			required: true,
		},

	},
	messages: {
		firstname: {
			 required:"<?php _el('please_enter_', _l('firstname'))?>",
		},
		lastname: {
			required:"<?php _el('please_enter_', _l('lastname'))?>",
		},
		email: {
			required:"<?php _el('please_enter_', _l('email'))?>",
            email:"<?php _el('please_enter_valid_', _l('email'))?>",
		},
		mobile: {
			required:"<?php _el('please_enter_', _l('lastname'))?>",
			number: "plese enter only numbers",
			minlength:"Please enter a valid 10 digit mobile number",
		},
		address: {
			required:"<?php _el('please_enter_', _l('address'))?>",
		},
		pincode: {
			required:"<?php _el('please_enter_', _l('pincode'))?>",
		},
		city: {
			required:"<?php _el('please_enter_', _l('city'))?>",
		},
		owner_name: {
			required:"<?php _el('please_enter_', (_l('owner').' '._l('name')))?>",
		},
		shop_name: {
			required:"<?php _el('please_enter_', (_l('shop').' '._l('name')))?>",
		},
		shop_number: {
			number: "plese enter only numbers",
			required:"<?php _el('please_enter_', (_l('shop').' '._l('number')))?>"

		},
		shop_details: {
			required:"<?php _el('please_enter_', (_l('shop').' '._l('details')))?>",
		},
		total_products: {
			number: "plese enter only numbers",
			required:"<?php _el('please_enter_', (_l('total').' '._l('products')))?>",
		},

	}
});
</script>



