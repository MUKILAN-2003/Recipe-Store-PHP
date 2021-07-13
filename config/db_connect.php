<?php


/*Connect With The Local db
Coloums are,
1.id
2.Name
3.Title
4.Ingredient
5.Procedure
6.CreateAt
*/


$conn = mysqli_connect('localhost', 'muki', 'php_db', 'Recipe_Store');
if (!$conn) {
    echo 'Connection Error  ' . mysqli_connect_error();
}
