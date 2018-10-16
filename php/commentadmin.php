<?php include "includes/db.php"; ?>
<?php include "includes/variables.php"; ?>
<?php

if(isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    echo $id . " " . $status;

    $query_comment = "UPDATE comments SET status = '$status' WHERE id=$id";
    $result_comment = mysqli_query($connect, $query_comment);

    header("Location: ../admin/?s=1&f=cu#comments");
}

if(isset($_POST['submitdelete'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    echo $id . " " . $status;

    $query_comment = "DELETE FROM comments WHERE id=$id";
    $result_comment = mysqli_query($connect, $query_comment);

    header("Location: ../admin/?s=1&f=cd#comments");
}

?>