<!-- Page header -->
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4>
      	<span class="text-semibold"><?php _el('edit_store');?></span>
      </h4>
    </div>
  </div>
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
			<li><a href="<?php echo base_url('vendor/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a></li>
			<li class="active"><?php _el('edit_store');?></li>
		</ul>
  </div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form action="<?php echo base_url('vendor/dashboard/edit_store') ?>" id="mystoreform" method="POST" enctype="multipart/form-data">
				<!-- Panel -->
				<div class="panel panel-flat">
					<!-- Panel heading -->
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10">
							<h5 class="panel-title"><?php echo ucwords($vendor['shop_name']); ?></h5>
							</div>
						</div>
					</div>
					<!-- /Panel heading -->
					<!-- Panel body -->
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="form-group col-md-6">
		                                <small class="req text-danger">* </small>
		                                <label><?php _el('shop_name');?>:</label>
                                		<input type="text" class="form-control" placeholder="<?php _el('shop_name');?>" id="shop_name" name="shop_name" value="<?php echo $vendor['shop_name']; ?>">
		                            </div>
		                            <div class="form-group col-md-6">
		                                <small class="req text-danger">* </small>
		                                <label><?php _el('owner_name');?>:</label>
                                		<input type="text" class="form-control" placeholder="<?php _el('owner_name');?>" id="owner_name" name="owner_name" value="<?php echo $vendor['owner_name']; ?>">
		                            </div>
		                        </div>
		                        <div class="row">
		                            <div class="form-group col-md-12">
		                                <small class="req text-danger">* </small>
		                                <label><?php _el('address');?>:</label>
		                                <textarea name="address" id="address" class="form-control" rows="3"><?php echo $vendor['address']; ?></textarea>
		                            </div>
		                        </div>
		                        <div class="row">
									<div class="form-group col-md-6">
		                                <small class="req text-danger">* </small>
		                                <label><?php _el('state');?>:</label>
		                                <select class="form-control select-search" name="state_id" id="state_id" onchange="get_cities()" >
		                                    <option value="0"readonly disabled >----- Select state -----</option>
		<?php

			foreach ($states as $state)
			{
			?>
		    								<option value="<?php echo $state['id']; ?>"
<?php

		if ($vendor['state_id'] == $state['id'])
		{
			echo ' selected';}

	?>

	 name="state">
	<?php echo ucwords($state['name']); ?>

										</option>
		<?php
			}

		?>
		                                </select>
		                            </div>

		                            <div class="form-group col-md-6">
		                                <small class="req text-danger">* </small>
		                                <label><?php _el('city');?>:</label>
		                                <select class="form-control select-search" id='city_id' name='city_id'>
								        </select>
		                            </div>
		                        </div>
		                        <div class="row">
		                        	<div class="form-group col-md-6">
		                                <small class="req text-danger">* </small>
		                                <label><?php _el('pincode');?>:</label>
                                		<input type="text" class="form-control" placeholder="<?php _el('pincode');?>" id="pincode" name="pincode" value="<?php echo $vendor['pincode']; ?>">
		                            </div>
		                            <div class="form-group col-md-6">
		                                <small class="req text-danger">* </small>
		                                <label><?php _el('country');?>:</label>
                                		<input type="text" class="form-control" placeholder="<?php _el('country');?>" id="country" name="country" value="India" readonly>
		                            </div>
		                        </div>
		                        <div class="row">
									<div class="form-group col-md-6">
		                                <small class="req text-danger">* </small>
		                                <label><?php _el('shop_number');?>:</label>
                                		<input type="text" class="form-control" placeholder="<?php _el('shop_number');?>" id="shop_number" name="shop_number" value="<?php echo $vendor['shop_number']; ?>">
		                            </div>
		                            <div class="form-group col-md-6">
		                                <label><?php _el('registration_number');?>&nbsp;(Optional):</label>
                                		<input type="text" class="form-control" placeholder="<?php _el('registration_number');?>" id="registration_number" name="registration_number" value="<?php echo $vendor['registration_number']; ?>">
		                            </div>
		                        </div>
								<div class="row">
		                            <div class="form-group col-md-12 ">
		                                <small class="req text-danger">* </small>
		                                <label><?php _el('logo');?>:</label><br>
<?php

	if ($vendor['logo'] != null)
	{
	?>
		                                <div class="col-md-3">
			                                <div class="thumbnail">
			                                    <img src="<?php echo base_url().$vendor['logo']; ?>">
			                                </div>
		                                </div>
<?php
	}

?>
		                                <input type="file" name="logo" id="logo" class="form-control">
		                            </div>
		                        </div>
		                        <div class="row">
		                            <div class="form-group col-md-12">
		                                <small class="req text-danger">* </small>
		                                <label><?php _el('shop_details');?></label>
		                                <textarea name="shop_details" id="shop_details" class="form-control" rows="5"><?php echo $vendor['shop_details']; ?></textarea>
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
							</div>
						</div>
					</div>
					<!-- /Panel body -->
				</div>
				<!-- /Panel -->
			</form>
		</div>
	</div>
</div>
<!-- /Content area -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<script type="text/javascript">

$("#mystoreform").validate(
{
    rules:
    {
    	shop_name: {
    		required: true,
    	},
    	owner_name: {
    		required: true,
    	},
    	address: {
            required: true,
        },
        pincode: {
            required: true,
            digits: true,
            rangelength: [6,6]
        },
        city: {
        	required: true,
        },
        shop_number: {
        	required: true,
        	digits: true
        },
        registration_number: {
        	digits: true
        },
        shop_details:{
    		required: true,
    	}
    },
   	messages:
   	{
    	shop_name: {
            required:"<?php _el('please_enter_', _l('shop_name'))?>",
		},
        owner_name: {
            required:"<?php _el('please_enter_', _l('owner_name'))?>",
        },
        address: {
         	required:"<?php _el('please_enter_', _l('address'))?>"
        },
        pincode: {
        	rangelength:"<?php _el('pincode_length_must_be_', 6)?>",
            required:"<?php _el('please_enter_', _l('pincode'))?>",
           	digits:"<?php _el('please_enter_', _l('digits'))?>"
	    },
        city: {
        	required: "<?php _el('please_enter_', _l('city'))?>"
        },
        shop_number: {
        	required: "<?php _el('please_enter_', _l('shop_number'))?>",
        	digits: "<?php _el('please_enter_', _l('digits'))?>"
        },
        registration_number: {
        	digits: "<?php _el('please_enter_', _l('digits'))?>"
        },
        shop_details:{
    		required:"<?php _el('please_enter_', _l('shop_details'))?>",
    	}
    }
});


function get_cities()
{
    var state_id = $('#state_id').val();
    var city_id = "<?php echo $vendor['city_id']; ?>";
    if(state_id){
        $.ajax({
            type:'POST',
            url:'<?php echo base_url('user/get_cities'); ?>',
            data: { state_id: state_id },
             async: false,
            success:function(data){
            	$('#city_id').empty();
                var dataObj = jQuery.parseJSON(data);
                if(dataObj){
                    $(dataObj).each(function(){
                        var option = $('<option />');
                        if(city_id == this.id)
                        {
                        	option.attr('value', this.id).attr('selected','selected').text(this.name);
                        	$('#city_id').append(option);
                        }
                        else
                        {
                        	option.attr('value', this.id).text(this.name);
                        	$('#city_id').append(option);
                        }
                    });
                }
                if(dataObj.length==0)
                {
                    $('#city_id').html('<option value="0">city not available</option>');
                }
            }
        });
    }else{
        $('#city_id').html('<option value="">--Select state first--</option>');
    }
}
get_cities();

</script>