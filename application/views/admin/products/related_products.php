<select class="multiselect-filtering" multiple="multiple" name="related_products[]" id="related_products">
<?php
	$related_products = unserialize($product['related_products']);
	array_multisort(array_map(function ($product)
	{
		return $product['name'];
	}, $products), SORT_ASC, $products);

	foreach ($products as $key => $product)
	{
	?>
     <option value="<?php echo $product['id']; ?>"<?php

		if ($related_products)
		{
			foreach ($related_products as $related_product)
			{
				if ($related_product == $product['id'])
				{
					echo ' selected';
				}
			}
		}

	?>
	name="product"><?php echo ucwords($product['name']);
	?></option>
<?php
	}

?>

?>
</select>