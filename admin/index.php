<?php 
session_start();
    include("../config/functions.php");
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/basket.css">
    <title>Document</title>
</head>

<header>
    <nav>
        <ul>
            <li><a href="#">Տեսականի</a></li>
            <li><a href="pages/done.php">կատրած պատվերներ </a></li>
            <li><a href="pages/wait.php">կատարման ենթակա պատվերներ</a></li>
            <li><a href="pages/addProduct.php">Ավելացնել նոր ապրանք</a></li>
        </ul>
    </nav>
    <a href="../actions/logoutAction.php" class="logout">
        <i class=" fa-solid fa-right-from-bracket"></i>
    </a>
</header>





<body>


    <?php



// // Connect to your database
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "dbart";

// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Always display the search form at the beginning
// echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
// echo '<input type="text" name="search" placeholder="Enter your search term">';
// echo '<input type="submit" value="Search">';
// echo '</form>';

// // Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Retrieve the search query from the form
//     $search_query = $_POST["search"];

//     // Perform any necessary validation or sanitization here
//     $search_query = $conn->real_escape_string($search_query);

//     // Prepare and execute the SQL query
//     $sql = "SELECT * FROM assortment WHERE Name LIKE '%" . $search_query . "%' OR Description LIKE '%" . $search_query . "%'";
//     $result = $conn->query($sql);

//     // Display the search results
//     echo "<h2>Search Results for: " . htmlspecialchars($search_query) . "</h2>";
//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             // Display each search result item
//             echo "<p><strong>" . htmlspecialchars($row["Name"]) . "</strong>: " . htmlspecialchars($row["Description"]) . "</p>";
//         }
//     } else {
//         echo "<p>No results found for: " . htmlspecialchars($search_query) . "</p>";
//     }

//     // Free the result set
//     $result->free();
// }

// // Close the database connection
// $conn->close();
?>



    <?php





    // // Assuming you have a database connection established already
    // // Connect to your database
    // // $servername = "localhost";
    // // $username = "root";
    // // $password = "";
    // // $dbname = "dbart";

    // // $conn = new mysqli($servername, $username, $password, $dbname);

    // // Check connection
    // // if ($conn->connect_error) {
    // // die("Connection failed: " . $conn->connect_error);
    // // }

    // // Check if the form is submitted
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // // Retrieve the search query from the form
    // $search_query = $_POST["search"];

    // // Perform any necessary validation or sanitization here

    // // Prepare and execute the SQL query
    // $sql = "SELECT * FROM assortment WHERE assortment.Name LIKE '%" . $search_query . "%' OR assortment.Description LIKE '%" . $search_query . "%'";
    // $result = query($sql);
    // // var_dump($sql);die;
    // // Display the search results
    // if (mysqli_num_rows($result) > 0) {
    // echo "<h2>Search Results for: " . htmlspecialchars($search_query) . "</h2>";
    // while ($row = $result->fetch_assoc()) {
    // // Display each search result item
    // echo "<p>" . $row["Name"] . ": " . $row["Description"] . "</p>";
    // }
    // } else {
    // echo "<p>No results found for: " . htmlspecialchars($search_query) . "</p>";
    // }

    // // Close the database connection
    // // $conn->close();
    // }
    // // else {
    // // If the form is not submitted, display the search form

    // // }

    // echo '<form method="post" action="' . htmlspecialchars($_SERVER[" PHP_SELF"]) . '">' ;
     //echo '<input type="text" name="search" placeholder="Enter your search term">' ;
      //echo '<input type="submit" value="Search">' ; // echo '</form>' ; ?>


















    <section>
        <?php
    $user_id = $_SESSION["user_id"];
    if(!$user_id){
        header('Location:login.php');die;
    }
    $sql = select('assortment',  1, '*', 9999 * 9 * 9 * 9 * 9 * 9 * 9 * 9);
// $sql = "SELECT * FROM basket INNER JOIN assortment ON basket.Assortment_ID=assortment.Assortment_ID WHERE basket.User_ID=$user_id;";
// $sql = query($sql);
   ?>
        <div class="left">
            <?php
        $sum=0;
while ($product = mysqli_fetch_assoc($sql)) {    
$sum=$sum+$product['Cash_price'];
        ?>

            <div class="product">
                <div class="img_div">
                    <a href="pages/product.php?product_id=<?=$product['Assortment_ID']?>">
                        <img src="../images/<?=$product['Image1']; ?>" alt="Error">
                    </a>
                </div>
                <div class="info_div">
                    <a href="pages/product.php?product_id=<?=$product['Assortment_ID']?>">
                        <h5>
                            <?php echo $product['Description']; ?>
                        </h5>
                    </a>
                    <p>
                        Գին <?php echo $product['Cash_price']; ?> Դր.
                    </p>
                </div>
                <!-- <a href="pages/editProduct.php?id="> -->

                <form class="editForm" action="pages/editProduct.php" method="post">
                    <input type="number" name="product_id" value="<?=$product['Assortment_ID']?>" style="display:none;">
                    <input type="number" name="group_id" value="<?=$product['Group_ID']?>" style="display:none;">
                    <button class="editButton">Edit</button>

                </form>
                <!-- </a> -->
                <div class="delete_product">
                    <a href="action/deleteProductAction.php?id=<?=$product['Assortment_ID']?>">
                        <i class="fa-solid fa-close"></i>
                    </a>
                </div>
            </div>

            <?php
            }
            ?>
        </div>

    </section>




















































</body>

</html>