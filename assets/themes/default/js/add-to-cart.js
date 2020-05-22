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
			url:SITE_URL+"Cart/add_cart_product",
			data:{ product_id:id,quantity:quantity },
			dataType:"JSON",
			success:function(data){
				
				if(data.msg == 'success')
				{
					jGrowlAlert(add_to_cart_success, 'success');
					
				}
				if(data.msg == 'updated success')
				{
					jGrowlAlert(update_qty, 'info');
				}

				if(data.msg == 'quantity not available')
				{
					jGrowlAlert(qty_not_available, 'danger');
				}
				
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
					var span="<span class='sign'>"+rupees+"</span><span class='value'>"+total_amount+"</span> </span>";
					$(".total-price").html(span);

					var sub_total_html='<span class="sign">'+rupees+'</span>'+total_amount+'';
					$(".sub-total .price").html(sub_total_html);
				}
				
				cart_Product_data=data.Product_data;
				
				
				if(cart_Product_data != '')
				{
					
					cart_Product_data.forEach(data=>{

						var image=BASE_URL+data.thumb_image;
						var product_detail_url= SITE_URL+'Products/'+data.slug;

						product_data.push("<div id='cart-"+data.cart_id+"' class='row'><div class='col-xs-4'> <div class='image'><a href='"+product_detail_url+"'><img src='"+image+"' alt='' /a></div></div><div class='col-xs-7'> <h3 class='name'><a href='"+product_detail_url+"'>"+data.name+"</a></h3><div class='price'><span class='sign'>"+rupees+"</span>"+data.total_amount+"</div></div><div class='col-xs-1 action'> <a href='javascript:void(0);'id='delete_cart_product'><i class='fa fa-trash' onclick='delete_to_Cart_product("+data.cart_id+")'></i></a> </div></div>");
					});

					$("li .product-summary").html(product_data);
				}
				
			}
		});
	}

	
