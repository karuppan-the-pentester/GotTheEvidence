<?php
$connection = mysqli_connect('db', 'root', 'password', 'gottheevidence');
if (!$connection) {
    die("Connection Error: " . mysqli_connect_error());
}
