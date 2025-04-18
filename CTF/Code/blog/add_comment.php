<?php

session_start();
include '../database.php';
$user_id = $_SESSION['userid'];
if ($user_id == NULL) {
	header("Location: ../login/");
}
$content = $_POST['content'];
if (isset($_POST['content'])) {
    $query = "INSERT INTO `comments` (`id`, `comments_title`, `comments`) VALUES (NULL, 'Anonymous', '$content');";
    mysqli_query($connection, $query);
}
header('location: ./post.php');

?>