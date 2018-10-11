<?php include "../php/includes/db.php"; ?>

<?php

$query_posts = "SELECT * FROM posts";
$result_posts = mysqli_query($connect, $query_posts);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Administration &ndash; Backyard Astrophotography</title>
</head>
<body>
    <header class="header">
        <h1 class="heading-primary">Administration &ndash; Backyard Astrophotography</h1>
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
                </div>
                <div class="main__el statistics" id="statistics">
                    <h2 class="heading-secondary">Statistics</h2>
                </div>
                <div class="main__el users" id="users">
                    <h2 class="heading-secondary">Users</h2>
                </div>
                <div class="main__el settings" id="settings">
                    <h2 class="heading-secondary">Settings</h2>
                </div>
            </div>            
        </section>
    </main>
</body>
</html>