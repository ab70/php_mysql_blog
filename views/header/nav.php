<html>
<header>
    <?php 

include("../database/db.php");
session_start();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- bootstrap css -->
   
    
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--    bootsrap js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>AB.News</title>
</head>
</header>
<body>
    <!-- nav bar starts  -->
    <div class="topnav">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light  " style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="home.php">
            <img src="../assets/img/logo.png" alt="" height="90px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">

                        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                            <?php 

                                $categorySql =  "SELECT * FROM category WHERE parent_id = 0 ORDER BY cat_name ASC";
                                $catquery = mysqli_query($conn,$categorySql);
                                $count = mysqli_num_rows($catquery);
                                while($row = mysqli_fetch_assoc($catquery)){
                                    $cat_id = $row['cat_id'];
                                    $cat_name = $row['cat_name'];
                                    

                         ?>
                            <a class="dropdown-item" href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a>
                            <?php 
                                }
                             ?>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="adminlogin.php">Login</a>
                            
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            User <?php if (isset($_SESSION['loggedin'])) {
                                        echo "<b style='color:green'>";
                                        echo "(".$_SESSION['username'].")";
                                        echo "</b>";
 
                            }
                             ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php 
                                if (!isset($_SESSION['loggedin'])) {
                                    echo '<a class="dropdown-item" href="userlogin.php">Login/Registration</a>';
                                }
                             ?>
                             <?php 
                                if (isset($_SESSION['loggedin'])) {
                                    echo '<a class="dropdown-item" href="logout.php">Logout</a>';
                                }
                             ?>
                            
                            
                    </li>
                </ul>
                
            </div>
        </nav>
    </div>
    <!-- navbar ends  -->
</body>
    
</html>
