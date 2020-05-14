

function add_wishlist_products(id)
{
	
	$.ajax({
		type:'POST',
		url:SITE_URL+"Wishlist/add_wishlist_products",
		data:{ products_id:id },
		success:function(data){
			// document.getElementById("whishlist-"+id).setAttribute("style","background-color: #f80a6c; border-color: #f80a6c;");
			 // jGrowlAlert('success');
			 // 
			 console.log(data);

			 if(data == "Already Exits")
			 {
			 	jGrowlAlert(remove_wishlist, 'success');
			 	document.getElementById("lnk-wishlist-"+id).setAttribute("style"," ");
			 	document.getElementById("lnk-wishlists-"+id).setAttribute("style","");
			 }

			 if(data == "success")
			 {
			 	jGrowlAlert(add_to_wishlist, 'success');
			 	document.getElementById("lnk-wishlist-"+id).setAttribute("style","background-color: #f80a6c; border-color: #f80a6c;");
			 	document.getElementById("lnk-wishlists-"+id).setAttribute("style","background-color: #f80a6c; border-color: #f80a6c;");

			 }
			
		}

	});
}