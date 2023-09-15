<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="style/explore.css"> <!-- Include your CSS file here -->
<?php
    $recipes = new Recipes;

    $per_page = 10;

    if(isset($_GET['page'])) {

        $page = $_GET['page'];
    } else {
        $page = "";
    }

    if($page == "" || $page == 1) {
        $page_1 = 0;
    } else {
        $page_1 = ($page * $per_page) - $per_page;
    }

    $recipe = $recipes->getAllRecipes($page_1, $per_page);

    $count = $recipes->getTableLength();

?>
    <main>
        <section class="search-results">
            <h2>Explore GustoRano:</h2>
            <!-- <p>Displaying results for "<span id="search-query">Your Search Query</span>":</p> -->
            <?php foreach($recipe as $row) { 
                $title = $row['name'];
                $desc = str_replace(" from Food.com", "", $row['description']);

                if(isset(explode('"', $row['images'])[1])) {
                    $img = explode('"', $row['images'])[1];
                } else {
                    $img = "images/neptune-placeholder-48.jpg";
                }

            ?>
            <div class="result-card">
                <img src="<?php echo $img; ?>" alt="Recipe Image 1" style="width: 60%">
                <h3><?php echo $title; ?></h3>
                <p><?php echo $desc; ?></p>
                <a href="#">Read More</a>
            </div>
            <?php } ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Delicious Eats</p>
    </footer>
</body>
</html>
