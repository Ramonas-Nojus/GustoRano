<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="style/explore.css"> <!-- Include your CSS file here -->
<?php
    $recipe = new Recipes;

    if(isset($_GET['search'])){
        $query = $_GET['search'];
     } else {
        header("Location: index.php");
    }

    $recipes = $recipe->getRecipesByName($query);

    $totalItems = count($recipes['meals']);;
    $itemsPerPage = 10;

    $totalPages = ceil($totalItems / $itemsPerPage);


    if(isset($_GET['page'])) {
        $page = intval($_GET['page']);
    } else {
        $page = 1;
    }
    if($page == 1) {
        $offset = 0;
    } else {
        $offset = ($page * $itemsPerPage) - $itemsPerPage;
    }


    $maxLinks = 10;

    if($totalItems < $itemsPerPage){
        $itemsPerPage = $totalItems;
    }

?>
    <main>
        <section class="search-results">
            
            <h2>Explore GustoRano:</h2>
                <form action="explore.php" method="">
                    <div class="search-container">
                        <input type="text" id="search" name='search' placeolder="Search recipes...">
                        <input type='submit' value='search' class="btn-search">
                    </div>
                </form>
            <!-- <p>Displaying results for "<span id="search-query">Your Search Query</span>":</p> -->
            <?php for($i = $offset; $i < $offset + $itemsPerPage; $i++) {

                if($i == $totalItems) break;

                $id = $recipes['meals'][$i]['idMeal'];
                $title = $recipes['meals'][$i]['strMeal'];

                if(isset($recipes['meals'][$i]['strMealThumb'])) {
                    $img = $recipes['meals'][$i]['strMealThumb'];
                } else {
                    $img = "images/neptune-placeholder-48.jpg";
                }

            ?>
            <div class="result-card">
                <img src="<?php echo $img; ?>" alt="Recipe Image 1" style="width: 40%">
                <h3><?php echo $title; ?></h3>
                <a href="recipe.php?recipe_id=<?php echo $id; ?>">Read More</a>
            </div>
            <?php } ?>
        </section>

        <?php

        // Calculate the start and end page numbers for the pagination links
        $startPage = max(1, $page - floor($maxLinks / 2));
        $endPage = min($totalPages, $startPage + $maxLinks - 1);

        // Generate pagination links
        echo '<div class="pagination">';
        if ($startPage > 1) {
            echo "<a href='?search=$query&page=1'>1</a>";
            if ($startPage > 2) {
                echo '<span>...</span>';
            }
        }
        for ($i = $startPage; $i <= $endPage; $i++) {
            if ($i == $page) {
                echo "<span class='current-page'>$i</span>";
            } else {
                echo "<a href='?search=$query&page=$i'>$i</a>";
            }
        }
        if ($endPage < $totalPages) {
            if ($endPage < $totalPages - 1) {
                echo '<span>...</span>';
            }
            echo "<a href='?search=$query&page=$totalPages'>$totalPages</a>";
        }
        echo '</div>';
        ?>


    </main>

    <footer>
        <p>&copy; 2023 GustoRano</p>
    </footer>
</body>
</html>
