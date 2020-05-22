<?php $this->load->view('themes/default/includes/alerts');?>
    <div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>"><?php _el('home');?></a></li>
                <li class='active'><?php _el('edit_profile');?></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
	<div class="col-md-6 col-sm-6 sign-in">
		<h4 class=""><?php _el('edit_profile');?></h4>
    	<p class=""><?php _el('Hello_Welcome_to_your_account');?></p>
        <!--edit user data-->
		<form action="<?php echo base_url('profile/edit') ?>" id="myprofileform" method="POST"  class="register-form outer-top-xs" role="form">

		<div class="form-group">
            <label class="info-title" for="firstname"><?php _el('firstname');?> <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
        </div>
         <div class="form-group">
            <label class="info-title" for="lastname"><?php _el('lastname');?> <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="lastname" name="lastname"  value="<?php echo $user['lastname']; ?>">
        </div>
        <div class="form-group">
            <label class="info-title" for="mobile"><?php _el('mobile_no');?> <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="mobile" name="mobile" value="<?php echo $user['mobile']; ?>" >
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail2"><?php _el('email');?> <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" name="email" value="<?php echo $user['email']; ?>">
        </div>
        <?php

        	if (!empty($user_address))
        	{
        		foreach ($user_address as $user_address)
        		{
        		?>
         <div class="form-group">
            <label class="info-title" for="house_or_village"><?php _el('house_village');?></label>
            <input type="text" class="form-control unicase-form-control text-input" id="house_or_village" name="house_or_village" value="<?php echo $user_address['house_or_village']; ?>">
        </div>
        <div class="form-group">
            <label class="info-title" for="street_or_society"><?php _el('street_society');?></label>
            <input type="text" class="form-control unicase-form-control text-input" id="street_or_society" name="street_or_society" value="<?php echo $user_address['street_or_society']; ?>">
        </div>
         <div class="form-group">
            <label class="info-title" for="landmark"><?php _el('landmark');?></label>
            <input type="text" class="form-control unicase-form-control text-input" id="landmark" name="landmark" value="<?php echo $user_address['landmark']; ?>">
        </div>

        <div class="form-group">
            <label class="info-title" for="state"><?php _el('state');?></label>
             <select class="form-control unicase-form-control text-input" id='state' name='state'>
            <?php

            			if (!empty($user_address['state_id']))
            			{
            			?>
           <option   value='<?php echo $user_address['state_id']; ?>'><?php echo get_state_name($user_address['state_id'], 'name');?></option>
           <?php
           	}
           			else
           			{
           			?>
                <option  selected="selected" value=''>--select state--</option>
            <?php }

            			if (!empty($states))
            			{
            				foreach ($states as $state)
            				{
            				?>

             <option value='<?php echo $state['id'] ?>'><?php echo $state['name'] ?></option>
           <?php }
           			}
           			else
           			{
           			?>
             <option  value=''>State not avalilable</option>
           <?php }

           		?>
            </select>

        </div>
         <div class="form-group">
            <label class="info-title" for="city"><?php _el('city');?></label>

            <select class="form-control unicase-form-control text-input" id='city' name='city'>
            <option  value='<?php echo $user_address['city_id']; ?>' selected="selected"><?php echo get_city_name($user_address['city_id'], 'name');?></option>
            </select>

        </div>

		<div class="form-group">
            <label class="info-title" for="pin_code"><?php _el('pincode');?></label>
            <input type="text" class="form-control unicase-form-control text-input" id="pincode"  name="pincode" value="<?php echo $user_address['pincode']; ?>">
        </div>
        <?php
        	}
        }

        ?>
        <button type="submit" id='save' name="submit" value="Upload Image" class="btn-upper btn btn-success checkout-page-button"><?php _el('update')?></button>

			</form>
		</div>
		<div class="col-md-6 col-sm-6 sign-in">
			<h4 class=""><?php _el('change_password');?></h4>
			<p class="">
				<?php

					if ($user['last_password_change'] != null)
					{
					?>
<?php _el('last_password_change_msg', time_to_words($user['last_password_change']))?>
<?php }

