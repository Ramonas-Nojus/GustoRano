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


   
    <div class="container">
        <h1><?php echo $recipe['name']; ?></h1>
        <h2>Ingredients:</h2>
        <ul>
            <?php foreach($ingredients as $ingredient) { ?>
            <li><?php echo $ingredient; ?></li>
            <?php } ?>
        </ul>

        <h2>Instructions:</h2>
        <ol>
            <li>Step 1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
            <li>Step 2: Nullam in est nec odio sagittis consectetur ac a erat.</li>
            <li>Step 3: Integer vehicula ex eu nisi laoreet, in tristique tortor bibendum.</li>
            <!-- Add more steps as needed -->
        </ol>

    </div>
    <footer>
    <p>&copy; 2023 Delicious Eats</p>
  </footer>
</body>
</html>
