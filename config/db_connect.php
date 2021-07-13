<?php
$conn = mysqli_connect('localhost', 'muki', 'php_db', 'Recipe_Store');
if (!$conn) {
    echo 'Connection Error  ' . mysqli_connect_error();
}
