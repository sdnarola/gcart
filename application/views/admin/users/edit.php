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
	if ($users) 
	{
		$user = $users[0];		
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
								<form action="<?php echo base_url('admin/users/edit/') . $user['users_id']; ?>" id="profileform" name="profileform" method="POST">							
<?php
$image_name = basename($user['profile_image']);
?>									
									<div>
										<div class="form-group">
											 <p align="center"><img src="<?php echo base_url() . 'assets/uploads/users/' . $image_name; ?>" alt="<?php _el('img_alt_msg')?>" height="208" width="226" border="10"></img></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('firstname');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('firstname');?>" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
										</div>
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('lastname');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('lastname');?>" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
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
											<input type="text" class="form-control" placeholder="<?php _el('address1');?>" id="address1" name="address1" value="<?php echo $user['address_1']; ?>" readonly>
										</div>							
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('address2');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('address2');?>" id="address2" name="address2" value="<?php echo $user['address_2']; ?>" readonly>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('pincode');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('pincode');?>" id="pincode" name="pincode" value="<?php echo $user['pincode']; ?>" readonly>
										</div>
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('city');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('city');?>" id="city" name="city" value="<?php echo $user['city']; ?>" readonly>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('state');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('state');?>" id="state" name="state" value="<?php echo $user['state']; ?>" readonly>
										</div>
<?php
		$readonly = '';
?>
										<div class="col-md-6 form-group">
											<label><?php _el('status');?>:</label>
											<input type="checkbox" class="switchery" name="is_active" id="<?php echo $user['users_id']; ?>" <?php if ($user['is_active'] == 1) {echo "checked";}?>  <?php echo $readonly; ?>>
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
            rangelength:[10,10],
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
			required:"<?php _el('please_enter_', _l('mobile_no'))?>",
			number: "<?php _el('only_digits')?>",
			rangelength:"<?php _el('only_10_digits')?>",
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



