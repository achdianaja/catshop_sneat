<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CAT SHOP 230012</title>
</head>

<body>
	<h1>CAT SHOP 230012</h1>
	<h2>SALES LIST</h2>
	<a href="<?= base_url() ?>">
		<h4>HOME</h4>
	</a>
	<hr>
	<hr>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Sale ID</th>
			<th>Sale Date</th>
            <th>Cat ID</th>
			<th>Customer Name</th>
			<th>Customer Address</th>
			<th>Customer Phone</th>
		</tr>

		<?php 
        foreach($sales as $sale): ?>
		<tr>
			<td><?= $i++ ?></td>
			<td><?= $sale->sale_id_230012 ?></td>
            <td><?= $sale->sale_date_230012 ?></td>
            <td><?= $sale->cat_id_230012 ?></td>
            <td><?= $sale->customer_name_230012 ?></td>
            <td><?= $sale->customer_address_230012 ?></td>
            <td><?= $sale->customer_phone_230012 ?></td>
		</tr>
		<?php endforeach ?>
	</table>
	<p><?= $this->pagination->create_links() ?></p>

	<p><a href="<?= base_url() ?>">BACK TO HOME</a></p>
</body>

</html>