?>
		    </p>

            <!--change password-->
			<form action="<?php echo base_url('profile/edit_password') ?>" id="edit_password_form" method="POST"  class="register-form outer-top-xs" role="form">

			<div class="form-group">
            	<label class="info-title" for="old_password"><?php _el('old_password');?><span>*</span></label>
           		<input type="password" class="form-control unicase-form-control text-input" id="old_password" name="old_password" autocomplete="off" >
        	</div>
			<div class="form-group">
            	<label class="info-title" for="new_password"><?php _el('new_password');?><span>*</span></label>
           		<input type="password" class="form-control unicase-form-control text-input" id="new_password" name="new_password" autocomplete="off" >
       		</div>
        	<div class="form-group">
            	<label class="info-title" for="confirm_password"><?php _el('confirm_password');?><span>*</span></label>
           		<input type="password" class="form-control unicase-form-control text-input" id="confirm_password"  name="confirm_password" autocomplete="off">
        	</div>
         	<button type="submit" id='submit_password' name="submit_password" class="btn-upper btn btn-success checkout-page-button"><?php _el('update')?></button>`

			</form>

			<br><br>
			<!--change profile image-->
			<h4 class=""><?php _el('profile_image');?></h4>
			<p class=""></p>
			<div class="form-group">

            <!--upload user profile image-->
			<form method="post" id="upload_image" class="register-form outer-top-xs"  action="<?php echo base_url('profile/uploads') ?>" enctype="multipart/form-data" role="form" enctype="multipart/form-data">

				<div class="form-group">
                     <?php
                     if (empty($user['profile_image']))
                     {
                     ?>                                      
                        <a data-lightbox="image-1" data-title="Profile" href="<?php echo base_url() ?>assets/uploads/users/default_user.png"><img class="img-responsive"  style="width:100px; height: 100px;" alt="Image" src="<?php echo base_url() ?>assets/uploads/users/1-user.png" data-echo="<?php echo base_url() ?>assets/uploads/users/default_user.png" /></a>
                       <?php
                        }
                        else
                        {
                        ?> 
                        <a data-lightbox="image-1" data-title="Profile" href="<?php echo base_url().$user['profile_image']; ?>">
                                <img class="img-responsive"  style="width:100px; height: 100px;" alt="Image" src="<?php echo base_url().$user['profile_image']; ?>" data-echo="<?php echo base_url().$user['profile_image']; ?>" /></a>    
                        <?php
                        }
                        ?> 
	            <input type="file" class="form-control unicase-form-control text-input" id="profile_image" name="profile_image" size="33" />
	        	</div>
	            <button type="submit" value="Upload Image" class="btn-upper btn btn-success checkout-page-button"><?php _el('update')?></button>

            </form>
        </div>
		</div>

	</div>
</div>

<!-- /Content area -->
</div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/admin/js/core/libraries/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/validation/validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/validation/additional_methods.min.js'); ?>"></script>
<script type="text/javascript">
$("#myprofileform").validate({
    rules:
    {
    	firstname: {
    		required: true,
    	},
    	lastname: {
    		required: true,
    	},
    	mobile: {
            required: true,
            number: true,
            minlength:10
        },
        email: {
            required: true,
            email: true
        },
        house_or_village:{
            required: true,
        },
        street_or_society:{
            required: true,
        },
        landmark:{
            required: true,
        },
        city: {
    		required: true,
    	},
    	state: {
    		required: true,
    	},
    	pincode: {
    		required: true,
    		number: true,
    		maxlength:6
    	},

    },
   	messages:
   	{
    	firstname: {
            required:"<?php _el('please_enter_', _l('firstname'))?>",
		},
        lastname: {
            required:"<?php _el('please_enter_', _l('lastname'))?>",
        },
        mobile: {
            required:"<?php _el('please_enter_', _l('contact_no'))?>",
            mobile:"Please Enter Digits",
            minlength :'Please enter a valid 10 digit mobile number',

	    },
        email: {
         	required:"<?php _el('please_enter_', _l('email'))?>",
            email:"<?php _el('please_enter_valid_', _l('email'))?>"
        },
        house_or_village: {
            required:"<?php _el('please_enter_', _l('house_village'))?>",
		},
		street_or_society: {
            required:"<?php _el('please_enter_', _l('street_society'))?>",
		},
        landmark: {
            required:"<?php _el('please_enter_', _l('landmark'))?>",
        },
		city: {
            required:"<?php _el('please_enter_', _l('city'))?>",
		},
		state: {
            required:"<?php _el('please_enter_', _l('state'))?>",
		},
		pincode: {
            required:"<?php _el('please_enter_', _l('pin_code'))?>",
            pincode:"Please Enter Digits",
            maxlength :'Please enter a valid length',

		},

    }
});

$.validator.addMethod("matcholdpassword", function(value, element)
{
	var old_password = CryptoJS.MD5($(element).val());
	var user_password = "<?php echo $user['password']; ?>";

	if (old_password == user_password)
		return true;

}, "<?php _el('incorrect_password')?>");


$("#edit_password_form").validate({
	rules: {
		old_password: {
			required: true,
			matcholdpassword: true
		},
		new_password: {
			required: true,
			minlength: 8
		},
		confirm_password: {
			required: true,
			equalTo: "#new_password"
		}
	},
	messages: {
		old_password: {
			required:"<?php _el('please_enter_', _l('old_password'))?>",
		},
		new_password: {
			required:"<?php _el('please_enter_', _l('new_password'))?>",
			minlength: "<?php _el('password_min_length_must_be_', 8)?>"
		},
		confirm_password: {
			required:"<?php _el('please_enter_', _l('confirm_password'))?>",
			equalTo: "<?php _el('conf_password_donot_match')?>"
		}
	}
});


$("#upload_image").validate({
	rules: {
		profile_image: {
			required: true,
			extension:"jpeg,png",
		},

	},
	messages: {
		profile_image: {
			required:"<?php _el('please_enter_', _l('profile_image'))?>",
			extension:"<?php _el('please_enter_valid_', _l('profile_image'))?>"
		},

	}
});

 $(document).ready(function(){

    var state_id = $('#state').val();
    if(state_id != null)
    {
        if(state_id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('profile/get_cities'); ?>',
                data: { state_id: state_id },
                 async: false,
                success:function(data){
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.id).text(this.name);
                            $('#city').append(option);
                        });
                    }
                    if(dataObj.length==0)
                    {
                        $('#city').html('<option value="0">city not available</option>');
                    }
                }
            });
        }else{
            $('#city').html('<option value="">--Select state first--</option>');
        }
    }
 /* Populate data to city dropdown */
    $('#state').on('change',function(){
        var state_id = $(this).val();
        if(state_id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('profile/get_cities'); ?>',
                data: { state_id: state_id },
                 async: false,
                success:function(data){
                    $('#city').html('<option value="">--select city--</option>');
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.id).text(this.name);
                            $('#city').append(option);
                        });
                    }
                    if(dataObj.length==0)
                    {
                        $('#city').html('<option value="0">city not available</option>');
                    }
                }
            });
        }else{
            $('#city').html('<option value="">--Select state first--</option>');
        }
    });
});
</script>