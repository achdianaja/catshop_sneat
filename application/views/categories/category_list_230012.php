<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CAT SHOP 230012</title>
</head>

<body>
	<h1>CAT SHOP 230012</h1>
	<h2>CATEGORY LIST</h2>
    <a href="<?= base_url() ?>"><h4>HOME</h4></a>
	<hr>
	<?= $this->session->flashdata('msg') ?>
	<a href="<?= site_url('category230012/add') ?>">Add New Category</a>
    <hr>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Description</th>
			<th colspan="2">Action</th>
		</tr>

		<?php 
        foreach($category as $category): ?>
		<tr>
			<td><?= $i++ ?></td>
			<td><?= $category->name_230012 ?></td>
			<td><?= $category->description_230012 ?></td>
			<td><a href="<?= site_url('category230012/edit/' . $category->id_230012) ?>">Edit</a></td>
			<td>
				<a href="#" onclick="return confirm('Are you sure you want to delete this category?') ? window.location.href='<?= site_url('category230012/delete/' . $category->id_230012) ?>' : false;">Delete</a>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	<p><?= $this->pagination->create_links() ?></p>

	<p><a href="<?= base_url() ?>">BACK TO HOME</a></p>
</body>

</html>
