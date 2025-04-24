<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CAT SHOP 230012</title>
</head>

<body>
	<h1>CAT SHOP 230012</h1>
	<h2>CAT LIST</h2>
	<a href="<?= base_url() ?>">
		<h4>HOME</h4>
	</a>
	<hr>
	<?= $this->session->flashdata('msg') ?>
	<a href="<?= site_url('cats230012/add') ?>">Add New Pet</a>
	<hr>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Photo</th>
			<th>Type</th>
			<th>Gender</th>
			<th>(Month)</th>
			<th>Price</th>
			<th colspan="3">Action</th>
		</tr>

		<?php 
        // $i = 1;
        foreach($cats as $cat): ?>
		<tr>
			<td><?= $i++ ?></td>
			<td><?= $cat->name_230012 ?></td>
			<td><img src="<?= base_url('uploads/cats/'. $cat->cats_photo_230012) ?>" height="70" width="auto" alt=""></td>
			<td><?= $cat->type_230012 ?></td>
			<td><?= $cat->gender_230012 ?></td>
			<td><?= $cat->age_230012 ?></td>
			<td><?= $cat->price_230012 ?></td>
			<td><a href="<?= site_url('cats230012/edit/' . $cat->id_230012) ?>">Edit</a></td>
			<td><a href="<?= site_url('cats230012/delete/' . $cat->id_230012) ?>" onclick="return confirm('Are you sure you want to delete this cat?')">Delete</a></td>
			<td>
				<?php if($cat->sold_230012 == 1){
                    echo "SOLD";
                }  else{ ?>
				    <a href="<?=  site_url('cats230012/sale/' . $cat->id_230012) ?>">SALE</a>
				<?php } ?>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	<p><?= $this->pagination->create_links() ?></p>

	<p><a href="<?= site_url('welcome') ?>">BACK TO HOME</a></p>
</body>

</html>
