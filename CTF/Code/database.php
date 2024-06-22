<?php
$connection = mysqli_connect('db', 'root', 'password', 'gottheevidence');
// $connection = mysqli_connect('localhost', 'root', '', 'gottheevidence');
if (!$connection) {
    die("Connection Error: " . mysqli_connect_error());
}
