<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('edit_banner'); ?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard'); ?></a>
            </li>
            <li class="active"><?php _el('home_page'); ?></li>
            <li>
                <a href="<?php echo base_url('admin/banners'); ?>"><?php _el('banners');?></a>
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
                                <strong><?php _el('banner'); ?></strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                     <form action="<?php echo base_url('admin/banners/edit/'). $banner['id']; ?>" id="banners_form" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="form-group">
                                <small class="req text-danger">* </small>
                                <label><?php _el('title'); ?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('title'); ?>" id="title" name="title" value="<?php echo $banner['title'] ?>">
                            </div>
                             <div class="form-group">
                                <small class="req text-danger">* </small>
                                <label><?php _el('sub_title'); ?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('sub_title'); ?>" id="sub_title" name="sub_title" value="<?php echo $banner['sub_title'] ?>">
                            </div>  
                            <div class="form-group">                             
                                <div>
                                    <small class="req text-danger">* </small>
                                    <label><?php _el('description'); ?>:</label>
                                </div>
                                <textarea id="description" name="description" rows="5" class="form-control" placeholder="<?php _el('description');?>"><?php echo $banner['description']?></textarea>
                            </div>
<?php 
$banner_image = basename($banner['banner']);
?>
                            <div class="form-group">
                                <label><?php _el('image'); ?>:</label>
                                <div>
                                <image name="image1" id='image1' src="<?php echo base_url('assets/uploads/banners/').$banner_image ?>" width="400" height="200">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file"  class="file-input"  name="banner" id='banner' data-show-caption="false" data-show-upload="false">
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
$('.select-search').select2();

$("#banners_form").validate({
    rules: {
        title: {
            required: true,
        },
         sub_title: {
            required: true,
        },
        description: {
            required: true,
        },
    },
    messages: {
        title: {
            required:"<?php _el('please_enter_', _l('title')) ?>"
        },
        sub_title: {
            required:"<?php _el('please_enter_', _l('sub_title')) ?>"
        },
         description: {
            required:"<?php _el('please_enter_', _l('description')) ?>"
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
