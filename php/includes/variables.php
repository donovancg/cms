<?php include "db.php"; ?>
<?php

$query_variables = "SELECT * FROM settings";
$result_variables = mysqli_query($connect, $query_variables);
$setting = array();

function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
}

while($row_arr = mysqli_fetch_assoc($result_variables)) {
    $setting = array_push_assoc($setting, $row_arr['setting'], $row_arr['value']);
}

$nav_links = array(array('./', 'Home'), array('blog/', 'Blog'), array('about/', 'About'), array('gallery/', 'Gallery'));

?>