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
									<div>
										<div class="form-group">
											 <p align="center"><img src="<?php echo base_url().$user['profile_image'] ?>" alt="<?php _el('img_alt_msg')?>" height="208" width="226" border="10"></img></p>
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
											<label><?php _el('house_village');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('house_village');?>" id="house_village" name="house_village" value="<?php echo $address['house_or_village']; ?>">
										</div>
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('street_society');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('street_society');?>" id="street_society" name="street_society" value="<?php echo $address['street_or_society']; ?>" >
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('landmark');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('landmark');?>" id="landmark" name="landmark" value="<?php echo $address['landmark']; ?>" >
										</div>
										<div class="col-md-6 form-group">
											<small class="req text-danger">* </small>
											<label><?php _el('pincode');?>:</label>
											<input type="text" class="form-control" placeholder="<?php _el('pincode');?>" id="pincode" name="pincode" value="<?php echo $address['pincode']; ?>" >
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 form-group">
			                              <small class="req text-danger">* </small>
			                              <label><?php _el('state')?></label>
			                              <select class="select-search" name="state" id="state" onchange="get_cities();">
			                                <option value="0" selected readonly disabled>----- Select State -----</option>
<?php

	foreach ($states as $state)
	{
	?>
			                                    <option id="<?php echo $state['id'] ?>" name="state['name']" value="<?php echo $state['id']; ?>"
			                                    <?php

			                                    		if ($state['id'] == $address['state_id'])
			                                    		{
			                                    			echo ' selected';}

			                                    	?>>
			                                    <?php echo ucfirst($state['name']) ?>
			                                    </option>
<?php
	}

	$city = get_city_name($address['city_id'], 'name');
?>
			                               </select>
                            			</div>
										<div class="form-group col-md-6">
		                                <small class="req text-danger">* </small>
		                                <label><?php _el('city');?>:</label>
		                                <select class="form-control select-search" name="city" id="city" >
		                                    <option  value='<?php echo $address['city_id']; ?>' selected="selected" readonly><?php echo $city ?></option>
		                                </select>
                            			</div>
                            		</div>
                            		<div class="row">
<?php
	$readonly = '';
?>
										<div class="col-md-6 form-group">
											<label><?php _el('status');?>:</label>
											<input type="checkbox" class="switchery" name="is_active" id="<?php echo $user['id']; ?>"<?php

	if ($user['is_active'] == 1)
	{
		echo 'checked';}

?><?php echo $readonly; ?>>
										</div>
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
		house_village: {
			required: true,
		},
		street_society: {
			required: true,
		},
		pincode: {
			required: true,
			number: true,
			rangelength:[6,6],
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
		house_village: {
			required:"<?php _el('please_enter_', _l('house_village'))?>",
		},
		street_society: {
			required:"<?php _el('please_enter_', _l('street_society'))?>",
		},
		pincode: {
			required:"<?php _el('please_enter_', _l('pincode'))?>",
			number: "<?php _el('only_digits')?>",
			rangelength:"<?php _el('only_6_digits')?>",
		},
		state: {
			required:"<?php _el('please_enter_', _l('state'))?>",
		},
	}
});

var BASE_URL = "<?php echo base_url(); ?>";
/**
 * Gets the cities name from state id
 */
function get_cities()
{
    var id = $( "#state option:selected" ).val(); //get value of state
    var state = $( "#state option:selected" ).text(); //get text of state
    var city_id = '<?php echo $address['city_id']; ?>'; //user city id
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
                    var select = ( id == city )?'selected':'';
                    $("#city").append("<option value='"+id+"' "+select+" class='city'>"+name.charAt(0).toUpperCase() + name.substr(1).toLowerCase()+"</option>");
                }
            }
            else
            {
                $("#city").append("<option value='' class='city'>No city</option>");
            }

        }
    });
}
</script>



