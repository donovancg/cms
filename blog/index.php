<?php include "../php/includes/headerOne.php"; ?>
    <main>
        <section class="section-posts">
            <h2 class="heading-secondary">Blog</h2>
            <?php while($row_posts = mysqli_fetch_assoc($result_posts)) { ?>
            <div class="post">
                <a href="../post/?id=<?php echo $row_posts['id']; ?>" class="post__heading--link"><h3 class="post__heading"><?php echo $row_posts['title']; ?></h3></a>
                <p class="post__author">By <a href="#" class="post__link"><?php echo $row_posts['author']; ?></a></p>
                <p class="post__date"><?php echo $row_posts['date']; ?></p>
                <img src="../img/user/<?php echo $row_posts['img']; ?>" alt="Elephant Trunk Nebula" class="post__img">
                <p class="post__content"><?php echo $row_posts['content']; ?></p>
                <a href="../post/?id=<?php echo $row_posts['id']; ?>" class="post__comments"><?php echo $row_posts['comment_count']; ?> Comment<?php if($row_posts['comment_count'] != '1') { echo "s"; } ?></a>
            </div>
            <?php } ?>
        </section>
    </main>
<?php include "../php/includes/footerOne.php"; ?>