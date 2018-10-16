<?php include "../php/includes/headerOne.php"; ?>
<?php

if(isset($_GET['id'])) {
    $query_image = "SELECT * FROM posts WHERE id=" . $_GET['id'];
    $result_image = mysqli_query($connect, $query_image);
} else {
    header("Location: ../gallery/");
}



?>
    <main>
        <section class="section-view">
            <?php while($row_image = mysqli_fetch_assoc($result_image)) {?>
            <div class="view">
                <h2 class="heading-secondary"><?php echo $row_image['img_caption']; ?></h2>
                <img src="../img/user/<?php echo $row_image['img']; ?>" alt="<?php echo $row_image['img']; ?>" class="view__img">
            </div>
            <?php } ?>
            <a href="../gallery/" class="view__return">Return to Gallery</a>
        </section>
    </main>
<?php include "../php/includes/footerOne.php"; ?>