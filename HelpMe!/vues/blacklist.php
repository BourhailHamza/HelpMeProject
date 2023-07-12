<?php

    include_once '../model/entity/blacklist.php';
    include_once  '../model/repository/blacklistRepository.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['blacklistButton'])) {
        $email = $_POST['email'];
        $current_date = date('Y-m-d H:i:s', strtotime('+2 hours'));

        $blacklistRepository = new BlacklistRepository();
        $blacklist = new Blacklist(null, $email, $current_date);
        $blacklistRepository->blacklistProfile($blacklist);

        header('Location: admin.php');
        exit();
    }