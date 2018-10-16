<?php include "../php/includes/headerOne.php"; ?>
<?php

$id = mysqli_real_escape_string($connect, $_GET['id']);

$query_post = "SELECT * FROM posts WHERE id='$id'";
$result_post = mysqli_query($connect, $query_post);

$query_comments = "SELECT * FROM comments WHERE post_id='$id' AND status='approved'";
$result_comments = mysqli_query($connect, $query_comments);


?>
    <main>
        <section class="section-post">
            <?php while($row_post = mysqli_fetch_assoc($result_post)) { ?>
                <div class="post-single">
                    <h2 class="post-single__heading heading-secondary"><?php echo $row_post['title']; ?></h2>
                    <p class="post-single__author">By <a href="#" class="post-single__link"><?php echo $row_post['author']; ?></a></p>
                    <p class="post-single__date"><?php echo $row_post['date']; ?></p>
                    <img src="../img/user/Telescope.png" alt="img" class="post-single__img">
                    <p class="post-single__content"><?php echo $row_post['content']; ?></p>
                    <div class="post-single__comments">
                        <p class="post-single__comments--label">Comments</p>
                        <?php while($row_comments = mysqli_fetch_assoc($result_comments)) { ?>
                        <div class="post-single__comment">
                            <div class="post-single__comment--header">
                                <p class="post-single__comment--name"><?php echo $row_comments['name']; ?></p>
                                <p class="post-single__comment--date">&mdash; &nbsp; <?php echo $row_comments['date']; ?></p>
                            </div>
                            <p class="post-single__comment--content"><?php echo $row_comments['comment']; ?></p>
                        </div>
                        <?php } ?>
                    </div>
                    <a class="post-single__comments--link" id="js--comment-reveal">Add a comment</a>
                    <form action="../php/comment.php" method="post" class="post-single__form" id="js--comment-form">
                        <input type="hidden" name="id" value="<?php echo $row_post['id']; ?>">
                        <input type="text" class="post-single__input" name="name" id="name" placeholder="Name" required>
                        <textarea name="comment" id="comment" class="post-single__textarea"></textarea>
                        <input type="submit" value="Publish" class="post-single__submit" name="submit">
                        <p class="post-single__text">Your comment will be reviewed by the administrator before being published.</p>
                    </form>
                </div>
            <?php } ?>
        </section>
    </main>
    <script src="../js/form.js"></script>
<?php include "../php/includes/footerOne.php"; ?>