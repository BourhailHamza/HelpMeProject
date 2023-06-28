<?php include_once '../config.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>HelpMe!</title>
    <link rel="stylesheet" href="../public/css/styles.css">
    <script src="../public/js/script.js"></script>
</head>

<header>
    <?php if ($role == "admin") { ?>
        <button id="icon_settings"><img src="../public/assets/icon_settings.png" alt="Settings"></button>
    <?php } else { ?>
        <input class="invisible" type="text">
    <?php } ?>

    <button id="icon_logout"><img src="../public/assets/icon_logout.png" alt="Log out"></button>
</header>