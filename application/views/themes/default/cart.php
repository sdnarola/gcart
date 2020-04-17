<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>"><?php _el('home');?></a></li>
                <li class='active'><?php _el('shopping_cart');?></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <?php
                    	$grand_total = 0;

                    	if ($cart_items)
                    	{
                    	?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="20%"><?php _el('image');?></th>
                                        <th width="20%"><?php _el('product_name');?></th>
                                        <th width="15%"><?php _el('quantity');?></th>
                                        <th width="20%"><?php _el('price');?></th>
                                        <th width="20"><?php _el('sub_total');?></th>
                                        <th width="5%"><?php _el('actions');?></th>
                                    </tr>
                                </thead><!-- /thead -->

                                <tbody>
                                    <?php

                                    		foreach ($cart_items as $cart_item)
                                    		{
                                    		?>
                                        <tr id="<?php echo $cart_item['id']; ?>">
                                            <td class="cart-image">
                                                <a class="entry-thumbnail" href="<?php echo base_url().get_product($cart_item['product_id'], 'thumb_image') ?>" target="_blank" >
                                                    <img src="<?php echo base_url().get_product($cart_item['product_id'], 'thumb_image') ?>" alt="">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info text-center">
                                                <h4 class='cart-product-description'><a href="detail.html"><?php echo ucwords(get_product($cart_item['product_id'], 'name')); ?></a></h4>
                                            </td>
                                            <td class="cart-product-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="text" name="quantity" id="quantity_<?php echo $cart_item['id']; ?>" onchange="update_cart(this);" value="<?php echo $cart_item['quantity'] ?>">
                                                    <input type="hidden" name="stock" id="stock_<?php echo $cart_item['id'] ?>" value="<?php echo get_product($cart_item['product_id'], 'quantity'); ?>">
                                                </div>
                                            </td>
                                            <td class="cart-product-sub-total">
                                                <span class="cart-sub-total-price" id="price_<?php echo $cart_item['id'] ?>">
                                                    <i class="fa fa-inr"></i>&nbsp;<?php echo get_product($cart_item['product_id'], 'price'); ?>
                                                </span>
                                            </td>
                                            <td class="cart-product-grand-total" >
                                                <span class="cart-grand-total-price" id="total_amount_<?php echo $cart_item['id'] ?>">
                                                    <i class="fa fa-inr"></i>&nbsp;<?php echo $cart_item['total_amount']; ?>
                                                </span>
                                            </td>
                                            <td class="romove-item">
                                                <a data-popup="tooltip" data-placement="top"  title="<?php _el('delete')?>"  href="javascript:delete_record(<?php echo $cart_item['id']; ?>);" id="cart_<?php echo $cart_item['id']; ?>">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                            <?php $grand_total = $grand_total + (get_product($cart_item['product_id'], 'price')) * ($cart_item['quantity']);?>
                                        </tr>
                                        <?php
                                        	}

                                        	?>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->
                    <div class="col-md-6 col-sm-12 estimate-ship-tax">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title"><?php _el('discount_code');?></span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>Enter your coupon code if you have one..</p>
                                        <div class="form-group">
                                            <input type="text" name="coupon" id="coupon" class="form-control unicase-form-control text-input" placeholder="Your Coupon..">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary" onclick="apply_coupon(<?php echo $grand_total; ?>);"><?php _el('apply');?></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-6 col-sm-12 cart-shopping-total" style="background-color: white;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="background-color: white;" id="discount_td">
                                        <div class="cart-grand-total">
                                            <?php _el('grand_total');?>
                                            <span class="inner-left-md"><i class="fa fa-inr"></i>.&nbsp;
                                            <span id="grand_total"><?php echo number_format(round((float) $grand_total, 2), 2); ?></span></span>
                                        </div>
                                    </th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <button type="submit" class="btn btn-primary checkout-btn"><?php _el('checkout');?></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->
                </div><!-- /.shopping-cart -->
    <?php
    	}
    	else
    	{
    		echo '<center>Your Cart Is Empty !</center>';
    	}

    ?>
        </div> <!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

