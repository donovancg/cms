<?php include "includes/db.php"; ?>
<?php include "includes/variables.php"; ?>
<?php

if(isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $comment = mysqli_real_escape_string($connect, $_POST['comment']);
    $date = date("F j, Y") . " at " . date("g:ia");

    $query_comments = "INSERT INTO comments (post_id, name, date, comment) VALUES ('$id', '$name','$date', '$comment')";
    $result_comments = mysqli_query($connect, $query_comments);

    header("Location: ../post/?id=$id");
}

?>