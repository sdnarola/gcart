

function add_wishlist_products(id)
{
	
	$.ajax({
		type:'POST',
		url:SITE_URL+"Wishlist/add_wishlist_products",
		data:{ products_id:id },
		success:function(data){

			 if(data == "Already Exits")
			 {
			 	jGrowlAlert(remove_wishlist, 'success');
			 	
			 	document.getElementById("lnk-wishlist-"+id).classList.remove("inwishlist");
			 	document.getElementById("lnk-wishlists-"+id).classList.remove("inwishlist");
			 	
			 }

			 if(data == "success")
			 {
			 	jGrowlAlert(add_to_wishlist, 'success');
			 
			 	document.getElementById("lnk-wishlist-"+id).classList.add("inwishlist");
			 	document.getElementById("lnk-wishlists-"+id).classList.add("inwishlist");
			 }
			
		}

	});
}