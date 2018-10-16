<?php include "../php/includes/db.php"; ?>
<?php include "../php/includes/variables.php"; ?>

<?php

$query_posts = "SELECT * FROM posts";
$result_posts = mysqli_query($connect, $query_posts);

$query_comments = "SELECT * FROM comments";
$result_comments = mysqli_query($connect, $query_comments);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Administration &ndash; <?php echo $setting['name']; ?></title>
</head>
<body>
    <header class="header">
        <h1 class="heading-primary">Administration &ndash; <?php echo $setting['name']; ?></h1>
        <!-- <a href="#" class="header__link">View Site</a> -->
    </header>
    <main>
        <section class="section-admin">
            <div class="sidebar">
                <div class="sidebar__item sidebar__item--active">
                    <a href="#dashboard" class="sidebar__label">Dashboard</a>
                </div>
                <div class="sidebar__item">
                    <a href="#posts" class="sidebar__label">Posts</a>
                </div>
                <div class="sidebar__item">
                    <a href="#pages" class="sidebar__label">Pages</a>
                </div>
                <div class="sidebar__item">
                    <a href="#comments" class="sidebar__label">Comments</a>
                </div>
                <div class="sidebar__item">
                    <a href="#statistics" class="sidebar__label">Statistics</a>
                </div>
                <div class="sidebar__item">
                    <a href="#users" class="sidebar__label">Users</a>
                </div>
                <div class="sidebar__item">
                    <a href="#settings" class="sidebar__label">Settings</a>
                </div>
            </div>
            <div class="main">
                <div class="main__el dashboard" id="dashboard">
                    <h2 class="heading-secondary">Dashboard</h2>
                </div>
                <div class="main__el posts" id="posts">
                    <h2 class="heading-secondary">Posts</h2>
                    <div class="post">
                        <div class="post__controls">
                            <a href="add-post.php" class="post__control">Add</a>
                        </div>
                        <?php 
                        if(mysqli_num_rows($result_posts) > 0) {
                            while($row_posts = mysqli_fetch_assoc($result_posts)) { ?>
                                <div class="post__row">
                                    <div class="post__item"><?php echo $row_posts['title']; ?></div>
                                    <div class="post__item"><?php echo $row_posts['date']; ?></div>
                                    <div class="post__item"><?php echo $row_posts['author']; ?></div>
                                    <div class="post__item"><a href="../" class="post__link">View</a></div>
                                    <div class="post__item"><a href="edit-post.php?id=<?php echo $row_posts['id']; ?>" class="post__link">Edit</a></div>
                                </div>
                                <?php 
                            }
                         } else {
                             echo "<p class=\"post__no-rows\">No Posts Yet. <a href=\"#\" class=\"post__no-rows--add\">Add one now.</a></p>";
                         } ?>

                    </div>
                </div>
                <div class="main__el pages" id="pages">
                    <h2 class="heading-secondary">Pages</h2>
                    <div class="page">
                        <div class="page__item">
                            <div class="page__heading">About</div>
                            <div class="page__links">
                                <a href="#" class="page_a">View</a>
                                <a href="#" class="page_a">Edit</a>
                                <a href="#" class="page_a">Delete</a>
                            </div>
                        </div>
                        <div class="page__item">
                            <div class="page__heading">About</div>
                            <div class="page__links">
                                <a href="#" class="page_a">View</a>
                                <a href="#" class="page_a">Edit</a>
                                <a href="#" class="page_a">Delete</a>
                            </div>
                        </div>
                        <div class="page__item">
                            <div class="page__heading">About</div>
                            <div class="page__links">
                                <a href="#" class="page_a">View</a>
                                <a href="#" class="page_a">Edit</a>
                                <a href="#" class="page_a">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main__el comments" id="comments">
                    <h2 class="heading-secondary">Comments</h2>
                    <div class="comment">
                        <?php while($row_comments = mysqli_fetch_assoc($result_comments)) { ?>
                            <div class="comment__container">
                                <p class="comment__name"><?php echo $row_comments['name']; ?></p>
                                <p class="comment__date"><?php echo $row_comments['date']; ?></p>
                                <p class="comment__post"><?php echo "POST NAME HERE"; ?></p>
                                <p class="comment__comment"><?php echo $row_comments['comment']; ?></p>
                                <form action="../php/commentadmin.php" method="post" class="comment__form">
                                    <div class="comment__group">
                                        <label for="status" class="comment__label">Status</label>
                                        <select name="status" id="status" class="comment__select">
                                            <option value="pending">Pending</option>
                                            <option value="approved">Approved</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $row_comments['id']; ?>">
                                    <input type="submit" name="submitdelete" value="Delete" class="comment__button button button__full">
                                    <input type="submit" name="submit" value="Update" class="comment__button button button__full">
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="main__el statistics" id="statistics">
                    <h2 class="heading-secondary">Statistics</h2>
                </div>
                <div class="main__el users" id="users">
                    <h2 class="heading-secondary">Users</h2>
                </div>
                <div class="main__el settings" id="settings">
                    <h2 class="heading-secondary">Settings</h2>
                    <div class="settings">
                        <!--  -->
                    </div>
                </div>
            </div>            
        </section>
        <?php
        
        if(isset($_GET['s']) AND isset($_GET['f'])) {
            
            ?>
            <section class="section-notification">
                <div class="notification <?php if($_GET['s'] === '1') { ?>notification--success<?php } else { ?>notification--fail<?php } ?>" id="js--notif">
                    <div class="notification__header"></div>
                    <p class="notification__text">
                        <?php if($_GET['s'] === '1') { ?>
                            <i class="fas fa-check-circle notification__icon"></i><?php if($_GET['f'] === 'cu') { ?>Update Successful<?php } else if ($_GET['f'] === 'cd') { ?>Deletion Successful<?php } ?>
                        <?php } else { ?>
                            <i class="fas fa-exclamation-circle notification__icon"></i><?php if($_GET['f'] === 'cd') { ?>Deletion Failed. Please try again.<?php } else if($_GET['f'] === 'cu') { ?>Update Failed. Please try again.<?php } ?>?>
                        <?php } ?>
                    </p>
                </div>
            </section>
            <script>
                setTimeout(() => {
                    document.getElementById("js--notif").style.opacity = '0';
                }, 500);
            </script>
        <?php } ?>
    </main>
</body>
</html>