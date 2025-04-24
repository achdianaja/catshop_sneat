<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATSHOP 230012</title>
</head>
<body>
    <div>
    <h1>CATSHOP 230012</h1>
    <h3>CHANGE PASSWORD</h3>
    <hr>
        <form action="" method="post">
        <div style="color: red;"><?= validation_errors() ?></div>
        <div><?= $this->session->flashdata('msg') ?></div>

            <table>
                <tr>
                    <td><label for="old_password_230012">OLD PASSWORD</label></td>
                    <td><input type="password" id="old_password_230012" name="old_password_230012" ></td>
                </tr>
                <tr>
                    <td><label for="password_230012">NEW PASSWORD</label></td>
                    <td><input type="password" id="new_password_230012" name="new_password_230012" ></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Submit" name="change">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <p><a href="<?= site_url('welcome') ?>">BACK TO HOME</a></p>
</body>
</html>
