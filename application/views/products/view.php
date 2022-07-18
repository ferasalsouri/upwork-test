<?php


echo "<h1 >" . $title . "</h1>";
echo "<div class='product-date' ><small >" . $product['created_at'] . "</small> in <strong>" . $product['name'] . "</strong></div>";
echo "<br>";
echo $product['description'];
echo form_open('products/delete/' . $product['id'], ['class' => 'mt-3']);

echo "<input class='btn btn-danger btn-block' type='submit' value='delete'/>";
echo "<a href='" . site_url('products/edit/' . $product['slug']) . "' class=' btn btn-warning btn-block'>edit</a>";
echo "</form >";