<script type="text/javascript">
var BASE_URL = "<?php echo base_url(); ?>";

/**
 * Deletes a single record when clicked on delete icon
 *
 * @param {int}  id  The identifier
 */
function delete_record(id)
{
    swal({
        title: "<?php _el('single_deletion_alert');?>",
        text: "<?php _el('single_recovery_alert');?>",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "<?php _el('no_cancel_it');?>",
        confirmButtonText: "<?php _el('yes_i_am_sure');?>",
        },
        function ()
        {
            $.ajax({
                url: BASE_URL + 'cart/delete',
                type: 'POST',
                data: {
                    cart_id: id
                },
                success: function (msg)
                {
                    if (msg == "true")
                    {
                        swal({
                            title: "<?php _el('_removed_successfully', _l('product'));?>",
                            type: "success",
                        });
                        $("#cart_" + id).closest("tr").remove();
                    }
                    else
                    {
                        swal({
                            title: "<?php _el('access_denied', _l('product'));?>",
                            type: "error",
                        });
                    }
                }
            });
        });
}

/**
 * Apply coupon on order amount.
 */
function apply_coupon(grand_total)
{
    var code = $('#coupon').val();

    $.ajax({
        url: BASE_URL + 'cart/apply_coupon',
        type: 'POST',
        data: {
            coupon: code
        },
        dataType: 'json',
        success: function (response)
        {
            if (response == null)
            {
                swal({
                title:code + ' Is an Invalid Coupon Code',
                type: "error",
            });
            }
            else
            {
                if (response['type'] == 1)
                {
                    var discount = parseFloat(grand_total * (response['amount'] / 100)).toFixed(2);
                    var total = parseFloat(grand_total - discount).toFixed(2);
                }
                else
                {
                    var discount = parseFloat(response ['amount']).toFixed(2);
                    var total = parseFloat(grand_total - response['amount']).toFixed(2);
                }
                $('#discount_td').empty().append('<div class="cart-grand-total"><?php _el('grand_total');?><span class="inner-left-md"><i class="fa fa-inr"></i>. <span id="grand_total">' + parseFloat(grand_total).toFixed(2) + '</span></span></div>'+
                    '<div class="cart-grand-total"><?php _el('discount');?><span class="inner-left-md"><span>-&nbsp;</span><i class="fa fa-inr"></i>. <span id="grand_total">' + discount + '</span></span></div><hr>'+
                    '<div class="cart-discount"><div class="cart-grand-total"><?php _el('total_amount');?><span class="inner-left-md"><i class="fa fa-inr"></i>. <span id="grand_total">' + total + '</span></span></div>');

                // add hidden field for total amount.
                $('#discount_td').append('<input type="hidden" name="grand_total" value="' + total + '"/>');
            }
        }
    });
}

/**
 *  Check stock and update quantity and amount of cart items.
 */
function update_cart(obj)
{
    var id          = obj.closest('tr').id;
    var quantity    = parseInt(obj.value);
    var stock       = parseInt($('#stock_'+id).val());

    if(quantity > stock)
    {
        swal({
                title: 'Max Quantity Is '+stock,
                type: "warning",
            });
    }
    else
    {
        var price       = $('#price_' + id).text();
        var sub_total   = parseFloat(quantity * price).toFixed(2);

        $.ajax({
                url: BASE_URL + 'cart/edit',
                type: 'POST',
                data: {
                    id: id,
                    quantity:quantity,
                    total_amount:sub_total
                },
                success: function (msg)
                {
                    if (msg=='true')
                    {
                        swal({
                            title: "<?php _el('_updated_successfully', _l('cart'));?>",
                            showCloseButton: true,
                            type: "success",
                            },function(){ location.reload(); });
                    }
                    else
                    {
                        swal({
                            title: "<?php _el('access_denied', _l('product'));?>",
                            type: "error",
                        });
                    }
                }
            });
    }
}
</script>