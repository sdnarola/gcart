

function add_wishlist_products(id)
{
	$.ajax({
		type:'POST',
		url:SITE_URL+"Wishlist/add_wishlist_products",
		data:{ products_id:id },
		success:function(data){
			// document.getElementById("whishlist-"+id).setAttribute("style","background-color: #f80a6c; border-color: #f80a6c;");
			document.getElementById("lnk-wishlist-"+id).setAttribute("style","background-color: #f80a6c; border-color: #f80a6c;");
		}

	});
}