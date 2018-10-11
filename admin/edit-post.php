<?php include "../php/includes/db.php"; ?>

<?php
if(!isset($_GET['id'])) {
    header("location: ./#posts");
}


$query_posts = "SELECT * FROM posts WHERE id='" . $_GET['id'] . "'";
$result_posts = mysqli_query($connect, $query_posts);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Administration &ndash; Backyard Astrophotography</title>
</head>
<body>
    <header class="header">
        <h1 class="heading-primary">Administration &ndash; Backyard Astrophotography</h1>
    </header>
    <main>
        <section class="section-admin">
            <div class="sidebar">
                <div class="sidebar__item">
                    <a href="./#dashboard" class="sidebar__label">Dashboard</a>
                </div>
                <div class="sidebar__item sidebar__item--active">
                    <a href="./#posts" class="sidebar__label">Posts</a>
                </div>
                <div class="sidebar__item">
                    <a href="./#pages" class="sidebar__label">Pages</a>
                </div>
                <div class="sidebar__item">
                    <a href="./#comments" class="sidebar__label">Comments</a>
                </div>
                <div class="sidebar__item">
                    <a href="./#statistics" class="sidebar__label">Statistics</a>
                </div>
                <div class="sidebar__item">
                    <a href="./#users" class="sidebar__label">Users</a>
                </div>
                <div class="sidebar__item">
                    <a href="./#settings" class="sidebar__label">Settings</a>
                </div>
            </div>
            <div class="edit-post">
                <form action="../php/post.php" method="post" class="edit-post__form form">
                <h2 class="edit-post__heading heading-secondary">Edit Post</h2>
                    <?php while($row_posts = mysqli_fetch_assoc($result_posts)) { $id = $row_posts['id']; $title = $row_posts['title']; $content = $row_posts['content']; } ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form__group">
                        <label for="title" class="form__label">Title</label>
                        <input type="text" class="form__input" name="title" id="title" value="<?php echo $title; ?>">
                    </div>
                    <div class="form__group">
                        <label for="content" class="form__label">Content</label>
                        <textarea name="content" id="content" class="form__textarea"><?php echo $content; ?></textarea>
                    </div>
                    <input type="submit" value="Update" name="submitedit" id="submitedit" class="form__button button button__full">
                </form>
            </div>            
        </section>
        <?php
        
        if(isset($_GET['s'])) {
            
            ?>
            <section class="section-notification">
                <div class="notification <?php if($_GET['s'] === '1') { ?>notification--success<?php } else { ?>notification--fail<?php } ?>" id="js--notif">
                    <div class="notification__header"></div>
                    <p class="notification__text">
                        <?php if($_GET['s'] === '1') { ?>
                            <i class="fas fa-check-circle notification__icon"></i>Update Successful.
                        <?php } else { ?>
                            <i class="fas fa-exclamation-circle notification__icon"></i>Update Failed. Please try again.
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