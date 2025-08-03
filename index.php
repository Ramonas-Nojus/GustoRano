<?php include "includes/header.php"; ?>

  <section class="hero">
    <h2>Welcome to Delicious Eats</h2>
    <p>Your ultimate destination for mouthwatering recipes and culinary inspiration.</p>
    <form action="explore.php" method="">
      <div class="search-container">
          <input type="text" id="search" name='search' placeolder="Search recipes...">
          <input type='submit' value='search' class="btn-search">
      </div>
    </form>
  </section>


<?php 

$recipes = new Recipes();


?>

  <section class="trending-recipes">

    <h2>Random picks</h2>

    <?php for($i = 0; $i<3; $i++){
        $recipe = $recipes->getRandomRecipe();  
    ?>
    <div class="recipe-card">
        <img src="<?php echo $recipe['strMealThumb']; ?>" alt="Trending Recipe 1">
        <h3><?php echo $recipe['strMeal']; ?></h3>
        <a href="recipe.php?recipe_id=<?php echo $recipe['idMeal']; ?>" class="btn-recipe">Read More</a>
    </div>
    <?php } ?>
  </section>


  <footer>
    <p>&copy; 2023 Delicious Eats</p>
  </footer>
</body>
</html>
