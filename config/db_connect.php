<?php


/*Connect With The Local db
Coloums are,
1.id(A.I)
2.name(255 Char Length)
3.title(255 Char Length)
4.ingredients(255 Char Length)
5.recipe_procedure(1280 Char Length)
6.created_at(TimeStamp)
*/


$conn = mysqli_connect('localhost', 'muki', 'php_db', 'Recipe_Store');        // make sql db connection
if (!$conn) {
    echo 'Connection Error  ' . mysqli_connect_error();
}
