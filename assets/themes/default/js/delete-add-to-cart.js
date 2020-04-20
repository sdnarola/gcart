function delete_to_Cart_product(product_id)
{
	$.ajax({
		type:'POST',
		url:SITE_URL+'Cart/delete_cart_product',
		data:{ product_id:product_id },
		dataType:"JSON",
		success:function(data)
		{

			total_row=data.row;
			if(total_row != '')
			{
				var div="<span class='count'>"+total_row+"</span>";
				$(".basket-item-count").html(div);
			}

			total_amount=data.total_amount;
			console.log(total_amount);
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
			}
			
			$('#cart-'+product_id).remove();
		}
	});
}