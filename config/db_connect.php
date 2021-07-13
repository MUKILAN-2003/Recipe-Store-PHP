<?php


/*Connect With The Local db
Coloums are,
1.id(A.I)
2.name(255 Char Length)
3.title(255 Char Length)
4.ingredient(255 Char Length)
5.recipe_procedure(1280 Char Length)
6.create_at(TimeStamp)
*/


$conn = mysqli_connect('localhost', 'muki', 'php_db', 'Recipe_Store');
if (!$conn) {
    echo 'Connection Error  ' . mysqli_connect_error();
}
