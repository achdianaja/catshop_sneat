<!DOCTYPE html>
<html>

<head>
    <title>Change Photo</title>
</head>

<body>
    <h1>CATSHOP 230012</h1>
    <h3>CHANGE PHOTO</h3>
    <hr>

    <div style="color: red;"><?= $error ?></div>
    <?= $this->session->flashdata('msg') ?>
    <form action="" method="post" enctype="multipart/form-data">
    <table>
            <tr>
                <td>CURRENT PHOTO</td>
                <td>
                    <img src="<?= base_url('uploads/users/' . $this->session->userdata('photo_230012')) ?>" alt="Current Photo" width="200">
                </td>
            </tr>
            <tr>
                <td>NEW PHOTO</td>
                <td>
                    <input type="file" name="photo" id="photo" accept="image/*">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="upload" value="Change Photo">
                </td>
            </tr>
        </table>
    </form>
    <hr>
    <a href="<?= base_url() ?>">Back to Home</a>
</body>

</html>