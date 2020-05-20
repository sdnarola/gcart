<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

?>
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
                        
                        if (!empty($cart_items))
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
                                                $products_qty   = get_product($cart_item['product_id'], 'quantity');
                                                $products_name  = get_product($cart_item['product_id'], 'name');
                                                $products_price = get_product($cart_item['product_id'], 'price');
                                            ?>
                                        <tr id="main_cart-<?php echo $cart_item['id']; ?>" value="<?php echo $cart_item['id']; ?>">
                                            <td class="cart-image" id="cart-image" data-id="<?php echo $cart_item['id']; ?>">
                                                <a class="entry-thumbnail" href="<?php echo base_url().get_product($cart_item['product_id'], 'thumb_image') ?>" target="_blank" >
                                                    <img src="<?php echo base_url().get_product($cart_item['product_id'], 'thumb_image') ?>" alt="">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info text-center">
                                                <h4 class='cart-product-description'><a href=""><?php echo ucwords(get_product($cart_item['product_id'], 'name')); ?></a></h4>
                                            </td>
                                            <td class="cart-product-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc" onclick="increment_quntity(<?php echo  $products_qty .','. $cart_item['id'].',' . $cart_item['product_id'] ;?>);"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc" onclick="decrement_quntity(<?= $cart_item['id'] ?>)"></i></span></div>
                                                    </div>
                                                    <input type="text" name="quantity" id="quantity_<?php echo $cart_item['id']; ?>" data-id="<?php echo $cart_item['id']; ?>" onchange="update_cart_data(this);"  value="<?php echo $cart_item['quantity'] ?>">
            <!-- =============================================== hidden input ===========================================================================-->
                                                    <input type="hidden" name="stock" id="stock_<?php echo $cart_item['id'] ?>" value="<?php echo get_product($cart_item['product_id'], 'quantity'); ?>">
                                                    <input type="hidden" name="products_name" id="products_name_<?php echo $cart_item['id'] ?>" value="<?php echo ucwords(get_product($cart_item['product_id'], 'name')); ?>">
                                                    <input type="hidden" name="products_price" id="products_price_<?php echo $cart_item['id'] ?>" value="<?php echo get_product($cart_item['product_id'], 'price'); ?>">
             <!-- =============================================== hidden input ===========================================================================-->
                                                </div>
                                                 <?php
                                                    if($cart_item['quantity'] > get_product($cart_item['product_id'], 'quantity'))
                                                    {
                                                ?>
                                                 <span id="no-qty-msg" style="display: block;color: red; font-size: 10px;font-weight: bold;"><?php _el('not_available')?></span>
                                                 <?php
                                                     }
                                                 ?>
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
                                                <a data-popup="tooltip" data-placement="top"  title="<?php _el('delete')?>" onclick="delete_to_Cart_product(<?php echo $cart_item['id'] ?>)" href="javascript:void(0);" id="cart_<?php echo $cart_item['id']; ?>">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                       
                                        <?php
                                          
                                            }

                                            ?>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->
<?php
                     if($grand_total != 0)
                    {
?>
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
                                        <p><?php _el('coupone_label');?></p>
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
                                               <button type="button" class="btn btn-primary checkout-btn" onclick="checkcout();"><?php _el('procced_to_checkout');?></button> 
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->
                    <?php }
                    ?>
                </div><!-- /.shopping-cart -->
    <?php
        }
        else
        {
            ?>
            <div class="text-center">
                <div ><b><?php _el('your_car_is_empty')?></b></div>
                <div><p><?php _el('cart_empty_msg')?></p></div>
                <div ><a href="<?= site_url() ."Home"; ?>" class="btn btn-primary"><?php _el('shop_now')?></a></div>
            </div>
            <?php
            
        }

    ?>
        </div> <!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

<script type="text/javascript">

    function checkcout()
    {
        window.location = SITE_URL+'User';
    }

    function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

// /**
//  * Deletes a single record when clicked on delete icon
//  *
//  * @param {int}  id  The identifier shopping-cart-table
//  */
// function delete_record(id)
// {
//     swal({
//         title: "<?php _el('single_deletion_alert');?>",
//         text: "<?php _el('single_recovery_alert');?>",
//         type: "warning",
//         showCancelButton: true,
//         cancelButtonText: "<?php _el('no_cancel_it');?>",
//         confirmButtonText: "<?php _el('yes_i_am_sure');?>",
//         },
//         function ()
//         {
//             $.ajax({
//                 url: BASE_URL + 'cart/delete',
//                 type: 'POST',
//                 data: { cart_id: id },
//                 dataType:"JSON",
//                 success: function (data)
//                 {
//                     if (data.msg == "deleted")
//                     {
//                         console.log(data.cart_data);
//                         swal({
//                             title: "<?php _el('_removed_successfully', _l('product'));?>",
//                             type: "success",
//                         });
//                         $("#cart_" + id).closest("tr").remove();

