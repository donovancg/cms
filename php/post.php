<?php include "includes/db.php"; ?>
<?php include "includes/user.php"; ?>
<?php

if(isset($_POST['submitedit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];

    $query_edit_post = "UPDATE posts SET title = '$title', content = '$content' WHERE id=$id";
    $result_edit_post = mysqli_query($connect, $query_edit_post);

    if(!$result_edit_post) {
        die("ERRORS ENSUE!!!");
    } else {
        header("Location: ../admin/edit-post.php?id=$id&s=1");
    }
} else if(isset($_POST['submitadd'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $user;
    $date = date("l, F dS, Y");
    $query_add_post = "INSERT INTO posts (title, author, date, content) VALUES('$title', '$author', '$date', '$content')";
    $result_add_post = mysqli_query($connect, $query_add_post);
    if(!$result_add_post) {
        header('Location: ../admin/add-post.php?s=-1');
    } else {
        header('Location: ../admin/add-post.php?s=1');
    }
}

?>