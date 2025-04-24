<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CAT SHOP 230012</title>
</head>

<body>
	<h1>CAT SHOP 230012</h1>
	<h3>USER FORM</h3>
	<hr>

	<?php
	$username = '';
	$usertype = '';
    $fullname = '';
	if (isset($users)) {
		$username = $users->username_230012;
		$usertype = $users->usertype_230012;
        $fullname = $users->fullname_230012;
	}
	?>

	<form action="" method="POST">
        <div style="color: red;"><?= validation_errors() ?></div>
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username_230012" id=""  value="<?= $username ?>"></td>
			</tr>
			<tr>
				<td>Usertype</td>
				<td>
                    <select name="usertype_230012" id="" >
                        <option value="Manager" <?= ($usertype == 'Manager') ? 'selected' : '' ?>>Manager</option>
                        <option value="Cashier" <?= ($usertype == 'Cashier') ? 'selected' : '' ?>>Cashier</option>
                    </select>
				</td>
			</tr>
            <tr>
                <td>Fullname</td>
                <td><input type="text" name="fullname_230012" id=""  value="<?= $fullname ?>"></td>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="SAVE" name="submit" >
					<input type="reset" value="RESET" >
				</td>
			</tr>
		</table>
	</form>
	<p><a href="<?= site_url('/user230012') ?>">CANCEL</a></p>
</body>

</html>
