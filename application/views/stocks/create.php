<h1><?= $title ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('stocks/create'); ?>


<div class="form-group">
	<label >Stock name</label>
	<input type="text" class="form-control" name="title">
</div>
<div class="form-check form-switch">
	<input class="form-check-input" name="active_stock" type="checkbox" id="flexSwitchCheckChecked" checked>
	<label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
</div>
<div class="form-group mt-3">
	<button type="submit" class="btn btn-success">Submit</button>
	<a class="btn btn-default" href="<?= base_url('stocks') ?>">cancel</a>
</div>


</form>
