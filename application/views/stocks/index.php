<?php
echo "<div class='row'>";

echo "<div class='col-md-9'>";
echo "<h1>" . $title . "</h1>";

echo "</div>";
echo "<div class='col-md-3'>";
echo '	<a class="nav-link btn btn-success btn-block" href="' . base_url() . 'stocks/create"><span class="text-white">new stock</span></a>';
echo "</div>";

echo "</div>";
echo '<div class="list-group">';
foreach ($stocks as $stock):
//	$is_disabled=$stock['status']==0?'inactive':'';
	echo '<li class="list-group-item d-flex justify-content-between align-items-center ">';
	echo '<a  href="' . site_url() . 'stocks/products/' . $stock['id'] . '" ><span class="text-primary fw-bold">' . $stock['title'] . '</span></a>';

//		echo '<span class="text-warning fw-bold">disabled</span>';

	echo '<span class="">';
	echo $stock['status'] == 0 ? '<button type="button" class=" ml-2 mr-2 badge rounded-pill bg-light" title="" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="This stock is unactive." data-bs-original-title="Popover Title">disabled</button>' : '';

	echo '<a href="' . site_url() . 'stocks/edit/' . $stock['id'] . '" ><span class="ml-2 mr-2 fa fa-edit"></span></a>';
	echo form_open('stocks/delete', ['id' => 'DeleteForm'.$stock['id'],'style'=>'display:inline']);
	echo "<input type='hidden' name='stock_id' value='".$stock['id']. "'/>";
	echo '<a href="#" onclick="deleteStock('.$stock['id'].')" ><span class="fa fa-trash"></span></a>';
//	echo '<a href="' . site_url() . 'stocks/delete/' . $stock['id'] . '" ><span class="  fa fa-trash"></span></a>';

	echo form_close();

	echo '</span>';
	echo '</li>';


endforeach;
echo '</div>';
echo "<script>
function deleteStock(id){
  
	 document.getElementById('DeleteForm'+id).submit();
}
</script>";
