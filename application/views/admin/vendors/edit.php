<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4>
				<span class="text-semibold"><?php _el('edit');?> <?php _el('vendor');?></span>
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
											<legend class="text-semibold"><i class="icon-reading position-left"></i><?php _el('vendor_details')?></legend>
<?php
		$image_name = basename($vendor['profile_image']);
?>
											<div class="form-group">
												<label><?php _el('profile');?>&nbsp<?php _el('image');?>:</label>
										         <div>
													<img src="<?php echo base_url().'assets/Uploads/vendors/profile/'.$image_name; ?>" alt="<?php _el('img_alt_msg')?>" height="226" width="226" border="2"></img>
												</div>
											</div>
											<div class="form-group">
												<small class="req text-danger">* </small>
												<label><?php _el('firstname');?>:</label>
												<input type="text" class="form-control" placeholder="<?php _el('firstname');?>" id="firstname" name="firstname" value="<?php echo $vendor['firstname']; ?>">
											</div>
											<div class="form-group">
												<small class="req text-danger">* </small>
												<label><?php _el('lastname');?>:</label>
												<input type="text" class="form-control" placeholder="<?php _el('lastname');?>" id="lastname" name="lastname" value="<?php echo $vendor['lastname']; ?>">
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
<?php
	$readonly = '';
?>
											<div class="form-group">
											<label><?php _el('status');?>:</label>
											<input type="checkbox" class="switchery" name="is_active" id="<?php echo $vendor['id']; ?>"<?php
												if ($vendor['is_active'] == 1)
												{
													echo 'checked';
												}
											?><?php echo $readonly; ?>>
											</div>										
										</fieldset>
									</div>
									<div class="col-md-6">
										<fieldset>
							                <legend class="text-semibold"><i class="icon-store position-left"></i><?php _el('shop_details')?></legend>
<?php
	$image_name = basename($vendor['logo']);
?>
													<div class="form-group">
														<label><?php _el('shop');?>&nbsp<?php _el('logo');?>:</label>	                <div>
															<img src="<?php echo base_url().'assets/Uploads/vendors/logo/'.$image_name; ?>" alt="<?php _el('img_alt_msg')?>" alt="<?php _el('img_alt_msg')?>" height="226" width="226" border="10"></img>
														</div>
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('owner_name');?>:</label>
														<input type="text" class="form-control" placeholder="<?php _el('owner_name');?>" id="owner_name" name="owner_name" value="<?php echo $vendor['owner_name']; ?>">
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('shop');?>&nbsp<?php _el('name');?>:</label>
														<input type="text" class="form-control" placeholder="<?php _el('shop');?><?php _el('name');?>" id="shop_name" name="shop_name" value="<?php echo $vendor['shop_name']; ?>">
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('shop');?>&nbsp<?php _el('number');?>:</label>
														<input type="text" class="form-control" placeholder="<?php _el('shop');?><?php _el('number');?>" id="shop_number" name="shop_number" value="<?php echo $vendor['shop_number']; ?>">
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('shop');?>&nbsp<?php _el('details');?>:</label>
														<textarea  rows="3" cols="30" class="form-control" placeholder="<?php _el('shop')?><?php _el('details')?>" id="shop_details" name="shop_details"><?php echo $vendor['shop_details']; ?></textarea>
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('total');?>&nbsp<?php _el('products');?>:</label>
														<input type="text" class="form-control" placeholder="<?php _el('total');?><?php _el('products');?>" id="total_products" name="total_products" value="<?php echo $vendor['total_products']; ?>">
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
							                            <label><?php _el('state') ?></label>
							                            <select class="select-search" name="state_id" id="state_id" onchange="get_cities();">
							                                <option value="0" selected readonly disabled>----- Select State -----</option>
<?php
				foreach ($states as $state)
				{
?>
					                                    <option id="<?php echo $state['id'] ?>" name="state['name']" value="<?php echo $state['id']; ?>"
					                                    <?php
					                                    		if ($state['id'] == $vendor['state_id'])
					                                    		{ echo ' selected';}?>>
					                                    <?php echo ucfirst($state['name']) ?>
					                                    </option>
<?php
				}
?>
			                               				</select>
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
						                                <label><?php _el('city');?>:</label>
						                                <select class="form-control select-search" name="city_id" id="city_id" >
						                                    <option  value='<?php echo $vendor['city_id'];?>' selected="selected"readonly disabled><?php echo  get_city_name($vendor['city_id'],'name');?></option>
						                                </select>
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('address');?>:</label>
														<input type="text" class="form-control" placeholder="<?php _el('address');?>" id="address" name="address" value="<?php echo $vendor['address']; ?>">
													</div>
													<div class="form-group">
														<small class="req text-danger">* </small>
														<label><?php _el('pincode');?>:</label>
														<input type="text" class="form-control" placeholder="<?php _el('pincode');?>" id="pincode" name="pincode" value="<?php echo $vendor['pincode']; ?>">
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
            rangelength:[10,10],
		},
		address: {
			required: true,
		},
		pincode: {
			required: true,
		},
		state_id: {
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
			required:"<?php _el('please_enter_', _l('mobile_no'))?>",
			number: "<?php _el('only_digits')?>",
			rangelength:"<?php _el('only_10_digits') ?>",
		},
		address: {
			required:"<?php _el('please_enter_', _l('address'))?>",
		},
		pincode: {
			required:"<?php _el('please_enter_', _l('pincode'))?>",
		},
		state_id: {
			required:"<?php _el('please_enter_', _l('state'))?>",
		},
		owner_name: {
			required:"<?php _el('please_enter_', (_l('owner').' '._l('name')))?>",
		},
		shop_name: {
			required:"<?php _el('please_enter_', (_l('shop').' '._l('name')))?>",
		},
		shop_number: {
			number: "<?php _el('only_digits')?>",
			required:"<?php _el('please_enter_', (_l('shop').' '._l('number')))?>"

		},
		shop_details: {
			required:"<?php _el('please_enter_', (_l('shop').' '._l('details')))?>",
		},
		total_products: {
			number: "<?php _el('only_digits')?>",
			required:"<?php _el('please_enter_', (_l('total').' '._l('products')))?>",
		},

	}
});

var BASE_URL = "<?php echo base_url(); ?>";
/**
 * Gets the cities name from state id
 */
function get_cities()
{
    var id = $( "#state_id option:selected" ).val(); //get value of state
    var state = $( "#state_id option:selected" ).text(); //get text of state
    var city_id = '<?php echo $vendor['city_id']; ?>'; //user city id
    $( ".city" ).remove();
    $.ajax({
        type:'post',
        url:BASE_URL+'admin/users/get_cities_by_state_id/'+id,
        data: { id:id },
        dataType: 'json',
        success:function(response){
            if(response != null)
            {
                var len = response.length;
                for( var i = 0; i<len; i++ )
                {
                    var id = response[i]['id']; //id of sub category
                    var name = response[i]['name']; //name of sub category
                    var select = ( id == city_id )?'selected':'';
                    $("#city_id").append("<option value='"+id+"' "+select+" class='city'>"+name.charAt(0).toUpperCase() + name.substr(1).toLowerCase()+"</option>");
                }
            }
            else
            {
                $("#city_id").append("<option value='' class='city'>No city</option>");
            }

        }
    });
}
</script>



