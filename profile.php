<?php

include("vendor/autoload.php");

use Helpers\Auth;

$auth = Auth::check();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Profile</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class= "mt-5 mb-3">
            <?= $auth->name ?>
            <span class="fw-noraml text-muted">
                (<?= $auth->role ?>)
            </span>
        </h1>

        <?php if(isset($_GET['error'])) : ?>
            <div class="alert alert-warning">
                Cannot upoload file
            </div>
        <?php endif ?>

        <?php if($auth->photo): ?>
            <img
                class="img-thumbnail mb-3"
                src="_actions/photos/<?= $auth->photo ?>" 
                alt="Profile Photo" width="200" />
        <?php endif ?>

        <form action="_actions/upload.php" method="post"
            enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" name="photo" class="form-control">
                <button class="btn btn-secondary">Upload</button>
            </div>
        </form>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Email:</b> <?= $auth->email ?>
            </li>
            <li class="list-group-item">
                <b>Phone:</b> <?= $auth->phone ?>
            </li>
            <li class="list-group-item">
                <b>Address:</b> <?= $auth->address ?>
            </li>
        </ul>
        </br>
        <a href="admin.php">Manage User</a> |
        <a href="_actions/logout.php">Logout</a>
    </div>
</body>
</html>