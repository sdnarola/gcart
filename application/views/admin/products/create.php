<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4>
				<span class="text-semibold"><?php _el('add_product'); ?></span>
			</h4>
		</div>
	</div>
	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard'); ?></a>
			</li>
			<li>
				<a href="<?php echo base_url('admin/products'); ?>"><?php _el('products'); ?></a>
			</li>
			<li class="active"><?php _el('add'); ?></li>
		</ul>
	</div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
	
<form method="post" action="<?=base_url('admin/products/uploads')?>" enctype="multipart/form-data">
                <input type="file" id="profile_image" name="profile_image" size="33" />
                <input type="submit" value="Upload Image" />
</form>


	<form action="<?php echo base_url('admin/products/add'); ?>" id="projectform" method="POST">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<!-- Panel -->
				<div class="panel panel-flat">
					<!-- Panel heading -->
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10">
								<h5 class="panel-title">
									<strong><?php _el('product'); ?></strong>
								</h5>
							</div>
						</div>
					</div>
					<!-- /Panel heading -->
					<!-- Panel body -->
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<small class="req text-danger">*</small>
									<label><?php _el('product_name'); ?>:</label>
									<input type="text" class="form-control" placeholder="<?php _el('product_name'); ?>" id="name" name="name">
								</div>
								<div class="form-group">
									<small class="req text-danger">*</small>
								    <label><?php _el('select_file'); ?>:</label>
									<input type="file" class="form-control"  id="upload_file" name="upload_file" size="20">
								</div>
								 <div class="form-group">
									<label><?php _el('description'); ?>:</label>
									<!--<input type="text" class="form-control" placeholder="<?php _el('description'); ?>" id="details" name="details"> -->
									<textarea class="form-control summernote" rows="10" placeholder="<?php _el('description'); ?>" id="description" name="description"></textarea>
									<div id="validation_msg"></div>

								</div>
							</div>
						</div>
					</div>	
					<!-- /Panel body -->
				</div>
				<!-- /Panel -->
			</div>
		</div>
		<div class="btn-bottom-toolbar text-right btn-toolbar-container-out">
		<button type="submit" class="btn btn-success" name="submit"><?php _el('save'); ?></button>
		<a class="btn btn-default" onclick="window.history.back();"><?php _el('back'); ?></a>
		</div>
	</form>
</div>
<!-- /Content area -->
<script type="text/javascript">

$('.summernote').summernote({
        height: 200
});

$('#projectform').on('submit', function() {
    if($('.summernote').summernote('isEmpty'))
    {
    	$("#validation_msg").html("<p style='color:red'><?php _el('please_enter_', _l('product_description')) ?></p>");
    	return false;
    }
    return true;
});

$("#projectform").validate({
	rules: {
		name:
		{
			required: true,
		},	
		upload_file:
		{
			required: true,
			accept: 'jpg|png'
		}
		
	},
	messages: {
		name: 
		{
			required:"<?php _el('please_enter_', _l('product_name')) ?>",
		},
		upload_file: 
		{
			required:"<?php _el(_l('select_file')) ?>",
			accept : "select onlu JPG?PNG file"

		}

	} 
});  
</script>

