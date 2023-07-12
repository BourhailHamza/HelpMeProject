<?php 
    include_once '../config.php';
    
    $current_page = 'signin.php';

    include_once 'header.php'; 

    include_once '../model/entity/account.php';
    include_once '../model/repository/accountRepository.php';

    $class_error = "d-none";
    $class_exist = "d-none";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];
        $verify_password = $_POST['verify_password'];

        $current_date = date('Y-m-d H:i:s', strtotime('+2 hours'));
        
        if (!empty($email) && !empty($new_password) && !empty($verify_password)) {
            if ($new_password == $verify_password) {
                $class_error = "d-none";
                $new_account = new Account($email, $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT), $current_date);
                $new_account_repository = new AccountRepository();

                $exist = $new_account_repository->getAccountByEmail($email);

                if ($exist == null) {
                    $class_exist = "d-none";
                    $new_account_repository->newAccount($new_account);

                    $_SESSION['email'] = $email;

                    header("Location: addProfile.php");
                    exit();
                } else {
                    $class_exist = "d-block";
                }

            } else {
                $class_error = "d-block";
            }
        }
    }
?>

<body>
    <form class="sign" method="post" action="">
        <img src="../public/assets/logotype.png" alt="HelpMe!">
        <h1>SIGN UP</h1>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="new_password" placeholder="New password" required>
        <input type="password" name="verify_password" placeholder="Verify password" required>
        <p class="error_message <?php echo $class_error ?>">The passwords don't match. Please try again</p>
        <p class="error_message <?php echo $class_exist ?>">An account with this email already exist</p>
        <input type="submit" value="Sign up">
        <a href="signin.php">I already have an account</a>
    </form>
</body>

<?php include_once 'footer.php'; ?>

</html>