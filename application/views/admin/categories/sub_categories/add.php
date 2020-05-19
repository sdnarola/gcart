<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('add_sub_category');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/sub_categories'); ?>"><?php _el('sub_categories');?></a>
            </li>
            <li class="active"><?php _el('add');?></li>
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
                                <strong><?php _el('sub_category');?></strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                      <form action="<?php echo base_url('admin/sub_categories/add'); ?>" id="categories_form" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="form-group">
                              <small class="req text-danger">* </small>
                              <label><?php _el('category_name') ?></label>
                              <select class="select-search" name="category_name" id="category_name">
                                <option value="0" selected readonly disabled >----- Select Category -----</option>
<?php
    $categories = get_all_categories();

    foreach ($categories as $category)
    {
?>
                                    <option id="category" name="category" value="<?php echo $category['name'] ?>"><?php echo ucfirst($category['name']) ?></option>
<?php
    }
?>
                                </select>
                            </div>
                            <div class="form-group">
                                <small class="req text-danger">* </small>
                                <label><?php _el('name');?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('name');?>" id="name" name="name" oninput="generate_slug();">
                            </div>
                            <div class="form-group">
                                <small class="req text-danger">* </small>
                                <label><?php _el('slug');?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('slug');?>" id="slug" name="slug">
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
//for deop-down search
$('.select-search').select2();

$("#categories_form").validate({
    rules: {
        name: {
            required: true,
        },
        slug:{
            required: true,
        },
        category_name:{
            required: true,   
        }
    },
    messages: {
        name: {
            required:"<?php _el('please_enter_', _l('name'))?>"
        },
        slug:{
            required:"<?php _el('please_enter_', _l('slug'))?>"
        },
        category_name:{
            required:"<?php _el('please_select_', _l('category'))?>"
        },
    }
});

/**
 *  generate a slug from caegory_name
 */
function generate_slug()
{
    var str = document.getElementById('name').value;
    var slug = '';
    var trimmed = $.trim(str);
    slug = trimmed.replace(/[^a-z0-9&-]/gi, '-').
    replace(/[&]/g,'and').
    replace(/-+/g, '-').
    replace(/^-|-$/g, '');

    var slug = slug.toLowerCase();
    document.getElementById("slug").value = slug;
}
</script>
