<?= 'Count Active Products' ?>


<div class="row">

	<div class="four col-md-4">
		<div class="counter-box">
			<i class="fa  fa-shopping-cart"></i>
			<span class="counter"><?php echo $count_active_products ?></span>
			<p>Available Products</p>
		</div>
	</div>
	<div class="four col-md-4">
		<div class="counter-box">
			<i class="fa  fa-users"></i>
			<span class="counter"><?php echo $count_active_verified_users_active_products ?></span>
			<p>active verify Users & active products </p>
		</div>
	</div>
	<div class="four col-md-4">
		<div class="counter-box">
			<i class="fa  fa-users"></i>
			<span class="counter"><?php echo $count_active_verified_users->active_verfied_user ?></span>
			<p>active & verify Users </p>
		</div>
	</div>
	<div class="four col-md-4">
		<div class="counter-box">
			<i class="fa  fa-shopping-cart"></i>
			<span class="counter"><?php echo $products_not_belong_to_any_users->products_not_belong_to_any_users ?></span>
			<p>Available Products not belong to any users</p>
		</div>
	</div>
	<div class="four col-md-4">
		<div class="counter-box">
			<i class="fa  fa-shopping-cart"></i>
			<span class="counter"><?php echo $amount_products->amount_products ?></span>
			<p>3.5 amount active products</p>
		</div>
	</div>
	<div class="four col-md-4">
		<div class="counter-box">
			<i class="fa  fa-shopping-cart"></i>
			<span class="counter"><?php echo $summarized_price_active_product[0]->total_price ?></span>
			<p>3.6 price of all active products</p>
		</div>
	</div>


</div>
<div class="row">
	<div class="col-md-9">

		<p>
			<strong>3.7. Summarized prices of all active products per user. For example - John Summer - 85$, Lennon
				Green -
				107$.</strong>
		</p>
		<table class="table table-responsive">

			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Summarized prices</th>

			</tr>
			</thead>
			<tbody>
			<?php $id = 1; ?>
			<?php foreach ($fetch_active_products_users as $result): ?>
				<tr>
					<th scope="row"><?= $id++ ?></th>
					<td><?= $result['name'] ?></td>
					<td>$ <?= ($result['price'] * $result['quantity']) ?></td>

				</tr>
			<?php endforeach; ?>

			</tbody>

		</table>

	</div>
	<div class="col-md-3">
		<form>
			<div class="form-group">
				<fieldset>
					<label class="form-label" for="disabledInput">Exchange EUR</label>
					<input class="form-control convertCurrency" name="EUR" type="number"
						   placeholder="Convert EUR to (USD or RON)">
				</fieldset>
			</div>

			<div class="form-group currency" style="display: none">
				<fieldset>
					<label class="form-label" for="readOnlyInput">Select Currency</label>
					<select class="form-control currency" name="currency" id="currency">
						<option value="USD" selected>USD</option>
						<option value="RON">RON</option>
					</select>
				</fieldset>
			</div>
			<div class="form-group">
				<fieldset>
					<label class="form-label" for="readOnlyInput">Amount</label>
					<input readonly class="form-control readOnlyInput" id="readOnlyInput" type="text"
						   placeholder="Readonly input here...">
				</fieldset>
			</div>


		</form>
	</div>

</div>


