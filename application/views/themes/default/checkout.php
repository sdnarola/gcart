
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?= site_url() ."Home"; ?>"><?php _el('home'); ?></a></li>
				<li class='active'><?php _el('checkout')?></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="col-md-12 col-sm-6">
<?php $this->load->view('themes/default/includes/alerts');
    ?>
</div>
<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<div class="panel panel-default checkout-step-01">
							<div class="panel-heading">
						    	<h4 class="unicase-checkout-title">
							        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
							          <span>1</span><?php _el('checkout_method')?>
							        </a>
							     </h4>
					    	</div>
    <!-- panel-heading -->
							<div id="collapseOne" class="panel-collapse collapse in">
		<!-- panel-body  -->
	   							<div class="panel-body">
									<div class="row">	
				<!-- guest-login -->			
										<div class="col-md-6 col-sm-6 guest-login">
											<h4 class="checkout-subtitle"><?php _el('register_login')?></h4>
											<p class="text title-tag-line"><?php _el('register_convenience')?></p>

											<a class="btn-upper btn btn-primary checkout-page-button checkout-continue " href="<?= site_url('Authentication/signup');?>"><?php _el('signup')?></a>
										</div>
				<!-- guest-login -->
				<!-- already-registered-login -->
										<div class="col-md-6 col-sm-6 already-registered-login">
											<h4 class="checkout-subtitle"><?php _el('already_registered')?></h4>
											<p class="text title-tag-line"><?php _el('please_log_below')?></p>
											<form id="checkout_login_form" method="POST" action="<?= site_url('Authentication/checkout_login')?>" class="register-form"  >
												<div class="form-group">
													<label class="info-title" for="exampleInputEmail1"><?php _el('email_address')?> <span>*</span></label>
													<input type="email" class="form-control unicase-form-control text-input" name="email" id="email" placeholder="">
												</div>
												<div class="form-group">
													<label class="info-title" for="exampleInputPassword1"><?php _el('password')?> <span>*</span></label>
													<input type="password" name="password" id="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
													<a href="<?= site_url('Authentication/forgot_password');?>" class="forgot-password"><?php _el('forgot_password')?></a>
												</div>
												<button type="submit" class="btn-upper btn btn-primary checkout-page-button"><?php _el('login')?></button>
											</form>
										</div>	
				<!-- already-registered-login -->
									</div>			
								</div>
		<!-- panel-body  -->
							</div><!-- row -->
						</div>
<!-- checkout-step-01  -->
					    <!-- checkout-step-02  -->
					  	<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
								<h4 class="unicase-checkout-title">
									<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
										<span>2</span>Billing Information
									</a>
								</h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
						    </div>
					  	</div>
					  	<!-- checkout-step-02  -->
						<!-- checkout-step-03  -->
					  	<div class="panel panel-default checkout-step-03">
						    <div class="panel-heading">
								<h4 class="unicase-checkout-title">
									<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
										<span>3</span>Shipping Information
									</a>
								</h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse">
								<div class="panel-body">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
						    </div>
					  	</div>
					  	<!-- checkout-step-03  -->

						<!-- checkout-step-04  -->
					    <div class="panel panel-default checkout-step-04">
						    <div class="panel-heading">
								<h4 class="unicase-checkout-title">
									<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
										<span>4</span>Shipping Method
									</a>
								</h4>
						    </div>
						    <div id="collapseFour" class="panel-collapse collapse">
							    <div class="panel-body">
							     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							    </div>
					    	</div>
						</div>
						<!-- checkout-step-04  -->

						<!-- checkout-step-05  -->
					  	<div class="panel panel-default checkout-step-05">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
						        	<span>5</span>Payment Information
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFive" class="panel-collapse collapse">
						      <div class="panel-body">
						       Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						      </div>
						    </div>
					    </div>
					    <!-- checkout-step-05  -->

						<!-- checkout-step-06  -->
					  	<div class="panel panel-default checkout-step-06">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseSix">
						        	<span>6</span>Order Review
						        </a>
						      </h4>
						    </div>
					    	<div id="collapseSix" class="panel-collapse collapse">
					      		<div class="panel-body">
					        		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					      		</div>
					    	</div>
					  	</div>
					  	<!-- checkout-step-06  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<!-- <div class="col-md-4"> -->
					<!-- checkout-progress-sidebar -->
					<!-- <div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
							    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
							    </div>
							    <div class="">
									<ul class="nav nav-checkout-progress list-unstyled">
										<li><a href="#">Billing Address</a></li>
										<li><a href="#">Shipping Address</a></li>
										<li><a href="#">Shipping Method</a></li>
										<li><a href="#">Payment Method</a></li>
									</ul>		
								</div>
							</div>
						</div> -->
					<!-- </div>  -->
<!-- checkout-progress-sidebar -->				
				</div>
			</div><!-- /.row -->
		</div>
	</div>
</div>


<script type="text/javascript">

	$("#checkout_login_form").validate({
		rules:{
			email:{
            	required: true,
                email: true,
            },
            password: {
            required: true,
            minlength: 8
        },

		},
		messages:{
			email: {
                required:"<?php _el('please_enter_', _l('email'))?>",
                email:"<?php _el('please_enter_valid_', _l('email'))?>"
            },
            password: {
            required:"<?php _el('please_enter_', _l('password'))?>",
            minlength: "<?php _el('password_min_length_must_be_', 8)?>",
        },

		}
	});
</script>
