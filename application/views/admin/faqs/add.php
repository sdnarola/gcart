<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('add_faq'); ?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard'); ?></a>
            </li>
             <li>
                <a href="<?php echo base_url('admin/faqs'); ?>"><?php _el('faq');?></a>
            </li>
            <li class="active"><?php _el('add'); ?></li>
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
                                <strong><?php _el('faq'); ?></strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                    <form action="<?php echo base_url('admin/faqs/add'); ?>" id="faq_form" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="form-group">
                                <small class="req text-danger">* </small>
                                <label><?php _el('title'); ?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('title'); ?>" id="title" name="title">
                            </div>                          
                            <div class="form-group">
                                <small class="req text-danger">* </small>
                                <label><?php _el('description'); ?>:</label>
                                <textarea name="details"  id="details" cols="18" rows="18" class="wysihtml5 wysihtml5-min form-control" placeholder="Enter text ..."> </textarea>
                                <label id="details-error" class="validation-error-label" for="details"></label>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary" name="save" id="save"><i class="icon-checkmark3 position-left"></i><?php _el('save');?></button>
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
//to add the editor in answer field
$('.wysihtml5-min').wysihtml5({
        parserRules:  wysihtml5ParserRules
    });

$("#faq_form").validate({
    rules: {
        title: {
            required: true,
        },
       details: {
            required: true,
        }
    },
    messages: {
        title: {
            required:"<?php _el('please_enter_', _l('title')) ?>"
        },
        details: {
            required:"<?php _el('please_enter_', _l('details')) ?>"
        },
    }
});

</script>
