<?php
include('config/db_connect.php');

/*if (isset($_POST['delete'])) {            //Checking if there is a POST request

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM recipes WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}*/


if (isset($_GET['id'])) {           //Checking if there is a GET request

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM recipes WHERE id = $id";          // Query for getting particular recipe data

    $result = mysqli_query($conn, $sql);           // Connecting with database and feteching data

    $recipe = mysqli_fetch_assoc($result);          // return associative array.

    mysqli_free_result($result);   // frees the memory associated with it.
    mysqli_close($conn);    // clossing the connection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
    <title>Recipe Deatil</title>
</head>

<body>
    <?php include('template/header.php'); ?>
    <div class="container" style="max-width: 640px;">
        <?php if ($recipe) : ?>
            <h4 style="text-transform: uppercase;color:#d95965;text-align:center"><?php echo $recipe['title']; ?></h4>
            <div style="display: flex;justify-content: space-evenly">
                <p><?php echo date($recipe['created_at']); ?></p>
                <p>Created by <?php echo $recipe['name']; ?></p>
            </div>
            <h5 style="text-align: left;color:orange">Ingredients:</h5>
            <ul style="font-size: 18px;display:flex;justify-content: center;">
                <ul class="text">
                    <?php foreach (explode(',', $recipe['ingredients']) as $ing) : ?>  <!--breaks a main-array into an sub-array-->
                        <li><i class="fas fa-star" style="color: #26a69a;">&nbsp;&nbsp;</i><?php echo htmlspecialchars($ing); ?></li>
                    <?php endforeach; ?>
                </ul>
            </ul>
            <h5 style="text-align: left;color:orange">Procedure:</h5>
            <p style="font-size: 18px;"><?php echo $recipe['recipe_procedure']; ?></p>

            <!--
            <form action="detail.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $recipe['id']; ?>">      // Form to delete a Recipe
                <input type="submit" name="delete" value="Delete" class="btn">
            </form>
        -->
        <?php else : ?>
            <h5>No such Recipe exists.</h5>
        <?php endif ?>
    </div>
    <?php include('template/footer.php'); ?>
</body>

</html>