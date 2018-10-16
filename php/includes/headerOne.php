<?php include "../php/includes/db.php"; ?>
<?php include "../php/includes/user.php"; ?>
<?php include "../php/includes/variables.php"; ?>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="icon" href="../img/user/favicon/icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <title><?php echo $setting['name']; ?></title>
</head>
<body>
    <header class="header-small">
        <div class="header-small__container">
            <h1 class="heading-primary"><?php echo $setting['name']; ?></h1>
            <a href="../" class="header-small__img--link">
                <img src="../img/user/favicon/icon.png" alt="Logo for <?php echo $setting['name']; ?>" class="header-small__img">
            </a>
        </div>
        <nav class="header-small__nav nav" id="js--nav">
            <?php for($i = 0; $i < count($nav_links); $i++) { ?>
            <a href="../<?php echo $nav_links[$i][0]; ?>" class="nav__a"><?php echo $nav_links[$i][1]; ?></a>
            <?php } ?>
            <a href="../" class="nav__a nav__a--cta">Subscribe</a>
            <a href="javascript:void(0)" class="nav__a nav__a--respond">
                <div class="nav__icon" id="js--nav-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </nav>
    </header>