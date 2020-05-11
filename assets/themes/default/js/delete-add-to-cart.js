function delete_to_Cart_product(cart_id)
{

        swal({
        title: title,
        text: text,
        type: "warning",
        showCancelButton: true,
        cancelButtonText: cancelButtonText,
        confirmButtonText: confirmButtonText,
        },
        function ()
        {
			$.ajax({
				type:'POST',
				url:SITE_URL+'Cart/delete_cart_product',
				data:{ cart_id:cart_id },
				dataType:"JSON",
				success:function(data)
				{
					var total_row=data.row;
					

					if(total_row != '')
					{
						var div="<span class='count'>"+total_row+"</span>";
						$(".basket-item-count").html(div);
					}

					var total_amount=data.total_amount;
				
					if(total_amount != null)
					{
						var span="<span class='sign'>$</span><span class='value'>"+total_amount+"</span> </span>";
						$(".total-price").html(span);
						$(".sub-total .price").text(total_amount);
					}
					else
					{
						document.getElementById("cart-dropdown").setAttribute("data-toggle", "");
						var a=0;
						var span="<span class='sign'>$</span><span class='value'>"+a+"</span> </span>";
						$(".total-price").html(span);
						$(".sub-total").text("");



                            var div="<div class='text-center'><div ><b>"+cart_empty_title+"</b></div><div><p >"+cart_empty_msg+"</p></div><div ><a href='"+url+"' class='btn btn-primary'>"+shop_now+"</a></div></div>"
                            $(".shopping-cart").html(div);
					}

					$('#cart-'+cart_id).remove();
					$("#main_cart-"+cart_id).remove();
				}
			});
		});
}