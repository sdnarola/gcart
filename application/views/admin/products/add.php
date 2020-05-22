<!-- Page header -->
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/tags/tokenfield.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/pages/form_tags_input.js'); ?>"></script>

<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('add_product');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/products'); ?>"><?php _el('products');?></a>
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
                                <strong><?php _el('product');?></strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- /Panel heading -->
                <!-- Panel body -->
                <div class="panel-body">
                    <form action="<?php echo base_url('admin/products/add'); ?>" id="product_form" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('name');?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('name');?>" id="product_name" name="name"  oninput="generate_slug();">
                            </div>

                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('brand');?>:</label>
                                <select class="form-control select-search" name="brand_id" id="brand_id" >
                                    <option value="0" selected readonly disabled >----- Select Brand -----</option>
<?php

	foreach ($brands as $key => $brand)
	{
	?>
    <option value="<?php echo $brand['id']; ?>" name="brand"><?php echo ucwords($brand['name']); ?></option>
<?php
	}

?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('category');?>:</label>
                                <select class="form-control select-search" name="category_id" id="category_id" onchange="get_sub_categories();">
                                    <option value="0" selected readonly disabled>----- Select Category -----</option>
<?php

	foreach ($categories as $key => $category)
	{
	?>
    <option value="<?php echo $category['id']; ?>"><?php echo ucwords($category['name']); ?></option>
<?php
	}

?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('sub_category');?>:</label>
                                <select class="form-control select-search" name="sub_category_id" id="sub_category_id" >
                                    <option value="0" selected readonly disabled >----- Select Sub Category -----</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('price');?>:</label>
                                <input type="number" class="form-control" step="any" placeholder="<?php _el('price');?>" id="price" name="price">
                            </div>
                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('old_price');?>:</label>
                                <input type="number" class="form-control" step="any" placeholder="<?php _el('old_price');?>" id="old_price" name="old_price" value="0">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('sku');?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('sku');?>" id="sku" name="sku" value="<?php echo rand(0000, 9999).'-'.substr(md5(rand(0000, 9999)), 7, 4); ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('quantity');?>:</label>
                                <input type="number" class="form-control" placeholder="<?php _el('quantity');?>" id="quantity" name="quantity">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 ">
                                <small class="req text-danger">* </small>
                                <label><?php _el('slug');?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('slug');?>" id="slug" name="slug" readonly>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-12 ">
                                <small class="req text-danger">* </small>
                                <label><?php _el('thumb_image');?>:</label>
                                <input type="file" name="thumb_image" id="thumb_image" class="form-control">
                            </div>
                        </div>

                        <!-- for multiple images upload -->
                        <div class="row images field_wrapper" style="display: none;">
                            <div class="form-group col-md-12 ">
                                <a href="javascript:void(0);" class="remove_button_1" title="remove Image"><i class="icon-minus-circle2"></i></a>&nbsp;
                                <label><?php _el('image');?>(s):</label>
                                <div class="row add_image">
                                    <div class="col-md-11"><input type="file" name="image[]" class="form-control" ></div>
                                    <div class="col-md-1 text-right"><a href="javascript:void(0);" class="add_button" title="Add Image"><i class="icon-file-plus2 mt-10"></i></a></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <a href="javascript:void(0);" class="btn btn-sm btn-primary set"><i class="icon-file-plus position-left"></i>Set Images</a>
                            </div>
                        </div>
                        <!-- End multiple images upload -->

                         <div class="row">
                            <div class="form-group col-md-12 ">
                                <small class="req text-danger">* </small>
                                <label><?php _el('short_description');?></label>
                                <textarea name="short_description" id="short_description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 ">
                                <small class="req text-danger">* </small>
                                <label><?php _el('long_description');?></label>
                                <textarea name="long_description" id="long_description" class="form-control" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <small class="req text-danger">* </small>
                                <label><?php _el('tags');?></label>
                                <input type="text" class="form-control tokenfield" placeholder="<?php _el('tags');?>" id="tags" name="tags">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <small class="req text-danger">* </small>
                                <label><?php _el('related_products');?></label>
                                <div class="multi-select-full">
                                    <select class="multiselect-filtering" multiple="multiple" name="related_products[]" id="related_products">
