<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4>
				<span class="text-semibold"><?php _el('edit_user');?></span>
			</h4>
		</div>
	</div>
	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
			</li>
			<li>
				<a href="<?php echo base_url('admin/users'); ?>"><?php _el('users');?></a>
			</li>
			<li class="active"><?php _el('edit');?></li>
		</ul>
	</div>
</div>
<!-- Page header -->
<!-- Content area -->
<div class="content">
<?php

	if ($user)
	{
	?>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<!-- Panel -->
						<div class="panel panel-flat">
							<!-- Panel heading -->
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-10">
										<h5 class="panel-title">
											<strong><?php _el('user');?></strong>
										</h5>
									</div>
								</div>
							</div>
							<!-- /Panel heading -->
							<!-- Panel body -->
							<div class="panel-body">
								<form action="<?php echo base_url('admin/users/edit/').$user['id']; ?>" id="profileform" name="profileform" method="POST">

<?php

		if ($user['profile_image'] == null)
		{
			$user['profile_image'] = 'assets/uploads/users/default_img.png';
		}

		$address = get_user_address($user['id']);
	?>
									<div>
										<div class="form-group">
											 <p align="center"><img src="<?php echo base_url().$user['profile_image']; ?>" alt="<?php _el('img_alt_msg')?>" height="208" width="226" border="10"></img></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('firstname');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('firstname');?>" id="firstname" name="firstname" value="<?php echo ucfirst($user['firstname']); ?>">
										</div>
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('lastname');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('lastname');?>" id="lastname" name="lastname" value="<?php echo ucfirst($user['lastname']); ?>">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('email');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('email');?>" id="email" name="email" class="email"value="<?php echo $user['email']; ?>">
										</div>
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('mobile_no');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('mobile_no');?>" id="mobile" name="mobile" value="<?php echo $user['mobile']; ?>">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('address1');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('address1');?>" id="address1" name="address1" value="<?php echo ucfirst($address['address_1']); ?>" readonly>
										</div>
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('address2');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('address2');?>" id="address2" name="address2" value="<?php echo ucfirst($address['address_2']); ?>" readonly>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('pincode');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('pincode');?>" id="pincode" name="pincode" value="<?php echo $address['pincode']; ?>" readonly>
										</div>
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('city');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('city');?>" id="city" name="city" value="<?php echo ucfirst($address['city']); ?>" readonly>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('state');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('state');?>" id="state" name="state" value="<?php echo ucfirst($address['state']); ?>" readonly>
										</div>
<?php
	$readonly = '';

		if ($user['id'] == get_loggedin_user_id())
		{
			$readonly = ' readonly';
		}

	?>
										<div class="col-md-6 form-group">
											<label><?php _el('status');?>:</label>

											<input type="checkbox" class="switchery" name="is_active" id="<?php echo $user['id']; ?>"<?php

		if ($user['is_active'] == 1)
		{
			echo 'checked';}

	?><?php echo $readonly; ?>>
										</div>
<?php
	}

?>
									</div>
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
				<!-- /Panel -->
					</div>
				</div>
</div>

<!-- /Content area -->

<script type="text/javascript">

$("#profileform").validate({
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
		address1: {
			required: true,
		},
		address2: {
			required: true,
		},
		pincode: {
			required: true,
		},
		city: {
			required: true,
		},
		state: {
			required: true
		}
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
		address1: {
			required:"<?php _el('please_enter_', _l('address1'))?>",
		},
		address2: {
			required:"<?php _el('please_enter_', _l('address2'))?>",
		},
		pincode: {
			required:"<?php _el('please_enter_', _l('pincode'))?>",
		},
		city: {
			required:"<?php _el('please_enter_', _l('city'))?>",
		},
		state: {
			required:"<?php _el('please_enter_', _l('state'))?>",
		},
	}
});
</script>