//                         if(data.cart_data == null)
//                         {
//                              var wishlist_empty_title = "<?php _el('your_car_is_empty')?>";
//                             var wishlist_empty_msg   = "<?php _el('cart_empty_msg')?>";
//                             var url                  = "<?= site_url() ."Home"; ?>";
//                             var shop_now             = "<?php _el('shop_now')?>";

//                             var div="<div class='text-center'><div ><b>"+wishlist_empty_title+"</b></div><div><p >"+wishlist_empty_msg+"</p></div><div ><a href='"+url+"' class='btn btn-primary'>"+shop_now+"</a></div></div>"
//                             $(".shopping-cart").html(div);

//                             document.getElementById("cart-dropdown").setAttribute("data-toggle", "");
//                                 var a=0;
//                                 var span="<span class='sign'>$</span><span class='value'>"+a+"</span> </span>";
//                                 $(".total-price").html(span);
//                                 $(".count").html(0);
//                                 $(".sub-total").text("");
//                         }

                       
//                     }
//                     else
//                     {
//                         swal({
//                             title: "<?php _el('access_denied', _l('product'));?>",
//                             type: "error",
//                         });
//                     }
//                 }
//             });
//         });
// }

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
                console.log(response);
                if (response == 'Invalid')
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
    function update_cart(qty,cart_id,products_name,products_price)
    {
        var id= cart_id;
        // var quantity    = qty;
        var quantity    = parseInt($('#quantity_'+cart_id).val());
        var stock       = parseInt($('#stock_'+id).val());


        if(quantity > stock)
        {
            swal({
                    title: '<?php _el('max_quantity_is')?>  '+stock + ' <?php _el('unit')?>',
                    type: "warning",
                });
        }
        else
        {
            var price       = $('#price_' + cart_id).text();
            var sub_total   = parseFloat(quantity * price).toFixed(2);

               

            $.ajax({
                    url: BASE_URL + 'cart/edit',
                    type: 'POST',
                    data: {
                        id: id,
                        quantity:quantity,
                        total_amount:sub_total
                    },
                    dataType:"JSON",
                    success: function (data)
                    {
                        if (data.msg == 'true')
                        {
                            var qty_msg = '<?php _el('you_change')?> '+products_name+' <?php _el('qty_to') ?> '+ qty;
                            jGrowlAlert(qty_msg, 'success');

                            var sub_total = products_price * quantity;
                            sub_total     = sub_total.toFixed(2);

                            $('#no-qty-msg').css('display', 'none');
                            var sub_total_html = '<i class="fa fa-inr"></i>&nbsp;'+sub_total;
                            var grand_total    = data.grand_total;

                            var span = "<span class='sign'>$</span><span class='value'>"+grand_total+"</span> </span>";

                            $(".total-price").html(span);

                            $(".sub-total .price").text(grand_total);

                            grand_total=formatNumber(grand_total);

                            $("#grand_total").html(grand_total);
                            $("#total_amount_"+cart_id).html(sub_total_html);

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
    
    /**
     * [update_cart_data description]
     */
    function update_cart_data(obj)
    {
        var cart_id        = obj.closest('tr').id;
        cart_id            = cart_id.match(/\d+/);
        var quantity       = parseInt(obj.value);
        var products_name  = $('#products_name_'+cart_id).val();
        var products_price = $('#products_price_'+cart_id).val();
        var stock          = parseInt($('#stock_'+cart_id).val());
        
        if(quantity <= stock)
        {
            cart_id = cart_id.toString();
            update_cart(quantity,cart_id,products_name,products_price);
        }
        else
        {
            document.getElementById('quantity_'+cart_id).value = stock;
            document.getElementById('quantity_'+cart_id).setAttribute("value", stock);
             swal({
                    title: '<?php _el('max_quantity_is')?>  '+stock + ' <?php _el('unit')?>',
                    type: "warning",
                });
        }
        
    }

    var i = 1;
    /**
     * [increment_quntity ]
     * @param  int limit products quantity limit
     * 
     */
    function increment_quntity(limit, cart_id, product_id) 
    {
        var products_name  = $('#products_name_'+cart_id).val();
        var products_price = $('#products_price_'+cart_id).val();
        i= parseInt($('#quantity_'+cart_id).val());
      
        if(i < limit)
        {
             i++;
            document.getElementById('quantity_'+cart_id).value = i;
            document.getElementById('quantity_'+cart_id).setAttribute("value", i);

             update_cart(i,cart_id,products_name,products_price);
        }
        else if (i == limit)
        {
            swal({
                    title: '<?php _el('max_quantity_is')?>  '+limit + ' <?php _el('unit')?>',
                    type: "warning",
                });
        }

      
    }

    /**
     * [decrement_quntity ]
     */
    function decrement_quntity(cart_id)
    {
        i= parseInt($('#quantity_'+cart_id).val());
        var products_name = $('#products_name_'+cart_id).val();
        var products_price = $('#products_price_'+cart_id).val();
        if(i > 1 )
        {
            i--;
            document.getElementById('quantity_'+cart_id).value = i;
            document.getElementById('quantity_'+cart_id).setAttribute("value", i);

              update_cart(i,cart_id,products_name,products_price);
        }
    }
</script>