<?php 
    include_once '../config.php';

    $current_page = "addProfile.php";

    include_once 'header.php'; 

    include_once '../model/entity/profile.php';
    include_once '../model/repository/profileRepository.php';

    $class_error = "d-none";
    $class_exist = "d-none";

    if (!isset($_SESSION['email'])) {
        header('Location: signin.php');
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $target_dir = "../public/pictures/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $username = $_POST['username'];

        // Check if username already exists
        $profileRepository = new ProfileRepository();
        $existingProfile = $profileRepository->getProfileByUsername($username);
        if ($existingProfile) {
            $class_exist = "d-block";
        } else {
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                $class_error = "d-none";

                $profilePicture = $target_file;

                $profile = new Profile(null, $_SESSION['email'], $username, $profilePicture, "user");
                $profileRepository->newProfile($profile);

                $_SESSION['username'] = $username;

                header("Location: home.php");
                exit();
            } else {
                $class_error = "d-block";
            }
        }
    }
?>

<body>
    <form method="post" action="" enctype="multipart/form-data" class="new_profile">
        <img src="../public/assets/logotype.png" alt="HelpMe!">
        <h1>NEW PROFILE</h1>
        <input type="text" name="username" placeholder="Username" required>
        <label>Choose your profile picture
            <input type="file" id="picture" name="picture" accept="image/png, image/gif, image/jpeg" onchange="previewFile(event)">
        </label>
        <img id="previewImage" alt="Preview">
        <p class="<?php echo $class_error ?>">There was an error uploading the file. Try again</p>
        <p class="<?php echo $class_exist ?>">This username already exist. Please choose anotcher one</p>
        <input type="submit" value="Create profile">
    </form>
</body>

<?php include_once 'footer.php'; ?>

</html>
