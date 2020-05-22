<?php $this->load->view('themes/default/includes/alerts');?>
<style type="text/css">
	 #email-error,#title-error,#name-error,#comments-error{
		color: red;
	}
</style>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?php echo base_url()?>"><?php _el('home')?></a></li>
				<li class='active'><?php _el('contact');?></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
    <div class="contact-page">
		<div class="row">

  <!-- embeded google map location link-->
	<div class="col-md-12 contact-map outer-bottom-vs">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.915235396333!2d72.79061131446984!3d21.195525985908297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1155f8d1fa00e93d%3A0x83e9940da00d2e18!2sNarola%20Infotech!5e0!3m2!1sen!2sin!4v1589103661518!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>

	<!--contact us form -->
	<div class="col-md-9 contact-form">
	<div class="col-md-12 contact-title">
		<h4><?php _el('contact_form');?></h4>
	</div>
	<form class="register-form" role="form" method="post" id="contact_us" action='<?php echo base_url('contact/contact_us');?>'>

	<div class="col-md-4 ">
			<div class="form-group">
		    <label class="info-title" for="name"><?php _el('your_name');?><span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input"  name="name" id="name" placeholder="">
		  </div>
		
	</div>
	<div class="col-md-4">
			<div class="form-group">
		    <label class="info-title" for="email"> <?php _el('email_address');?><span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" name="email" id="email" placeholder="">
		  </div>
	</div>
	<div class="col-md-4">
			<div class="form-group">
		    <label class="info-title" for="title"> <?php _el('title');?><span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" id="title" name="title" placeholder="">
		  </div>
	</div>
	<div class="col-md-12">
			<div class="form-group">
		    <label class="info-title" for="comments"><?php _el('your_comments');?> <span>*</span></label>
		    <textarea class="form-control unicase-form-control" name="comments" id="comments"></textarea>
		  </div>
	</div>
	<div class="col-md-12 outer-bottom-small m-t-20">
		<button type="submit" class="btn-upper btn btn-primary checkout-page-button"><?php _el('send_message');?></button>
	</div>
	</form>
</div>
<div class="col-md-3 contact-info">
	<div class="contact-title">
		<h4><?php _el('information');?></h4>
	</div>
	<div class="clearfix address">
		<a href='<?php echo base_url()?>#map'   title="location" id="marker"><span class="contact-i"><i class="fa fa-map-marker"></i></span></a>
		<span class="contact-span">Regent Square, 104-105, Kalpana Chawla Marg, above D-Mart, Adajan, Surat, Gujarat 395009</span>
	</div>
	<div class="clearfix phone-no">
		<span class="contact-i"><i class="fa fa-mobile"></i></span>
		<span class="contact-span"><a href="tel:+(888) 123-4567">+(888) 123-4567</a><br><a href="tel:+(888) 456-7890">+(888) 456-7890</a></span>
	</div>
	<div class="clearfix email">
		<span class="contact-i"><i class="fa fa-envelope"></i></span>
		<span class="contact-span"><a href="mailto:gcart.team@gmail.com">gcart.team@gmail.com</a></span>
	</div>
</div>			</div><!-- /.contact-page -->

		</div><!-- /.row -->

	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/validation/validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/validation/additional_methods.min.js'); ?>"></script>
<script type="text/javascript">
$("#contact_us").validate({
    rules:
    {
    	name: {
    		required: true,
    	},
    	email: {
            required: true,
            email: true
        },
        title:{
            required: true,
        },
        comments:{
            required: true,
        }        

    },
   	messages:
   	{
    	exampleInputName: {
            required:"<?php _el('please_enter_', _l('name'))?>",
		},
        
        email: {
         	required:"<?php _el('please_enter_', _l('email'))?>",
            email:"<?php _el('please_enter_valid_', _l('email'))?>"
        },
        title: {
            required:"<?php _el('please_enter_', _l('title'))?>",
		},
		Comments: {
            required:"<?php _el('please_enter_', _l('Comments'))?>",
		},
		
    }
});
      
</script>
