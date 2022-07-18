<?php
echo "<div class='row'>";

echo "<div class='col-md-9'>";
echo "<h1>" . $title . "</h1>";

echo "</div>";
echo "<div class='col-md-3'>";
echo '	<a class="nav-link btn btn-success btn-block" href="'. base_url() .'products/create"><span class="text-white">new product</span></a>';
echo "</div>";

echo "</div>";
foreach ($products as $product):
	echo "<div class='row'>";
	echo "<div class='col-md-3'>";
	echo "<img class='product-image img-thumbnail' src='" . site_url() . 'assets/images/products/' . $product['image'] . "'/>";
	echo "</div>";
	echo "<div class='col-md-9'>";
	echo "<h1 >" . $product['title'] . "</h1>";
	echo "<div class='product-date' ><small >" . $product['created_at'] . "</small> in <strong>" . $product['name'] . "</strong></div>";
	echo "<br>";
	echo word_limiter($product['description'], 50);
	echo "<br>";
	echo "<br>";
	echo "<a class='btn btn-primary' href='" . site_url('products/' . $product['slug']) . "'>read more</a>";
	echo "<br>";
	echo "<br>";
	echo "</div>";
	echo "</div>";

endforeach;
