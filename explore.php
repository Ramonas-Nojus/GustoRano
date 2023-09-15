<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="style/explore.css"> <!-- Include your CSS file here -->
<?php
    $recipes = new Recipes;


    $totalItems = $recipes->getTableLength();
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

    $recipe = $recipes->getAllRecipes($offset);



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

        <?php

        // Calculate the start and end page numbers for the pagination links
        $startPage = max(1, $page - floor($maxLinks / 2));
        $endPage = min($totalPages, $startPage + $maxLinks - 1);

        // Generate pagination links
        echo '<div class="pagination">';
        if ($startPage > 1) {
            echo "<a href='?page=1'>1</a>";
            if ($startPage > 2) {
                echo '<span>...</span>';
            }
        }
        for ($i = $startPage; $i <= $endPage; $i++) {
            if ($i == $page) {
                echo "<span class='current-page'>$i</span>";
            } else {
                echo "<a href='?page=$i'>$i</a>";
            }
        }
        if ($endPage < $totalPages) {
            if ($endPage < $totalPages - 1) {
                echo '<span>...</span>';
            }
            echo "<a href='?page=$totalPages'>$totalPages</a>";
        }
        echo '</div>';
        ?>


    </main>

    <footer>
        <p>&copy; 2023 GustoRano</p>
    </footer>
</body>
</html>
