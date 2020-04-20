// jQuery(document).ready(function() {
// jQuery(function () {

	function add_to_cart(id)
	{
		var total_row;
		var cart_Product_data;
		var total_amount;
		var product_data = new Array();
		var quantity=$("#procuct-quantity").val();

		$.ajax({

			type:'POSt',
			url:SITE_URL+"Cart/add_cart_product/",
			data:{ product_id:id,quantity:quantity },
			dataType:"JSON",
			success:function(data){
				console.log(data.wishlist_data);

				document.getElementById("cart-dropdown").setAttribute("data-toggle", "dropdown");
				total_row=data.row;
				if(total_row != '')
				{
					var div="<span class='count'>"+total_row+"</span>";
					$(".basket-item-count").html(div);
				}
				total_amount=data.total_amount;
				if(total_amount != '')
				{
					document.getElementById("cart-dropdown").setAttribute("data-toggle", "dropdown");
					var span="<span class='sign'>$</span><span class='value'>"+total_amount+"</span> </span>";
					$(".total-price").html(span);

					$(".sub-total .price").text(total_amount);
				}
				
				cart_Product_data=data.Product_data;
				console.log(cart_Product_data);
				
				if(cart_Product_data != '')
				{

					cart_Product_data.forEach(data=>{

						var image=BASE_URL+data.thumb_image;

						product_data.push("<div id='cart-"+data.id+"' class='row'><div class='col-xs-4'> <div class='image'><a href='<?php echo base_url(); ?>detail.html'><img src='"+image+"' alt='' /a></div></div><div class='col-xs-7'> <h3 class='name'><a href='<?php echo base_url(); ?>index.php?page-detail'>"+data.name+"</a></h3><div class='price'>"+data.total_amount+"</div></div><div class='col-xs-1 action'> <a href='javascript:void(0);'id='delete_cart_product'><i class='fa fa-trash' onclick='delete_to_Cart_product("+data.id+")'></i></a> </div></div>");
					});

					$("li .product-summary").html(product_data);
				}
				$('#wishlistdata-'+id).remove();
			}
		});
	}

	
