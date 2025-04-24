<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CAT SHOP 230012</title>
</head>

<body>
	<h1>CAT SHOP 230012</h1>
	<h2>USERS LIST</h2>
    <a href="<?= base_url() ?>"><h4>HOME</h4></a>
	<hr>
	<?= $this->session->flashdata('msg') ?>
	<a href="<?= site_url('user230012/add') ?>">Add New User</a>
    <hr>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Username</th>
            <th>Usertype</th>
			<th>Fullname</th>
			<th colspan="3">Action</th>
		</tr>

		<?php 
        foreach($users as $user): ?>
		<tr>
			<td><?= $i++ ?></td>
			<td><?= $user->username_230012 ?></td>
			<td><?= $user->usertype_230012 ?></td>
			<td><?= $user->fullname_230012 ?></td>
			<td><a href="<?= site_url('user230012/edit/' . $user->id_230012) ?>">Edit</a></td>
			<td>
                <a href="#" onclick="return confirm('Are you sure you want to delete this User?') ? window.location.href='<?= site_url('user230012/delete/' . $user->id_230012) ?>' : false;">Delete</a>
			</td>
            <td><a href="<?= site_url('user230012/reset_password/' . $user->id_230012) ?>">Reset</a></td>
		</tr>
		<?php endforeach ?>
	</table>
	<p><?= $this->pagination->create_links() ?></p>

	<p><a href="<?= site_url('welcome') ?>">BACK TO HOME</a></p>
</body>

</html>
