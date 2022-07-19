<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= base_url() ?>">Upwork Test</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
				aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor03">

			<ul class="navbar-nav me-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url() ?>">Home
						<span class="visually-hidden">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>products">Products</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>stocks">stocks</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>about">About</a>
				</li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				<a class="nav-link btn btn-warning btn-block m-2" href="<?= base_url() ?>register"><span
							class="text-white">Register</span></a>

			</ul>

		</div>
	</div>
</nav>
<div class="container">
	<?php if ($this->session->flashdata('success_message')):

		echo '<div class="alert alert-dismissible alert-success">';
		echo '	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
		echo $this->session->flashdata('success_message');
		echo '</div>';

	endif; ?>
	<?php if ($this->session->flashdata('danger_message')):

		echo '<div class="alert alert-dismissible alert-danger">';
		echo '	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
		echo $this->session->flashdata('danger_message');
		echo '</div>';

	endif; ?>
