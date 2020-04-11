<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('edit_partner'); ?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard'); ?></a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/brands'); ?>"><?php _el('partners');?></a>
            </li>
            <li class="active"><?php _el('edit'); ?></li>
        </ul>
    </div>
</div>
<!-- /Page header -->
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
                                <strong><?php _el('partner'); ?></strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                     <form action="<?php echo base_url('admin/brands/edit/'). $brand['id']; ?>" id="brands_form" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="form-group">
                                <small class="req text-danger">* </small>
                                <label><?php _el('name'); ?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('name'); ?>" id="name" name="name" value="<?php echo $brand['name']?>" oninput="generate_slug()">
                            </div>
<?php 
$logo_name = basename($brand['logo']);
?>

                            <div class="form-group">
                                <label><?php _el('logo'); ?>:</label>
                                <image name="logo1" id='logo1' src="<?php echo base_url('assets/uploads/brands/').$logo_name ?>" width="400" height="200">
                            </div>
                            <div class="form-group">
                                <input type="file"  class="file-input"  name="logo" id='logo' data-show-caption="false" data-show-upload="false">
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
<!-- /Content area -->

<script type="text/javascript">
$("#brands_form").validate({
    rules: {
        name: {
            required: true,
        }
    },
    messages: {
        name: {
            required:"<?php _el('please_enter_', _l('name')) ?>"
        },
    }
});

////for file input field
$('.file-input').fileinput({
        browseLabel: 'Browse',
        browseIcon: '<i class="icon-file-plus"></i>',
        removeIcon: '<i class="icon-cross3"></i>',
        layoutTemplates: {
            icon: '<i class="icon-file-check"></i>',
            main1: "{preview}\n" +
            "<div class='input-group {class}'>\n" +
            "   <div class='input-group-btn'>\n" +
            "       {browse}\n" +
            "   </div>\n" +
            "   {caption}\n" +
            "   <div class='input-group-btn'>\n" +
            "       {remove}\n" +
            "   </div>\n" +
            "</div>"
        },
        initialCaption: "choose file",
    });         
</script>
