<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CAT SHOP 230012</title>
</head>

<body>
	<h1>CAT SHOP 230012</h1>
	<h3>CAT FORM</h3>
	<hr>

	<div style="color: red;"><?= validation_errors() ?></div>
	<form action="" method="POST">
		<table>
			<tr>
				<td>Cat Id</td>
				<td>: <?= $cat->id_230012 ?></td>
			</tr>
			<tr>
				<td>Cat Name</td>
				<td>: <?= $cat->name_230012 ?></td>
			</tr>
			<tr>
				<td>Cat Type</td>
				<td>: <?= $cat->type_230012 ?></td>
			</tr>
			<tr>
				<td>Cat Price</td>
				<td>: $<?= $cat->price_230012 ?></td>
			</tr>
            <tr>
				<td>Customer Name</td>
				<td>: <input type="text" name="customer_name_230012" id=""  value=""></td>
			</tr>
            <tr>
				<td>Customer Address</td>
				<td>: <textarea name="customer_address_230012" id=""></textarea></td>
			</tr>
            <tr>
				<td>Customer Phone</td>
				<td>: <input type="text" name="customer_phone_230012" id=""  value=""></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="SALE" name="submit" >
					<input type="reset" value="RESET" >
				</td>
			</tr>
		</table>
	</form>
	<p><a href="<?= site_url('/cats230012') ?>">CANCEL</a></p>
</body>

</html>
