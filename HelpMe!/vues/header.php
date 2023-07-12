<?php include_once '../config.php'; session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>HelpMe!</title>
    <link rel="stylesheet" href="../public/css/styles.css">
    <script src="../public/js/script.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<header>
    <?php 

        if ($current_page != "signin.php" && $current_page != "signup.php") {
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                <button class="icon" id="icon_settings" onclick="openAdmin()"><img src="../public/assets/icon_settings.png" alt="Settings"></button>
        <?php } else { ?>
                <input class="invisible" type="text">
        <?php } ?>
        
        <button class="icon" id="icon_logout" onclick="logout()"><img src="../public/assets/icon_logout.png" alt="Log out"></button>

    <?php } ?>
    
</header>
