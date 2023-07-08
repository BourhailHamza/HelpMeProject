<?php include_once '../config.php'; ?>

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
    <?php 

        if ($current_page != "signin.php" && $current_page != "signup.php") {
            if ($role == "admin") { ?>
                <button class="icon" id="icon_settings"><img src="../public/assets/icon_settings.png" alt="Settings"></button>
        <?php } else { ?>
                <input class="invisible" type="text">
        <?php } ?>
        
        <button class="icon" id="icon_logout" onclick="logout()"><img src="../public/assets/icon_logout.png" alt="Log out"></button>

    <?php } ?>
    
</header>
