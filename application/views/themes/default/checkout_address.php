
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>"><?php _el('home');?></a></li>
                <li class='active'><?php _el('checkout');?></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div> 
<div class="body-content outer-top-xs">
    <div class="container">
    	<div class="col-md-12">
<?php 
				$this->load->view('themes/default/includes/alerts');
 ?>
		</div>
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="panel panel-default">
				      	<div class="panel-heading"><b><?php _el('personal_info')?></b> <div class="pull-right"><a href="javascript:void(0);" onclick="edit_address();"><i class="fa fa-edit" style="font-size:26px"></i></a>	</div>
				      	</div>
				      	<form id="frmchecout_address" action="<?= site_url('user')?>">
				      		<div class="panel-body">
				      			<div class="row">
				      				<div class="col-md-6">
						      			<div class="form-group">
										    <label class="info-title" for="exampleInputEmail1"><?php _el('name')?> <span>*</span></label>
										    <input type="text" class="form-control unicase-form-control text-input" id="name" disabled="disabled"  value="<?= $users_data['firstname'].' '. $users_data['lastname'];?>">
										</div>
				      				</div>
						      		<div class="col-md-6">
						      			<div class="form-group">
										    <label class="info-title" for="exampleInputEmail1"><?php _el('email_address')?> <span>*</span></label>
										    <input type="email" class="form-control unicase-form-control text-input" id="email" disabled="disabled"  value="<?= $users_data['email'];?>">
										</div>
									</div>
				      			</div>
						      	<div class="row">
						      		<div class="col-md-6">
						      			<div class="form-group">
										    <label class="info-title" for="exampleInputEmail1"><?php _el('house_village')?> <span>*</span></label>
										    <input type="text" class="form-control unicase-form-control text-input" name="home_no" id="home_no" disabled="disabled"  value="<?= 
										     $users_data['house_or_village']; ?>">
										</div>
						      		</div>
						      		<div class="col-md-6">
						      			<div class="form-group">
										    <label class="info-title" for="exampleInputEmail1"><?php _el('street_society')?><span>*</span></label>
										    <input type="text" class="form-control unicase-form-control text-input" name="society_name" id="society_name" disabled="disabled"  placeholder="" value="<?=  $users_data['street_or_society']; ?>">
										</div>
									</div>
						      	</div>
						      	<div class="row">
						      		<div class="col-md-6">
						      			<div class="form-group">
										    <label class="info-title" for="exampleInputEmail1"><?php _el('state')?><span>*</span></label>
										    <input type="text" class="form-control unicase-form-control text-input" name="state" id="state" disabled="disabled"  value="<?= $users_data['state']; ?>">
										</div>
						      		</div>
						      		<div class="col-md-6">
						      			<div class="form-group">
										    <label class="info-title" for="exampleInputEmail1"><?php _el('city')?> <span>*</span></label>
										    <input type="text" class="form-control unicase-form-control text-input" name="city" id="city" disabled="disabled"   value="<?=  $users_data['city'] ?>">
										 </div>
									</div>
						      	</div>
						      	<div class="row">
						      		<div class="col-md-6">
						      			<div class="form-group">
										    <label class="info-title" for="exampleInputEmail1"><?php _el('pincode')?><span>*</span></label>
										    <input type="number" class="form-control unicase-form-control text-input" name="pincode" maxlength="6" minlength="6" id="pincode" disabled="disabled"  value="<?= $users_data['pincode']; ?>">
										</div>
						      		</div>
						      		
						      	</div>
						      	<div class="row">
						      		<div class="col-md-6 col-sm-12">
							      		<div class="col-md-2 col-sm-3 col-lg-3 col-xl-12">
							      			<div class="form-group">
											     <a href="<?= site_url('cart');?>" class="btn-upper btn btn-primary" value="Back" ><?php _el('back')?></a>
											 </div>
										</div>
										<div class="col-md-2 col-sm-3 col-lg-3 col-xl-12 " id="update" style="display: none;">
											 <div class="form-group">
											     <input type="submit"  id="update_address"  class="btn-upper btn btn-primary" value="<?php _el('update')?>" >
											 </div>
										</div>
										<div class="col-md-2 col-sm-3 col-lg-3 col-xl-12" id="cancel" style="display: none;">
											  <div class="form-group">
											      <a href="<?= site_url('user');?>" class="btn-upper btn btn-danger" ><?php _el('cancel')?></a>
											 </div>
										</div>
										<div class="col-md-2 col-sm-3 col-lg-3 col-xl-12">
											 <div class="form-group">
											   <input type="button" name="" id="btn-address" class="btn-upper btn btn-primary" value="<?php _el('continue')?>" onclick="javascript:place_order();">
											</div>
							      		</div>

						      		</div>
						      	</div>
				      		</div>
				      	</form>
				    </div>
				</div>    
            </div><!-- /.shopping-cart -->
        </div> <!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/core/libraries/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/validation/validate.min.js'); ?>"></script>

<script type="text/javascript">
	 
	 /**
	  * [edit USER shipping address description]
	  *
	  */
	 function edit_address()
	 {
	 	$("#update").css('display','block');
	 	$("#cancel").css('display','block');

	 	
	 	document.getElementById("btn-address").disabled = true;
	 	document.getElementById("home_no").disabled = false;
	 	document.getElementById("society_name").disabled = false;
	 	document.getElementById("state").disabled = false;
	 	document.getElementById("city").disabled = false;
	 	document.getElementById("pincode").disabled = false;

	 	
	 }
	 $.validator.addMethod("alphabetsnspace", function(value, element) {
					return this.optional(element) || /^[a-zA-Z][\sa-zA-Z]*/.test(value);
				});
	 $.validator.addMethod("number_alphabetsnspace", function(value, element) {
					return this.optional(element) || /^[0-9a-zA-Z][\sa-zA-Z]*/.test(value);
				});

	 $("#frmchecout_address").validate({
	 		rules:{
	 			home_no:{
	 				required:true,
	 				number_alphabetsnspace:true,
	 				
	 			},
	 			society_name:{
	 				required:true,
	 				alphabetsnspace:true,
	 			},
	 			state:{
	 				required:true,
	 				alphabetsnspace:true,
	 			},
	 			city:{
	 				required:true,
	 				alphabetsnspace:true,
	 			},
	 			pincode:{
	 				required:true,
	 				// alphabetsnspace:true,
	 			},
	 		},
	 		messages:{
	 			home_no:{
	 				required:"<?php _el('please_enter_', _l('house_village'))?>",
	 				number_alphabetsnspace:'<?php _el('not_srat_whitespace')?>',
	 			},
	 			society_name:{
	 				required:"<?php _el('please_enter_', _l('street_society'))?>",
	 				alphabetsnspace:"<?php _el('only_letter_enter')?>",
	 			},
	 			state:{
	 				required:"<?php _el('please_enter_', _l('state'))?>",
	 				alphabetsnspace:"<?php _el('only_letter_enter')?>",
	 			},
	 			city:{
	 				required:"<?php _el('please_enter_', _l('city'))?>",
	 				alphabetsnspace:"<?php _el('only_letter_enter')?>",
	 			},
	 			pincode:{
	 				required:"<?php _el('please_enter_', _l('pincode'))?>",
	 				// alphabetsnspace:"<?php _el('only_letter_enter')?>",
	 			},
	 		},

	 });

	 /**
	  * [place_order description]
	  * 
	  */
	 function place_order()
	 {
	 	window.location = SITE_URL+'Orders/place_order';
	 }
	 

</script>
