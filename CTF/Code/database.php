<?php
$connection = mysqli_connect('localhost', 'ctf', 'passwd', 'gottheevidence');
if (!$connection) {
    echo "Connection Error";
}
