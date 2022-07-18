<?php
echo "<div class='row'>";

echo "<div class='col-md-9'>";
echo "<h1>" . $title . "</h1>";

echo "</div>";
echo "<div class='col-md-3'>";
echo '	<a class="nav-link btn btn-success btn-block" href="' . base_url() . 'stocks/create"><span class="text-white">new stock</span></a>';
echo "</div>";

echo "</div>";
echo '<ul class="list-group">';
foreach ($stocks as $stock):

	echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
	echo '<a href="' . site_url() . 'stocks/products/' . $stock['id'] . '" ><span class="text-primary fw-bold">' . $stock['title'] . '</span></a>';

	echo '<span class="">';
	echo '<a href="' . site_url() . 'stocks/edit/' . $stock['id'] . '" ><span class="fa fa-edit"></span></a>';
	echo '<a href="' . site_url() . 'stocks/edit/' . $stock['id'] . '" ><span class=" m-2 fa fa-trash"></span></a>';

	echo'</span>';
	echo '</li>';


endforeach;
echo '</ul>';
