<?php 
    include_once '../config.php';

    $current_page = "home.php";

    include_once 'header.php'; 

    include_once '../model/entity/topic.php';
    include_once '../model/repository/topicRepository.php';

    include_once '../model/entity/blacklist.php';
    include_once  '../model/repository/blacklistRepository.php';

    if (!isset($_SESSION['email'])) {
        header('Location: 404.php');
        exit();
    } else {
        $email = $_SESSION['email'];

        $blacklistRepository = new BlacklistRepository();
        $blacklistedProfiles = $blacklistRepository->getBlacklistByEmail($email);

        if (!empty($blacklistedProfiles)) {
            header('Location: 404.php');
            exit();
        }
    }

    if (isset($_POST["newTopic"])) {
       $title = $_POST['title'];
       $description = $_POST['description']; 
       $current_date = date('Y-m-d H:i:s', strtotime('+2 hours'));

       $topic = new Topic(null, $_SESSION['idProfile'], $title, $description, $current_date);

       $topicRepository = new TopicRepository();
       $result = $topicRepository->newTopic($topic);
    }

    if (isset($_POST['deleteTopic'])) {
        $topicId = $_POST['topicId'];
    
        $topicRepository = new TopicRepository();
        $topicRepository->deleteTopic($topicId);
    }
?>

<body>
    <div class="container">
        <div class="left_topics">
            <h3>TOPICS</h3>
            <?php 
                $topicRepository = new TopicRepository();
                $topics = $topicRepository->getAllTopics();

                if (!empty($topics)) {
                    foreach ($topics as $topic) {                 
            ?>
                    <a href="#<?php echo $topic->getTitle() ?>" name="link_topic" id="<?php echo $topic->getIdTopic() ?>"><?php echo $topic->getTitle() ?></a>          
                <?php 
                    }
                } else { ?>
                    <p>There is not existing topics</p>
                <?php } ?>
        </div>

        <div class="right_topics">
            <?php 

                if (!empty($topics)) {
                    foreach ($topics as $topic) { ?>
                        <div id="<?php echo $topic->getTitle() ?>" class="topic_preview mb-2">
                            <p class="font_small"><?php echo $topic->getCreationDate() ?></p>
                            <p><strong>Title : <?php echo $topic->getTitle() ?></strong></p>
                            <p class="description_preview">
                                <strong>Description</strong></br>
                                <?php echo $topic->getDescription() ?>
                            </p>
                            <div class="d-flex">
                                <p class="font_small"></p>
                                <button class="more_button">Read more</button>
                                <form action="" method="POST" class="delete-topic-form">
                                    <input type="hidden" name="topicId" value="<?php echo $topic->getIdTopic() ?>">
                                    <button class="icon icon_trash" type="submit" name="deleteTopic">
                                        <img src="../public/assets/icon_trash.png" alt="Delete">
                                    </button>
                                </form>

                            </div>
                        </div>
                <?php
                    }
                } else {
                ?>
                    <p id="empty_topics">There is not existing topics</p>
                <?php } ?>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add topic</h2>
            <form method="POST" action="">
                <input type="text" name="title" placeholder="Title" required>
                <textarea type="text" name="description" placeholder="Description" required></textarea>
                <input type="submit" name="newTopic" value="Post!">
            </form>
        </div>
    </div>
    <div class="overlay"></div>
</body>

<?php include_once 'footer.php' ?>

<script>
    document.getElementById("modalBtn").addEventListener("click", function() {
        document.getElementById("myModal").style.display = "block";
        document.getElementsByClassName("overlay")[0].style.display = "block";
    });

    document.getElementsByClassName("close")[0].addEventListener("click", function() {
        document.getElementById("myModal").style.display = "none";
        document.getElementsByClassName("overlay")[0].style.display = "none";
    });

    window.addEventListener("click", function(event) {
        var modal = document.getElementById("myModal");
        var overlay = document.getElementsByClassName("overlay")[0];
        if (event.target === modal) {
            modal.style.display = "none";
            overlay.style.display = "none";
        }
    });

</script>