<?php include "includes/header.php"; ?>

  <section class="hero">
    <h2>Welcome to Delicious Eats</h2>
    <p>Your ultimate destination for mouthwatering recipes and culinary inspiration.</p>
    <button class="btn-hero">Get Started</button>
  </section>

  <section class="featured-articles">
    <h2>Featured Articles</h2>
    <div class="article-card">
      <h3>Discover New Flavors</h3>
      <p>Explore the world of spices and herbs that can elevate your cooking to new heights.</p>
    </div>
    <div class="article-card">
      <h3>Cooking for Beginners</h3>
      <p>Master the basics of cooking with our step-by-step guide for beginners.</p>
    </div>
    <div class="article-card">
      <h3>Healthy Eating Tips</h3>
      <p>Learn how to make nutritious and delicious meals that support your well-being.</p>
    </div>
  </section>

<?php 

$recipes = new Recipes();


?>

  <section class="trending-recipes">
    <h2>Trending Recipes</h2>
    <form action="explore.php" method="">
      <div class="search-container">
          <input type="text" id="search" name='search' placeolder="Search recipes...">
          <input type='submit' value='search' class="btn-search">
      </div>
    </form>

    <div class="recipe-card">
      <img src="" alt="Trending Recipe 1">
      <h3>$row['name']</h3>
      <p><?php echo $row['description']; ?></p>
      <button class="btn-recipe">Get Recipe</button>
    </div>
  </section>

  <section class="signup-login">
    <div class="signup">
      <h2>Join Our Community</h2>
      <p>Sign up to get access to exclusive recipes, cooking tips, and more!</p>
      <button class="btn-signup">Sign Up</button>
    </div>
    <div class="login">
      <h2>Welcome Back</h2>
      <p>Log in to your account and continue your culinary journey.</p>
      <button class="btn-login">Log In</button>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 Delicious Eats</p>
  </footer>
</body>
</html>
