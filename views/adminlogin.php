
 <html>
 	<body  style="background-image: url('https://images.unsplash.com/photo-1510936111840-65e151ad71bb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=767&q=80');"   onload="loaders()">
     <div  id="loader">
                
            </div>
            <?php 
            ob_start();
    include("header/header.php");
    include("header/nav.php");
    include("functions.php");

 ?>
  <?php 
    $showSuccess = false;
    $noAccount = false;
    if (isset($_GET['adminemail'])) {
            
            
            $userMail = $_GET['adminemail'];
            $userPass = $_GET['adminpassword'];
            $sql = "SELECT * FROM admin WHERE '$userMail' = admin_email AND '$userPass' = admin_pass ";
            $sqlRun = mysqli_query($conn,$sql);
            if(mysqli_num_rows($sqlRun)==1){
                $row = mysqli_fetch_array($sqlRun);
                
                $_SESSION['adminloggedin'] = true;
                $_SESSION['username'] = $row['admin_nmae'];
                $_SESSION['logginemail'] = $row['admin_email'];
                echo $_SESSION['username'];
                header("location: admin/adminHome.php");
                
                
            }
            else{
                $noAccount = true;
            }
        }
        else{
            echo "";
        } 
     ?>
     <?php 

    
    if ($noAccount) {
        warningMessage("No Match found exist");
    }
    ?>
 		<div class="container-fluid col-md-12" id="forms"  style="margin-top: 200px; ">
           
        <div class="container col-md-3 mb-5">
            <h4 style="color:white;" style="padding-bottom: 50px;">AbNews Admin</h4>
        </div>
        <form class="col-md-5" style="margin: auto;" action="adminlogin.php" method="GET" onsubmit="return true">
            <div class="form-group mt-1">
                <input class="form-control" type="email" name="adminemail" id="adminemail" aria-describedby="emailHelp" onfocus="this.placeholder=''" onblur="this.placeholder='Enter email address!'" placeholder="Enter-email" required="" style="background: transparent ; color: white;">
            </div>
            <div class="form-group ">
                <input class="form-control" type="password" name="adminpassword" id="adminpass" onfocus="this.placeholder=''" onblur="this.placeholder='Enter correct password'" placeholder="Password" style="background: transparent ;color: white;" required="">
            </div>
            
           
            
            
            <button type="submit" class="btn btn-primary" >Login</button>
            
        </form>
    </div>
    <script>
        var preloader = document.getElementById('loader');
        function loaders() {
            
            preloader.style.display = 'none';
        }
    </script>
 	</body>
 </html>
 <?php 
    ob_end_flush();
  ?>