<?php
include('config/db_connect.php');       // connect with the database
$sql = "SELECT id,name, title, ingredients, recipe_procedure FROM recipes ORDER BY title";
$result = mysqli_query($conn, $sql);    // executing the query
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);         // fetching all data
mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Writer</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="icon" href="./favicon.png">
</head>

<body>
    <?php include('template/header.php'); ?>        <!--Including the template file-->
    <h4 class="center" style="color:#26a69a">Recipe Store!</h4>

    <div class="container">
        <div class="row">

            <?php foreach ($recipes as $recipe) { ?>
                <div class="col s12 m6" style="margin:20px 0px;">
                    <div class="card" style="box-shadow: 3px 2px 10px 2px black;padding:20px;transition: .75s;">
                        <div class="card-content center" style='border-bottom: 1px solid black;'>
                            <h6 style="text-transform: uppercase;word-wrap: break-word;color:#d95965;font-size:20px"><?php echo htmlspecialchars($recipe['title']); ?></h6>
                            <p style='text-align:left'><span style="color: #26a69a;">Ingredients : </span></p>
                            <p style="word-wrap: break-word;text-transform: capitalize;"><?php echo htmlspecialchars($recipe['ingredients']); ?></p>
                        </div>
                        <div class="right-align read-more">
                            <a href="detail.php?id=<?php echo htmlspecialchars($recipe['id']); ?>">Procedure Info</a>   <!--converts special characters to string-->
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
    <?php include('template/footer.php'); ?>
</body>

</html>
