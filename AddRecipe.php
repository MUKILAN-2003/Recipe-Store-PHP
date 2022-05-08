<?php
include('config/db_connect.php');
$name = $title = $ingredients = $procedure = '';
$errors = array('name' => '', 'title' => '', 'ingredients' => '', 'procedure' => '');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $procedure = $_POST['procedure'];
    $name = $_POST['name'];
    $ingredients = $_POST['ingredients'];
    //printf("$name, $title, $ingredients, $procedure");
    if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $errors['name'] = 'Name must be letters and Spaces only';
    }
    if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
        $errors['ingredients'] = 'Must be a Comma Separated Not Numbers Add only Name';
    }

    if (array_filter($errors)) {
    } else {
        $name = mysqli_real_escape_string($conn, $_POST['name']);   //escapes special characters in a string for use in an SQL query
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
        $procedure = mysqli_real_escape_string($conn, $_POST['procedure']);
        $sql = "INSERT INTO recipes(name,title,ingredients,recipe_procedure) VALUES('$name','$title','$ingredients','$procedure')";

        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Add Recipe</title>
</head>

<body>
    <?php include('template/header.php'); ?>
    <section class="container">
        <h4 class="center" style="color: #26a69a;">Add a Recipe</h4>
        <form action="AddRecipe.php" method="POST">
            <label>Your Name</label>
            <input type="text" name="name" autocomplete="off" value="<?php echo htmlspecialchars($name) ?>">
            <div class="red-text"><?php echo $errors['name']; ?></div>
            <label>Recipe Title</label>
            <input type="text" name="title" autocomplete="off" value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text"><?php echo $errors['ingred']; ?></div>
            <label>Ingredients (Comma separated)</label>
            <input type="text" name="ingredients" autocomplete="off" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>
            <label>Procedure </label>
            <textarea style='resize:vertical;' type="text" name="procedure"><?php echo htmlspecialchars($procedure) ?></textarea>
            <div class="red-text"><?php echo $errors['procedure']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="Submit" class="btn">
            </div>
        </form>
    </section>
    <?php include('template/footer.php'); ?>
</body>

</html>