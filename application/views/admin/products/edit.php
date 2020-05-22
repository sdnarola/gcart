<!-- Page header -->
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/tags/tokenfield.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/pages/form_tags_input.js'); ?>"></script>

<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('edit_product');?></span>
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
            <li class="active"><?php _el('edit');?></li>
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
                    <form action="<?php echo base_url('admin/products/edit/').$product['id']; ?>" id="product_form" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('name');?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('name');?>" id="name" name="name" value="<?php echo $product['name']; ?>">
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
    <option value="<?php echo $brand['id']; ?>" name="brand"<?php

		if ($brand['id'] == $product['brand_id'])
		{
			echo ' selected';}

	?>><?php echo ucwords($brand['name']); ?></option>
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
                                <select class="form-control select-search" name="category_id" id="category_id" onchange ="get_sub_categories();">
                                    <option value="0" selected readonly disabled>----- Select Category -----</option>
<?php

	foreach ($categories as $key => $category)
	{
	?>
    <option value="<?php echo $category['id']; ?>"<?php

		if ($category['id'] == $product['category_id'])
		{
			echo ' selected';}

	?>><?php echo ucwords($category['name']); ?></option>
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
                                <input type="number" class="form-control" step="any" placeholder="<?php _el('price');?>" id="price" name="price" value="<?php echo $product['price']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('old_price');?>:</label>
                                <input type="number" class="form-control" step="any" placeholder="<?php _el('old_price');?>" id="old_price" name="old_price" value="<?php echo $product['old_price']; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('sku');?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('sku');?>" id="sku" name="sku" value="<?php echo $product['sku']; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <small class="req text-danger">* </small>
                                <label><?php _el('quantity');?>:</label>
                                <input type="number" class="form-control" placeholder="<?php _el('quantity');?>" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 ">
                                <small class="req text-danger">* </small>
                                <label><?php _el('slug');?>:</label>
                                <input type="text" class="form-control" placeholder="<?php _el('slug');?>" id="slug" value="<?php echo $product['slug']; ?>" name="slug" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 ">
                                <small class="req text-danger">* </small>
                                <label><?php _el('thumb_image');?>:</label><br>
                                <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="<?php echo base_url().$product['thumb_image']; ?>">
                                </div>
                                </div>
                                <input type="file" name="thumb_image" id="thumb_image" class="form-control">
                            </div>
                        </div>

                        <!-- multiple images upload -->
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
                            <div class="form-group col-md-12">
                                <small class="req text-danger">* </small>
                                <label><?php _el('short_description');?></label>
                                <textarea name="short_description" id="short_description" class="form-control" rows="3"><?php echo $product['short_description']; ?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <small class="req text-danger">* </small>
                                <label><?php _el('long_description');?></label>
                                <textarea name="long_description" id="long_description" class="form-control" rows="5"><?php echo $product['long_description']; ?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <small class="req text-danger">* </small>
                                <label><?php _el('tags');?></label>
                                <input type="text" class="form-control tokenfield" placeholder="<?php _el('tags');?>" id="tags" name="tags"value="<?php echo $product['tags']; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <small class="req text-danger">* </small>
                                <label><?php _el('related_products');?></label>
                                <div class="multi-select-full">
                                    <?php echo $related_products; ?>
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
    ignore:{sub_category_id,thumb_image},
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
    var id = $( "#category_id option:selected" ).val(); //get value of selected category
    var category = $( "#category_id option:selected" ).text(); //get text of selected category
    var sub_category_id = '<?php echo $product['sub_category_id']; ?>'; //product's sub category id
    $( ".sub_category" ).remove();
    $.ajax({
        type:'post',
        url:BASE_URL+'admin/categories/get_sub_categories/'+id,
        data: { id:id },
        dataType: 'json',
        success:function(response){
            if(response != null)
            {
                var len = response.length;
                for( var i = 0; i<len; i++ )
                {
                    var id = response[i]['id']; //id of sub category
                    var name = response[i]['name']; //name of sub category
                    var select = ( id == sub_category_id )?'selected':'';
                    $("#sub_category_id").append("<option value='"+id+"' "+select+" class='sub_category'>"+name.charAt(0).toUpperCase() + name.substr(1).toLowerCase()+"</option>");
                }
            }
            else
            {
                 $("#sub_category_id").append("<option value='0' class='sub_category' selected>No Sub Category</option>");
            }

        }
    });
}

//to get selected sub category of parent category
get_sub_categories();

</script>