<?php
	array_multisort(array_map(function ($product)
	{
		return $product['name'];
	}, $products), SORT_ASC, $products);

	foreach ($products as $key => $product)
	{
	?>
    <option value="<?php echo $product['id']; ?>" name="product"><?php echo ucwords($product['name']); ?></option>
<?php
	}

?>
                                    </select>
                                </div>
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
</div>
<!-- /Content area -->

<script type="text/javascript">
var BASE_URL = "<?php echo base_url(); ?>";

$("#product_form").validate({
    rules: {
        name: {
            required: true,
        },
        brand_id: {
            required: true,
        },
        category_id: {
            required: true,
        },
        thumb_image: {
            required: true,
        },
        short_description: {
            required: true,
        },
        long_description: {
            required: true,
        },
        price: {
            required: true,
        },
        quantity:{
            required: true,
        },
        tags: {
            required: true,
        }
    },
    ignore:sub_category_id,
    messages: {
        name: {
            required:"<?php _el('please_enter_', _l('name'))?>",
        },
        brand_id: {
            required:"<?php _el('please_select_', _l('brand'))?>",
        },
        category_id: {
            required:"<?php _el('please_select_', _l('category'))?>",
        },
        thumb_image: {
            required: "<?php _el('please_select_', _l('image'))?>",
        },
        long_description: {
            required: "<?php _el('please_enter_', _l('description'))?>",
        },
        short_description: {
            required: "<?php _el('please_enter_', _l('description'))?>",
        },
        price: {
            required:"<?php _el('please_enter_', _l('price'))?>",
        },
        quantity:{
            required:  "<?php _el('please_enter_', _l('quantity'))?>",
        },
        tags: {
            required: "<?php _el('please_enter_', _l('tags'))?>",
        }
    },
});


/**
 * enable multiple file uploading
 */
var maxField = 4; //Input fields increment limitation
var addButton = $('.add_button'); //Add button selector
var wrapper = $('.field_wrapper'); //Input field wrapper
var fieldHTML = '<div><div class="col-md-11"><input type="file" name="image[]" class="form-control" ></div><div class="col-md-1 text-right"><a href="javascript:void(0);" title="Remove Image" class="remove_button"><i class="icon-file-minus2 mt-10"></i></a></div></div>'; //New input field html
var x = 1; //Initial field counter is 1

//Once add button is clicked
$(addButton).click(function(){
    //Check maximum number of input fields
    if(x < maxField){
        x++; //Increment field counter
        $('.add_image').append(fieldHTML); //Add field html
    }
});

//Once remove button is clicked
$('.add_image').on('click', '.remove_button', function(e){
    e.preventDefault();
    $(this).parent().parent('div').remove(); //Remove field html
    x--; //Decrement field counter
});

$('.set').on('click', function(){
    $('.images').css({'display':'block'});
});

 //To remove whole images division
$(wrapper).on('click', '.remove_button_1', function(e){
    e.preventDefault();
    $('.images').css({'display':'none'}); //hide div named images
});

//end multiple file uploading

//to get sub categories of parent category
function get_sub_categories()
{
    var id = $( "#category_id option:selected" ).val();
    var category = $( "#category_id option:selected" ).text();
    $( ".sub_category").remove();
    $.ajax({
        type:'post',
        url:BASE_URL+'admin/categories/get_sub_categories/'+id,
        data: { id:id },
        dataType: 'json',
        success:function(response){
            if(response != null)
            {
                var len = response.length;
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $("#sub_category_id").append("<option value='"+id+"' class='sub_category'>"+name.charAt(0).toUpperCase() + name.substr(1).toLowerCase()+"</option>");
                }
            }
            else{
                 $("#sub_category_id").append("<option value='0' class='sub_category' selected>No Sub Category</option>");
            }

        }
    });
}

/**
 *  generate a slug for product
 */
function generate_slug()
{
    var str = document.getElementById('product_name').value;
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
