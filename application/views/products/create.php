<h1><?= $title ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('products/create'); ?>


<div class="form-group">
	<label for="exampleInputEmail1">Product Title</label>
	<input type="text" class="form-control" name="title">
	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>
<div class="form-group">
	<label for="exampleInputPassword1">Product Description</label>
	<textarea class="form-control" name="description" rows="6">

	</textarea>
</div>
<div class="form-group">
	<label>select stocks</label>
	<select name="stock_id" class="form-control">

		<?php foreach ($stocks as $stock): ?>

			<option value="<?php echo $stock['id'] ?>"><?php echo $stock['title'] ?></option>
		<?php endforeach; ?>
	</select>

</div>
<div class="form-group">
	<label>upload image</label>
	<input type="file"  class="form-control" name="userfile" accept="image/png, image/gif, image/jpeg, image/jpg">

</div>
<div class="form-group mt-3">
	<button type="submit" class="btn btn-success">Submit</button>
	<a class="btn btn-default" href="<?= base_url('products') ?>">cancel</a>
</div>

</form>
