<?php include "includes/header.php"; ?>
    <style>

        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;

            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            margin-top: 20px;
        }

        ul {
            list-style-type: decimal;
            padding-left: 20px;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php 

        if(isset($_GET['recipe_id'])){
            $id = $_GET['recipe_id'];
        } else {
            header("Location: index.php");
        }

        $recipes = new Recipes();
        $recipe = $recipes->getRecipeById($id);

?>
   
    <div class="container">
        <img src="<?php echo $recipe['strMealThumb']; ?>">
        <h1><?php echo $recipe['strMeal']; ?></h1>
        <h2>Ingredients:</h2>
        <ul>
            <?php for($i = 1; $i <=20; $i++) {
                if($recipe['strIngredient'.$i] == "") break;    
            ?>
            <li><?php echo $recipe['strIngredient'.$i]; ?>  :  <?php echo $recipe['strMeasure'.$i]; ?></li>
            <?php } ?>
        </ul>

        <h2>Instructions:</h2>
        <?php
            echo str_replace("\r\n",'<br>',$recipe['strInstructions']);
        ?>

    </div>
    <footer>
    <p>&copy; 2023 Delicious Eats</p>
  </footer>
</body>
<script>
    const regex = /\\n|\\r\\n|\\n\\r|\\r/g;
    string.replace(regex, '<br>');
</script>
</html>
