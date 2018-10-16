<?php include "../php/includes/headerOne.php"; ?>
<?php

$query_images = "SELECT * FROM posts";
$result_images = mysqli_query($connect, $query_images);

?>
    <main>
        <section class="section-gallery">
            <h2 class="heading-secondary">Gallery</h2>
            <div class="gallery">
                <?php while($row_images = mysqli_fetch_assoc($result_images)) { ?>
                <a href="../image/?id=<?php echo $row_images['id']; ?>" class="gallery__link">
                    <div class="gallery__item">
                        <p class="gallery__heading"><?php echo $row_images['img_caption']; ?></p>
                        <img src="../img/user/<?php echo $row_images['img']; ?>" alt="<?php echo $row_images['img']; ?>" class="gallery__img">
                    </div>
                </a>
                <?php } ?>
            </div>
        </section>
    </main>
<?php include "../php/includes/footerOne.php"; ?>