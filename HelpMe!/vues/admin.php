<?php 
    include_once '../config.php';

    $current_page = "signin.php";

    include_once 'header.php'; 

    include_once '../model/entity/account.php';
    include_once  '../model/repository/accountRepository.php';

    include_once '../model/entity/profile.php';
    include_once  '../model/repository/profileRepository.php';

    $class_error = "d-none";

    if (isset($_SESSION['email'])) {
        if (!isset($_SESSION['role']) && !$_SESSION['role'] == 'admin') {
            header('Location: 404.php');
            exit();
        }
    }
?>
 
<body>
    <table id="accountsTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Email</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $accountRepository = new AccountRepository();
                $profileRepository = new ProfileRepository();

                $accounts = $accountRepository->getAllAccounts();

                foreach ($accounts as $account) {
                    $profiles = $profileRepository->getProfilesByEmail($account->getEmail());
                    $usernames = array_map(function ($profile) {
                        return $profile->getUsername();
                    }, $profiles);
                    $usernamesString = implode(", ", $usernames);
                
                    echo "<tr>";
                    echo "<td>" . $account->getEmail() . "</td>";
                    echo "<td>" . $usernamesString . "</td>";
                    echo "<td>";
                    echo "<form action='blacklist.php' method='POST'>";
                    echo "<input type='hidden' name='email' value='" . $account->getEmail() . "'>";
                    echo "<button type='submit' name='blacklistButton'>Blacklist</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>

<?php include_once 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#accountsTable').DataTable();
    });
</script>